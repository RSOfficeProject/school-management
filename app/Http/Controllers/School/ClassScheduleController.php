<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Http\Request;
use App\Models\School;
use Carbon\Carbon;

class ClassScheduleController extends Controller
{
    public function class_schedule()
    {



      
      return view('school.class_schedule.schedule');
    }

    public function school_classSchedule()
    {
      $userId = Session::get('user_id');
         
      $schoolId = School::where('user_id', $userId)->first();

      //Class Schedule------------------
      $class_schedule=School::with('ClassSchedule')->find($schoolId->id)->toArray();
      // echo '<pre>'; print_r($class_schedule); die();
      
      $today_date = Carbon::now()->format('Y-m-d');
      $events = [];
      foreach($class_schedule['class_schedule'] as $schedules)
      {

        // $start_time= $today_date.'T'.$schedules['start_time'];
        // $end_time= $today_date.'T'.$schedules['end_time'];
        $events[]=['title'=>'Class Time','daysOfWeek'=>[$schedules['day']],'startTime'=>$schedules['start_time'],'endTime'=>$schedules['end_time'],'color'=>'purple'];
        
      }
      
      echo json_encode($events);
     
    }
}
