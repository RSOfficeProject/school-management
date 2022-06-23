<?php

namespace App\Http\Controllers\Trainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\grade;
use App\Models\EmailNotification;
use App\Models\Trainer;
use App\Models\Userprofile;
use Illuminate\Support\Str;
use App\Events\Backend\UserCreated;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ModelHasRoles;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\EmailInfo;
use App\Models\TrainerEducationBackground;

use Illuminate\Support\Facades\Session; 
use File;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:trainer_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');

        $this->module_name = 'users';
    }

    public function index(){
        return view('trainer.index');
    }

    public function profile()
    {
        $userId = Session::get('user_id');
        $trainer=Trainer::where('user_id', $userId)->first();

        $trainer_education=TrainerEducationBackground::where('trainer_id',$trainer->id)->get();

        //print_r($trainer_education);die();

        return view('trainer.profile.profile',compact('trainer','trainer_education'));
    }

    public function profile_update(Request $request)
    {
        $validated = $request->validate([
            'trainer_name' => 'required',
            'official_email_id' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'city' => 'required',
            'incharge_email' => 'required',
            'join_date' => 'required',
            //'image' => 'required',
            'mode' => 'required',
            'type' => 'required',
            'status' => 'required',
            'no_of_hour_per_week' => 'required',
        ]);

        $user= User:: where('email',$request->official_email_id)->first();

        if(!empty($user)){
            
            if($user['email']==$request->official_email_id && $user['id']==$request->user_id){
                $user= User:: find($request->user_id);
                $user->name = $request->trainer_name;
                $user->email = $request->official_email_id;
                $user->save();
            }else{
                return redirect()->back()->with('email_faild', 'Sorry Email Already Exits.');
            }
        }else{

            $user= User:: find($request->user_id);
            $user->name = $request->trainer_name;
            $user->email = $request->official_email_id;

            $user->save();
        }

        $user_profile= Userprofile:: where('user_id',$request->user_id)->first();
        $user_profile->email = $request->official_email_id;
        $user_profile->name = $request->trainer_name;
        $user_profile->save();

        //profile update start----------
        $trainer= trainer:: find($request->id);

        $request_image = $request->image;
        $old_image= $request->pre_image; 
        
        if(!empty($request_image))
        {
     
           $image_path = public_path('/image/trainer/');
            if(File::exists($image_path.$old_image)){
				unlink($image_path.$old_image);
			}
            $img_name = time().'.'.$request_image->getClientOriginalExtension();
            $upload_path='image/trainer/';
            $success=$request_image->move($upload_path,$img_name);
            $trainer->image=$img_name;
        }

        $trainer->trainer_name = $request->trainer_name;

        $trainer->official_email_id= $request->official_email_id;
        $trainer->incharge_email= $request->incharge_email;

        $trainer->contact_no= $request->contact_no;
        $trainer->address= $request->address;
        $trainer->city= $request->city;
        $trainer->join_date = $request->join_date;
        $trainer->date_of_birth= $request->date_of_birth;
        $trainer->mode= $request->mode;
        $trainer->type = $request->type;
        $trainer->status = $request->status;
        $trainer->no_of_hour_per_week = $request->no_of_hour_per_week;
        $trainer->save();

        $school_name=$request->school_name;
        $school_location=$request->school_location;
        $degree=$request->degree;
        $pass_year=$request->pass_year;
        $gread=$request->gread;

         //Previous all data delete at Trainer Education Backgroundby this trainer id---
         TrainerEducationBackground::where('trainer_id',$request->id)->delete();

        foreach($school_name as $key=>$school_names)
        {
            TrainerEducationBackground::create([
                'trainer_id' => $request->id,
                'school_name' => $school_name[$key],
                'school_location' => $school_location[$key],
                'degree' => $degree[$key],
                'pass_year' => $pass_year[$key],
                'gread' => $gread[$key],
             ]);
        }


        return redirect()->back()->with('update_success', 'Data Updated successfully.');
    }
    
} 