<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionPost extends Model
{
    use HasFactory;
    protected $guarded=[
        
    ];
    public function subject() //mothod
    {
        return $this->belongsTo(Subject::class);//,'subject_name'
    }


    public function classt() //mothod
    {
        return $this->belongsTo(Classt::class);
    
    }

}
