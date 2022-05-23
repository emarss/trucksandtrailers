<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * User Feedback
 * 
 * @property str $email
 * 
 */

class Newsletter extends Model
{
    protected $fillable = ['email'];
}