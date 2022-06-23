<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Trainer;
use App\Models\School;
use App\Models\TrainerAllocation;
use App\Models\AllocationEvent;
Use \Carbon\Carbon;
use DB;

class TrainerAllocationController extends Controller
{
    public function trainerallocation()
    {
        $all_city= Trainer::all()->unique('city');
       $all_school=School::all();
       return view('backend.trainer_allocation.trainer_allocation',compact('all_city','all_school'));
    }

    public function alltainer(Request $req)
    {   
        $city_id=$req->city_id;
        $mood_id=$req->mood_id;
        
        if($mood_id == '2')
        {
            $all_trainer=Trainer::where('city',$city_id)
            ->Where('mode',$mood_id)
            ->get()->toArray();
        }
        else
        {
            $all_trainer=Trainer::all()->toArray();
        }


        // echo '<pre>';
        // print_r($all_trainer);
        // //dd($all_trainer);
        echo json_encode($all_trainer);
    }

    public function schoolinfo(Request $req)
    {
   
      $school_id=$req->school_id;
        if($school_id == '0')
        {
     
          $events = [];
          $school_row=School::with('ClassSchedule')->get()->toArray();
          // $school_row=DB::table('Schools')->select('schools.*','class_schedule.*')
          //  ->leftjoin('class_schedule', 'schools.id', '=', 'class_schedule.school_id')->get();
             
          foreach($school_row as $row)
          {
               
               $date=date('Y-m-d',strtotime($row['created_at']));
               $school_weekly=$row['class_schedule'];
               //echo '<pre>';print_r($school_weekly);die();
               for($i=0; $i<count($school_weekly); $i++){
                    if($school_weekly[$i]['day'] == '1')
                    {
                         $day='Saturday';
                    }
                    if($school_weekly[$i]['day'] == '2')
                    {
                         $day='Sunday';
                    }
                    if($school_weekly[$i]['day'] == '3')
                    {
                         $day='Monday';
                    }
                    if($school_weekly[$i]['day'] == '4')
                    {
                         $day='Thuesday';
                    }
                    if($school_weekly[$i]['day'] == '5')
                    {
                         $day='Wednesday';
                    }
                    if($school_weekly[$i]['day'] == '6')
                    {
                         $day='Thursday';
                    }
                    if($school_weekly[$i]['day'] == '7')
                    {
                         $day='Friday';
                    }
                    $events[]=['title'=>$day.' ('.$school_weekly[$i]['start_time'].'-'.$school_weekly[$i]['end_time'].') '.'( Grade '.$school_weekly[$i]['grade'].'- sec '.$school_weekly[$i]['section'].' ) | '.$school_weekly[$i]['number_of_student'],'start'=>$date];
                  
                }
              
          }
      
        }
        else
        {

          $school_row=School::with('ClassSchedule')->find($school_id)->toArray();
          $date=date('Y-m-d',strtotime($school_row['created_at']));
          $school_weekly=$school_row['class_schedule'];

          $events = [];
          for($i=0; $i<count($school_weekly); $i++){
              if($school_weekly[$i]['day'] == '1')
              {
                   $day='Saturday';
              }
              if($school_weekly[$i]['day'] == '2')
              {
                   $day='Sunday';
              }
              if($school_weekly[$i]['day'] == '3')
              {
                   $day='Monday';
              }
              if($school_weekly[$i]['day'] == '4')
              {
                   $day='Thuesday';
              }
              if($school_weekly[$i]['day'] == '5')
              {
                   $day='Wednesday';
              }
              if($school_weekly[$i]['day'] == '6')
              {
                   $day='Thursday';
              }
              if($school_weekly[$i]['day'] == '7')
              {
                   $day='Friday';
              }
              $events[]=['title'=>$day.' ('.$school_weekly[$i]['start_time'].'-'.$school_weekly[$i]['end_time'].') '.'( Grade '.$school_weekly[$i]['grade'].'- sec '.$school_weekly[$i]['section'].' ) | '.$school_weekly[$i]['number_of_student'],'start'=>$date];
            
          }
        }

  
        //echo '<pre>';print_r($events);die();
    
         echo json_encode($events);
    }

