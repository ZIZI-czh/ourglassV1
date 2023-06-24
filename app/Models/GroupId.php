<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupId extends Model
{
    use HasFactory;
    protected $table = 'group_ids';
    protected $fillable =
    [
        'groupId',
        'userName',

    ];

    public function users()
    {
        return $this->hasOne(User::class, 'groupId');
    }
}
