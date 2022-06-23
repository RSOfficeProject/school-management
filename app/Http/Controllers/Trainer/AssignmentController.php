<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Trainer;
use App\Models\User;
use App\Models\School;
use App\Models\StudentCommunications;
use App\Models\AssingmentFiles;

class AssignmentController extends Controller
{
    public function createAssignment()
    {
        $schools = School::get()->toArray();
        $grades = Grade::get()->toArray();


        return view('trainer.assignment.create_assignment', [
            'schools' => $schools,
            'grades' => $grades,
        ]);
    }

    public function store_assignment(Request $request)
    {
        $assignment = new StudentCommunications();
        $assignment->school_id = $request->school_id;
        $assignment->grade_id = $request->grade_id;
        $assignment->comment = $request->comment;
        $assignment->save();
        
        $multiAssignment = $request->multi_assignment;
        if($multiAssignment){

            for($i = 0; $i< count($multiAssignment); $i++){
                $assignmentFile = new AssingmentFiles();
                $assignmentFile->assignment_id = $assignment->id;
                $assignmentFile->attachment = $multiAssignment[$i];
                $assignmentFile->save();
            }

        }

        return redirect()->back()->with('message', 'Assignment Created Successfully!');
    }

    public function viewAssignment()
    {
       $assignment=StudentCommunications::all()->toArray();
       
       return view('trainer.assignment.view_assignment',compact('assignment'));
    }
}
