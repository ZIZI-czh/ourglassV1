<?php

namespace App\Http\Controllers;

use \App\Models\ModelChoice;

class ChooseRobotModelController extends Controller
{

    public function showModelChoices()
    {
        $robotModels = ModelChoice::all();

        //dd($robotModels); // Check the content of the collection
        // dd($robotModels->count()); // Check the number of items in the collection


        return view('robots.models', ['robotModels' => $robotModels]);
    }


}