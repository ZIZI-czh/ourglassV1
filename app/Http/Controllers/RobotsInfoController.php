<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Robots;
use Illuminate\Support\Facades\Validator;

class RobotsInfoController extends Controller
{
    public function update(Request $request, $robotId)
    {
        //dd($robotId);
        $validator = Validator::make($request->all(), [
            // 'robotName' => 'required|unique:robots,robotName,' . $robot->groupId,
            'robotName' => 'required',
            'robotModel' => 'required',
            'supplier' => 'required',
            'macAddress' => 'nullable|string',
            'pid' => 'nullable|string',
        ], [
            'robotName.required' => 'Please enter the robot name.',
            'robotModel.required' => 'Please select the robot model.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $updatedData = [
            'robotName' => $request->input('robotName'),
            'robotModel' => $request->input('robotModel'),
            'supplier' => $request->input('supplier'),
            'macAddress' => $request->input('macAddress'),
            'pid' => $request->input('pid'),
        ];

        Robots::where('robotId', $robotId)->update($updatedData);

        return redirect()->route('robot-information')->with('success', 'Robot updated successfully.');
    }
}