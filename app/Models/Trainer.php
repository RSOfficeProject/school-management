<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table = "trainers";
    //protected $primarykey = "id";
    protected $fillable = ['id','user_id','trainer_name','email','trainer_fee','contact_no','address','city','join_date','date_of_birth','image','mode','type','no_of_hour_per_week'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    // public function getSchool(){
    //     return $this->belongsTo(School::class, 'school_id', 'id');
    // }

    // public function getGrade(){
    //     return $this->belongsTo(Grade::class, 'student_grade_id', 'id');
    // }
}
