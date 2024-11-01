<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'subject', 
        'level', 
        'publication_date'
    ];


    protected $dates = ['publication_date'];
}