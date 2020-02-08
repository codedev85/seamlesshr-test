<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course as CourseSheet;
use App\CourseReg;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\Course;


class CourseController extends Controller
{
    //
    public function getCourses()
    {
        $data =  CourseSheet::all();
        return response()->json(compact('data'),200);
    }

    public function storeCourses(Request $request){
        $data = 'Request Processed successfully';
        Course::dispatch();
        return response()->json(compact('data'),200);
    }


    public function registerCourse(Request $request){


        $coursereg =new CourseReg();
        $coursereg->user_id = $request->input('user_id');
        $coursereg->course_id = $request->input('course_id');
        $coursereg->enrolled = now();
        $coursereg->save();


        return response()->json(compact('coursereg'),200);
    }

    public function dateUserEnrolled(Request $request){

        if($request->input('user_id')){

            $dateEnrolled =CourseReg::where('user_id', $request->input('user_id'))->pluck('enrolled');

        }



        return response()->json(compact('dateEnrolled'),200);
    }

    public function exportData($type){

           $data = CourseSheet::get()->toArray();
           return Excel::create('seamlesshr', function($excel) use ($data) {
              $excel->sheet('seamlesshr', function($sheet) use ($data)
                {
                 $sheet->fromArray($data);
                });
           })->download($type);

       }

}
