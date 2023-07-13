<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robots extends Model
{
    use HasFactory;
    protected $table = 'robots';
    protected $primaryKey = 'robotId';
    protected $keyType = 'string'; // Specify the data type of the primary key
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected $fillable = [
        'robotId',
        'robotName',
        'robotModel',
        'supplier',
        'macAddress',
        'pid',
        'groupId',

    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'groupId');
    }

}