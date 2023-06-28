<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RobotDashboardController extends Controller
{
    public function getRobotInformation()
    {
        // Retrieve the group ID associated with the authenticated user
        $email = auth()->user()->email;
        $user = \App\Models\User::where('email', $email)->firstOrFail();
        $groupId = $user->groupId;
        //dd($groupId);
        // Make an API request to fetch the robot IDs for the group
        $response = Http::get("http://127.0.0.1:9050/api/robot/state?device_id=1664419476628&group_id={$groupId}");
        if ($response->successful()) {
            $responseData = $response->json();

            if (isset($responseData['data']['state'])) {
                $robotStates = $responseData['data']['state'];
                $robotIds = [];

                foreach ($robotStates as $robotState) {
                    $robotIds[] = $robotState['robotId'];
                }

                // $robotIds now contains all the robot IDs
                // You can use the array of robot IDs as needed

                $robots = [];

                foreach ($robotIds as $robotId) {
                    // Make an API request to fetch the robot information based on the robot ID
                    $robotResponse = Http::get("http://127.0.0.1:9050/api/robot/status?device_id=1664419476628&robot_id={$robotId}");

                    if ($robotResponse->successful()) {
                        $robotData = $robotResponse->json();
                        $robots[] = $robotData; // Add the robot data to the robots array
                        //dd($robots);
                    } else {
                        // Handle the robot API error response
                        $error = $robotResponse->json();
                        dd($error);
                        // ...
                    }

                    return view('robots.robot-information', ['robots' => $robots]);
                }

                // Return the robot information

            } else {
                // Handle the absence of 'state' key in the API response
                // ...
            }
        } else {
            // Handle the API error response
            $error = $response->json();
            dd($error);
            // ...
        }

    }
}