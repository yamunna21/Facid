<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{

     protected $fillable = [
        'name', 'matricsno', 'role', 'image', 'status', 'gender', 'department', 'description'
    ];

}
