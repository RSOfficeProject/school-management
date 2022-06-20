<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table = "schools";
    protected $primarykey = "id";
    protected $fillable = ['id','school_name','city','principle_name','official_email_id','number_of_student','country','school_address','year_establish','incharge_name','incharge_email','contact_number','kidspreneurship_representative','course_start_date','status','weekly _class_for_grade','membership_plan','school_logo','school_cover_image'];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function ClassSchedule(){
        return $this->hasMany(ClassSchedule::class,'school_id','id');
    }
}