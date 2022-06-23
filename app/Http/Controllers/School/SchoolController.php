<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\School;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SchoolController extends Controller
{
    public function studentList(){

        $school = School::where('user_id',Session::get('user_id'))->first()->toArray();
        $schoolId = $school['id'];
        
        $students = Students::with([
            'school' => function ($query) {
                $query->select('id','school_name');
            },
            'stdUser'
        ])
        ->where('school_id', $schoolId)
        ->get()
        ->toArray();
        // echo "<pre>"; print_r($students); die();

        
        return view('school.student.student_list', [
            'students' => $students
        ]);
    }

    public function studentEdit($id){
        // $student = Students::with('stdUser')->find($id)->toArray();
        $student = Students::with([
            'school',
            'stdUser'
        ])
        ->find($id)
        ->toArray();
        // echo "<pre>"; print_r($student); die();

        // $schoolId = $school['id'];
        // $students = Students::where('school_id', $schoolId)->get()->toArray();

        return view('school.student.student_edit', [
            'student' => $student
        ]);
    }

    public function studentUpdate(Request $request){

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->save();

        // if($request->new_password && $request->confirm_password){
        //     $user->password = Hash::make($request->new_password);
        // }else{
        //     $error = array("error", "Password didn't match !");
        // }

        // echo "<pre>"; print_r($user); die();


        $students = Students::find($request->student_id);
        $students->project = $request->project;
        $students->assignment = $request->assignment;
        $students->classes_held = $request->classes_held;
        $students->classes_attended = $request->classes_attended;
        $students->attendance = $request->attendance;
        $students->overal_grade = $request->overal_grade;
        $students->father_name = $request->father_name;
        $students->mother_name = $request->mother_name;
        $students->address = $request->address;
        $students->blood_group = $request->blood_group;
        $students->activity_incharge = $request->activity_incharge;
        $students->save();

        return redirect('/school/student/list')->with('message', 'Student successfully Updated!');

        // echo "<pre>"; print_r($students); die();


        // $student = Students::find($id)->toArray();
        // // echo "<pre>"; print_r($student); die();

        // // $schoolId = $school['id'];
        // // $students = Students::where('school_id', $schoolId)->get()->toArray();

        // return view('school.student.student_edit', [
        //     'student' => $student
        // ]);
    }
}