    public function assigntrainer(Request $req)
    {

     //    echo $req->event_date; die(); 
        //$date=date('Y-m',strtotime($req->event_date));
    
     $date = Carbon::parse($req->event_date);

     $weekNumber = $date->weekNumberInMonth;
     $start = $date->startOfWeek()->toDateString();
     $end = $date->endOfWeek()->toDateString();
     
     $weekly_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date','>=',$start)->where('class_date','<=',$end)->sum('class_duration');

     $today_tainer_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date',$req->event_date)->sum('class_duration');      

     if(($weekly_hour >=4 )||($today_tainer_hour >= 4))
     {
        $response = [
          'today_tainer_hour' => 4,
          'trainer_id'=>$req->trainer_id    
          ];
     
          return json_encode($response); 
     }

     $TrainerAllocation=new TrainerAllocation();
     $TrainerAllocation->class_schedule=$req->class_schedule;
     $TrainerAllocation->school_id=$req->school_id;
     $TrainerAllocation->trainer_id=$req->trainer_id;
     $TrainerAllocation->class_date=$req->event_date;
     
        if($req->class_schedule)
        {
          $first_explode=explode('(',$req->class_schedule);
          $secoond_explode=explode(')',$first_explode[1]);
          $third_explode=explode('-',$secoond_explode[0]);


          $hourdiff = round((strtotime($third_explode[0]) - strtotime($third_explode[1]))/3600, 1);
        }
        $TrainerAllocation->class_start=$third_explode[0];
        $TrainerAllocation->class_end=$third_explode[1];   
        $TrainerAllocation->class_duration=abs($hourdiff);

        $success=$TrainerAllocation->save();

        /* Email send to school and trainer */

               //School Email--------------
               $one_school=School::where('id',$req->school_id)->get('official_email_id')->toArray();
               $school_email=$one_school['0']['official_email_id'];

              
               $email_body="New Trainer Assign";
       
               file_put_contents('../resources/views/mail.blade.php',$email_body);
               $data = array('email'=>$school_email,'subject'=>"Trainer Assign");
       
             
               $send_mail=Mail::send('mail', $data, function($message) use ($data){
                   $message->to($data['email'], 'kidsinterpreneurship')->subject
                      ($data['subject']);
                });

                
               //Trainer Email--------------
               $one_trainer=Trainer::where('id',$req->trainer_id)->get('official_email_id')->toArray();
               $trainer_email=$one_trainer['0']['official_email_id'];
    
              
               $email_body="New Trainer Assign";
       
               file_put_contents('../resources/views/mail.blade.php',$email_body);
               $data = array('email'=>$trainer_email,'subject'=>"Trainer Assign");
       
             
               $send_mail=Mail::send('mail', $data, function($message) use ($data){
                   $message->to($data['email'], 'kidsinterpreneurship')->subject
                      ($data['subject']);
                });
       
        /* End Email Send section */

        $after_weekly_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date','>=',$start)->where('class_date','<=',$end)->sum('class_duration');

        $after_today_tainer_hour=TrainerAllocation::where('school_id',$req->school_id)->where('trainer_id',$req->trainer_id)->sum('class_duration');

        if(($after_weekly_hour >=4 )||($after_today_tainer_hour >= 4))
        {
          $response = [
               'success' => 4,
               'trainer_id'=>$req->trainer_id    
           ];
          
           return json_encode($response);  
        } 

        if($success)
        {
          $response = [
               'success' => true,
               'message'=>'successfully Inserted!'
           ];
          
           return json_encode($response);  
        }
        
    }

    public function event_insert(Request $req)
    {
          $event=new AllocationEvent();
          $event->school_id=$req->school_id;
          $event->event_name=$req->event_name;
          $event->event_date=$req->event_date;
          $event->save();
    }
}
