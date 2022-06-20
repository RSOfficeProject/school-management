<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Students extends Model
{
    use HasFactory;
    protected $table = "students";

    public function stdUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }


}
