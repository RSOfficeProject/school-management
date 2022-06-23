<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:trainer_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');

        $this->module_name = 'users';
    }
    
    public function index(){
        // $userId = Session::get('user_id');
        // $school = School::with('user')->where('user_id', $userId)->first();
    //    echo '<pre>'; print_r($school); die();

        return view('student.index');
    }
}
