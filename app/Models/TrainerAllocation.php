<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerAllocation extends Model
{
    use HasFactory;
    protected $table = "trainer_allocation";
    protected $fillable = ['school_id','class_schedule','class_date','trainer_id','class_duration'];
}
