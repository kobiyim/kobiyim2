<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permission';

    protected $fillable = [
        'user_id', 'permission_id',
    ];

    public $timestamps = false;
}
