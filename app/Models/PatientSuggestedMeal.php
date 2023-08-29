<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSuggestedMeal extends Model
{
    use HasFactory;
    protected $fillable=['patient_id','meal_id'];
}