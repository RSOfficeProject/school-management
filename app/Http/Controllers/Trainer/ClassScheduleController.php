<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use App\Models\TrainerAllocation;
use App\Models\Trainer;
use Carbon\Carbon;

class ClassScheduleController extends Controller
{
    public function classSchedule()
    {
        return view('trainer.schedule.class_schedule');
    }
    public function trainer_classSchedule()
    {
        $userId = Session::get('user_id');
         
        $trainer=Trainer::where('user_id', $userId)->first();
        
        $trainer_schedule=TrainerAllocation::where('trainer_id',$trainer['id'])->get();
        
        $events = [];
        foreach($trainer_schedule as $trainer_schedules)
        {  
          $start_time= $trainer_schedules->class_date.'T'.$trainer_schedules->class_start;
          $end_time= $trainer_schedules->class_date.'T'.$trainer_schedules->class_end;
          $events[]=['title'=>'Class Time','start'=>$start_time,'end'=>$end_time,'color'=>'purple'];
          //$events[]=['title'=>'Class Time','start'=>$trainer_schedules->class_date];
          
        }
        
        //echo '<pre>';
        //print_r($events);die();
        echo json_encode($events);
        
    }
}
