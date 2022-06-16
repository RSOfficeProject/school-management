<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;

class ProgressreportController extends Controller
{
    public function progressReport(){
        $students = Students::all()->toArray();
        // echo "<pre>"; print_r($students); die();
        
        return view('school.progres_report.list_progress', [
            'students' => $students
        ]);
    }
}
