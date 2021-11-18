<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    use HasFactory;
    protected $fillable = [
        'tutor_id',
        'learner_id',
        'course_id',
    ];
}
