<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RobotsEachStore extends Model
{
    protected $fillable = ['robot_name', 'robot_id']; // specify the fillable fields

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}