<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupHasPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'permission_id', 'group_id'
    ];
}
