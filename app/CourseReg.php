<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseReg extends Model
{
    //
    protected $table ='courseregs';
    protected $fillable =['user_id','course_id','enrolled'];
}
