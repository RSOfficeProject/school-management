<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\School;
use App\Models\TrainerAllocation;
Use \Carbon\Carbon;

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

        $school_row=School::find($school_id);

     //    echo '<pre>';
     //    print_r($school_row);die();
        $date=date('Y-m-d',strtotime($school_row->created_at));
        $school_weekly=json_decode($school_row->weekly_class_for_grade,true);
        
        $events = [];
        for($i=0; $i<count($school_weekly['day']); $i++){
            if($school_weekly['day'][$i] == '1')
            {
                 $day='Saturday';
            }
            if($school_weekly['day'][$i] == '2')
            {
                 $day='Sunday';
            }
            if($school_weekly['day'][$i] == '3')
            {
                 $day='Monday';
            }
            if($school_weekly['day'][$i] == '4')
            {
                 $day='Thuesday';
            }
            if($school_weekly['day'][$i] == '5')
            {
                 $day='Wednesday';
            }
            if($school_weekly['day'][$i] == '6')
            {
                 $day='Thursday';
            }
            if($school_weekly['day'][$i] == '7')
            {
                 $day='Friday';
            }
            $events[]=['title'=>$day.' ('.$school_weekly['start_time'][$i].'-'.$school_weekly['end_time'][$i].') '.'( Grade '.$school_weekly['grade'][$i].'- sec '.$school_weekly['sec'][$i].' ) | '.$school_weekly['number_student'][$i],'start'=>$date];
          
        }
  
        //echo json_encode($events); 
        // echo '<pre>';
        // print_r($events);die();
         //header('Content-Type: application/json; charset=utf-8');
        //file_put_contents('../public/event.php',$events);
         echo json_encode($events);
    }

    public function assigntrainer(Request $req)
    {
        
     //    $today_tainer_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date',$req->event_date)->sum('class_duration');

     //    if($today_tainer_hour >= 4)
     //    {
     //      $response = [
     //           'today_tainer_hour' => 4,  
     //       ];
          
     //       return json_encode($response); 
     //    }
        //echo $req->event_date;  
        $date=date('Y-m',strtotime($req->event_date));
        $start_first_week=$date.'-01';
        $end_first_week=date('Y-m-d', strtotime($date. ' + 6 days'));
        $start_second_week=date('Y-m-d', strtotime($end_first_week. ' + 1 days'));  
        $end_second_week=date('Y-m-d', strtotime($start_second_week. ' + 6 days'));
        $start_third_week=date('Y-m-d', strtotime($end_second_week. ' + 1 days'));  
        $end_third_week=date('Y-m-d', strtotime($start_third_week. ' + 6 days'));
        echo $start_4th_week=date('Y-m-d', strtotime($end_third_week. ' + 1 days'));  
        echo $end_4th_week=date('Y-m-d', strtotime($start_4th_week. ' + 6 days')); die();

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
          
        $TrainerAllocation->class_duration=abs($hourdiff);

        $success=$TrainerAllocation->save();

     //    $total_hour=TrainerAllocation::where('school_id',$req->school_id)->where('trainer_id',$req->trainer_id)->sum('class_duration');
     //    if($total_hour >= 4)
     //    {
     //      $response = [
     //           'success' => 4,
     //           'trainer_id'=>$req->trainer_id    
     //       ];
          
     //       return json_encode($response);  
     //    } 

        if($success)
        {
          $response = [
               'success' => true,
               'message'=>'successfully Inserted!'
           ];
          
           return json_encode($response);  
        }
        
    }
}
