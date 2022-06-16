<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = "contents";
    protected $fillable = ['id','title','description','ageGroup_id','stream_id','video','worksheet'];

    public function getStream(){
        return $this->belongsTo(Stream::class, 'stream_id', 'id');
    }

    public function getAgeGroup(){
        return $this->belongsTo(AgeGroup::class, 'ageGroup_id', 'id');
    }
}
