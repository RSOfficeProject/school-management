<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\School;

use Illuminate\Support\Facades\Session;

class SchoolController extends Controller
{
    public function studentList(){

        $school = School::where('user_id',Session::get('user_id'))->first()->toArray();
        $schoolId = $school['id'];
        
        $students = Students::where('school_id', $schoolId)->get()->toArray();
        // echo "<pre>"; print_r($students); die();

        
        return view('school.student.student_list', [
            'students' => $students
        ]);
    }

    public function studentEdit($id){
        // $student = Students::find($id)->toArray();

        $student = Students::with('stdUser')->find($id)->toArray();
        echo "<pre>"; print_r($student); die();


        // $schoolId = $school['id'];
        // $students = Students::where('school_id', $schoolId)->get()->toArray();

        return view('school.student.student_edit', [
            'student' => $student
        ]);
    }

    public function studentUpdate($id){

        echo "<pre>"; print_r($_POST); die();

        // $student = Students::find($id)->toArray();
        // // echo "<pre>"; print_r($student); die();

        // // $schoolId = $school['id'];
        // // $students = Students::where('school_id', $schoolId)->get()->toArray();

        // return view('school.student.student_edit', [
        //     'student' => $student
        // ]);
    }
}
