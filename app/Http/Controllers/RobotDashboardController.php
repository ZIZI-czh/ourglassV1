<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Robots;
use App\Models\RobotsApiData;

class RobotDashboardController extends Controller
{
    public function edit($robotId)
    {

        $robot = Robots::find($robotId);
        //$robot = session('robots', []);
        if (isset($robot)) {
            return view('robots.edit', ['robot' => $robot]);

        } else {
            return redirect()->back()->with('error', 'Robot data is missing.');
        }
    }

    public function getDataFromDatabase($robotId, $isOnline)
    {

        $databaseRobotEdit = Robots::where('robotId', $robotId)
            ->select('robotId', 'robotName', 'robotModel', 'supplier', 'groupId', 'macAddress', 'pid')
            ->first();
        $databaseRobotsArrayEdit = $databaseRobotEdit->toArray();

        $databaseRobotApi = RobotsApiData::where('robotId', $robotId)
            ->select('robotId', 'chargeStage', 'moveState', 'robotState', 'robotPower', 'groupId', 'editRoute')
            ->first();
        $databaseRobotApi['robotWifi'] = $isOnline;
        $databaseRobotsArrayApi = $databaseRobotApi->toArray();
        $databaseRobotsArrayEdit = array_merge($databaseRobotsArrayEdit, $databaseRobotsArrayApi);
        return $databaseRobotsArrayEdit;
    }


    public function getRobotInformation()
    {
        $isOnline = false;

        try {
            $email = auth()->user()->email;
            $user = \App\Models\User::where('email', $email)->firstOrFail();
            $groupId = $user->groupId;
            $response = Http::get("http://127.0.0.1:9050/api/robot/state?device_id=1664419476628&group_id={$groupId}");
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['data']['state'])) {
                    $robotStates = $responseData['data']['state'];
                    $robotIds = [];
                    foreach ($robotStates as $robotState) {
                        $robotIds[] = $robotState['robotId'];
                    }
                    $robots = [];

                    foreach ($robotIds as $robotId) {
                        try {
                            // Make an API request to fetch the robot information based on the robot ID
                            $robotResponse = Http::get("http://127.0.0.1:9050/api/robot/status?device_id=1664419476628&robot_id={$robotId}");
                            if ($robotResponse->successful()) {
                                $robotData = $robotResponse->json();
                                $robotData['robotId'] = $robotId;
                                $robotData['groupId'] = $groupId;
                                $isOnline = true;
                                $robotData['robotWifi'] = $isOnline;
                                $editRoute = route('robot-information.edit', ['robotId' => $robotId]);
                                $robotData['editRoute'] = $editRoute; // Pass the robot data to the edit route
                                $robotsData[] = $robotData; // Add the robot data to the robots array
                                $activeRobots = RobotsApiData::updateOrCreate(['robotId' => $robotId, 'groupId' => $groupId, 'editRoute' => $editRoute, 'robotWifi' => $isOnline], $robotsData[0]['data']);

                            } else {
                                // Handle the robot API error response

                                $error = $robotResponse->json();
                                return view('robots.errors.api-error', ['error' => $error]);
                            }
                        } catch (\Exception $e) {

                            // Handle any exceptions that occurred during the API request
                            $error = $e->getMessage();
                            return view('robots.errors.api-error', ['error' => $error]);
                        }

                        try {

                            $showRobotsInfo[$robotId] = $this->getDataFromDatabase($robotId, $isOnline);
                        } catch (\Exception $e) {
                            // Handle the exception
                            $error = $e->getMessage();
                            return view('robots.errors.api-error', compact('error'));
                        }
                    }
                    return view('robots.robot-information', ['robots' => $showRobotsInfo]);
                } else {
                    $isOnline = false;
                    $robotIds = Robots::where('groupId', $groupId)->pluck('robotId')->toArray();
                    foreach ($robotIds as $robotId) {
                        $showRobotsInfo[$robotId] = $this->getDataFromDatabase($robotId, $isOnline);
                    }
                }
                return view('robots.robot-information', ['robots' => $showRobotsInfo]);


            } else {
                $isOnline = false;
                $robotIds = Robots::where('groupId', $groupId)->pluck('robotId')->toArray();
                foreach ($robotIds as $robotId) {
                    $showRobotsInfo[$robotId] = $this->getDataFromDatabase($robotId, $isOnline);
                }
                return view('robots.robot-information', ['robots' => $showRobotsInfo]);
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return view('robots.errors.api-error', compact('error'));
        }
    }
}