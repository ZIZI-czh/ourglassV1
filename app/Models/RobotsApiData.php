<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RobotsApiData extends Model
{
    use HasFactory;
    protected $table = 'robots_api_data';
    protected $primaryKey = 'robotId';
    protected $fillable = [
        'robotId',
        'chargeStage',
        'moveState',
        'robotState',
        'robotPower',
        'groupId',
        'editRoute',
        'robotWifi'
    ];

}
