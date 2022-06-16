<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Setting;
use App\Models\Grade;
use App\Models\Trainer;
use App\Models\User;
use App\Models\School;
use App\Models\StudentCommunications;
use App\Models\AssingmentFiles;

use Illuminate\Support\Facades\Mail;

class StudentCommunication extends Controller
{
    public function createAssignment(){
        $schools = School::get()->toArray();
        $grades = Grade::get()->toArray();

        // echo "<pre>";
        // print_r($schools);
        // die();

        return view('backend.student_communication.create_assignment', [
            'schools' => $schools,
            'grades' => $grades,
        ]);
    }

    public function saveAssignment(Request $request){

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


        //Start Email send section-----
        $assignment = StudentCommunications::find(1)->toArray();

        // $email = "afiqur@sahajjo.com";
        $email = "nazmul@sahajjo.com";
        echo $emailSub = "You have new assignment notification!! <br>";
        echo $emailBody = 'Your school id is: '. $assignment['school_id'] . '<br> 
        Your grade id is: '. $assignment['grade_id'] .'<br>
        And your comment is: '.$assignment['comment'].'<br> <br>
        Thanks <br>
        Md: Afiqur Rahman';

        // die();
        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('email'=> $email,'subject'=> $emailSub);
        
        // Mail::send('mail', $data, function($message) use ($data){
        //     $message->to($data['email'], 'Tutorials Point')->subject
        //        ($data['subject']);
        //  });

        // $notification=array(
        //     'message'=>'Assignment Created Successfully!',
        //     'success'=>'success',
        // );
 
        // return redirect()->route('backend.create-assignment')->with($notification);
        return redirect('/admin/assignment/create')->with('message', 'Assignment Created Successfully!');
    }

    public function multiAssignment(Request $request)
    {
        //multiple image upload
        $files = $request->file('file');
        // echo "<pre>"; print_r($files); die();

        if($request->hasFile('file'))
        {
            // $fileName = [];
            foreach ($files as $file) {
                $fileType = $file->getClientOriginalExtension();
                $fileName = 'assignment_'.Str::random(10).'.'.$fileType;
                // echo "<pre>"; print_r($fileName);
                $file->move('image/assignment/',$fileName);
                echo $fileName;
            }
        }
    }



    // public function sendAssignmentMail(){
    //     // echo "hello"; die();

    //     $assignment = StudentCommunications::find(1)->toArray();
    //     // echo "<pre>";
    //     // print_r($assignment);
    //     // die();


    //     // $email = "afiqur@sahajjo.com";
    //     $email = "nazmul@sahajjo.com";
    //     echo $emailSub = "You have new assignment notification!! <br>";
    //     echo $emailBody = 'Your school id is: '. $assignment['school_id'] . '<br> 
    //     Your grade id is: '. $assignment['grade_id'] .'<br>
    //     Your attachment is: '. $assignment['attachment'] . '<br>
    //     And your comment is: '.$assignment['comment'].'<br> <br>
    //     Thanks <br>
    //     Md: Afiqur Rahman';

    //     // die();
    //     file_put_contents('../resources/views/mail.blade.php',$emailBody);
    //     $data = array('email'=> $email,'subject'=> $emailSub);
        
    //     Mail::send('mail', $data, function($message) use ($data){
    //         $message->to($data['email'], 'Tutorials Point')->subject
    //            ($data['subject']);
    //      });
    // }


}