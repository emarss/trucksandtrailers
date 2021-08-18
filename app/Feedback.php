<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * User Feedback
 * 
 * @property str $email
 * @property str $name
 * @property str $phone
 * @property str $message
 * 
 */

class Feedback extends Model
{
    protected $fillable = ['email', 'name', 'phone', 'message'];
}
