<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Robots;


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

    public function getRobotInformation()
    {

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
                    // Make an API request to fetch the robot information based on the robot ID
                    $robotResponse = Http::get("http://127.0.0.1:9050/api/robot/status?device_id=1664419476628&robot_id={$robotId}");
                    if ($robotResponse->successful()) {
                        $robotData = $robotResponse->json();
                        $robotData['robotId'] = $robotId;
                        $robotData['groupId'] = $groupId;
                        $robotData['editRoute'] = route('robot-information.edit', ['robotId' => $robotId]); // Pass the robot data to the edit route
                        $robots[] = $robotData; // Add the robot data to the robots array

                    } else {
                        // Handle the robot API error response
                        $error = $robotResponse->json();

                        // ...
                    }

                    $databaseRobot = Robots::where('robotId', $robotId)
                        ->select('robotId', 'robotName', 'robotModel', 'supplier', 'groupId', 'macAddress', 'pid')
                        ->first();
                    $databaseRobotsArray = $databaseRobot->toArray();

                    //combine with the robot API and user input data
                    if (!empty($robots)) {
                        $robots[0] = array_merge($robots[0], $databaseRobotsArray);
                    } else {
                        $robots[] = $databaseRobotsArray;
                    }

                    return view('robots.robot-information', ['robots' => $robots]);

                }
            } else {

            }
        } else {
            // Handle the API error response
            $error = $response->json();
            return view(
                'robots.test'

            );

        }

    }


}