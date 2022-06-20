<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Trainer;
use App\Models\School;
use Illuminate\Support\Facades\Mail;
use File;

class EventController extends Controller
{

    public function createevent()
    {
        return view('backend.event.add_event');
    }

    
    public function eventlist()
    {
        $event=Event::all();
        return view('backend.event.event_list',compact('event'));
    }

    public function eventstore(Request $req)
    {
       
        $validatedData = $req->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'event_last_date' => 'required',
            'event_fee' => 'required',
            'event_address'=> 'required',
            'landing_page'=>'required'
        ]);

        $event=new Event;
        $event->event_name=$req->event_name;
        $event->event_date=$req->event_date;
        $event->event_last_date=$req->event_last_date;
        $event->event_address=$req->event_address;
        $event->event_fee=$req->event_fee;
        $event->landing_page=$req->landing_page;
        $event->event_description=$req->event_description;

      
        $event_image=$req->event_image;
        $event_poster=$req->event_poster;

            

        if($event_image)
        {
            $image_name=Str::random(10);//unique nmae generate every time
            $ext=strtolower($event_image->getClientOriginalExtension());
            $image_full_name='eventimage_'.$image_name.'.'.$ext;

            $upload_path='image/event/';
            
            $success=$event_image->move($upload_path,$image_full_name);

            $event->event_image=$upload_path.$image_full_name;
        }

        if($event_poster)
        {
            $poster_all=array();
            foreach($event_poster as $posters){
                //$name=$posters->getClientOriginalName();
                $name=Str::random(10);
                $ext=strtolower($posters->getClientOriginalExtension());
                $image_full_name='poster_'.$name.'.'.$ext;
                $upload_path='image/event/poster/';
                $success=$posters->move($upload_path,$image_full_name);
                $poster_all[]=$upload_path.$image_full_name;
            }
            $event->event_poster=implode(',',$poster_all);
        }
    
        $success=$event->save();

        //Start All Trainer Email send 
        $trainer=Trainer::all()->toArray();
        foreach($trainer as $trainers)
        {
            $trainer_email[]=$trainers['email'];
            
        }
        //$change=["{app_name}","{receiver_name}","{action_by}"];
        //$change_to=['kidspreneurship',$data['school_name'],"Super admin"];
        //$email_body=str_replace($change,$change_to,$notification['mail_body']);
        $email_body='New Event has been created';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $emaie_data = array('subject'=>'Event created');
      
        $send_mail=Mail::send('mail',$emaie_data,function($message) use ($emaie_data,$trainer_email){
            $message->to($trainer_email)->subject
               ($emaie_data['subject']);
         });

        /* End Trainer Email send */


        //Start All School Email send 
        $school_data=School::all()->toArray();
        foreach($school_data as $school_datas)
        {
            $school_email[]=$school_datas['official_email_id'];
            
        }
        //$change=["{app_name}","{receiver_name}","{action_by}"];
        //$change_to=['kidspreneurship',$data['school_name'],"Super admin"];
        //$email_body=str_replace($change,$change_to,$notification['mail_body']);
        $email_body='New Event has been created';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $emaie_data = array('subject'=>'Event created');
      
        $send_mail=Mail::send('mail',$emaie_data,function($message) use ($emaie_data,$school_email){
            $message->to($school_email)->subject
               ($emaie_data['subject']);
         });

        /* End School Email send */



        if($success)
        {
             $notification=array(
                 'message'=>'Event successfully Inserted!',
                 'success'=>'success',
             );
 
             return redirect()->route('backend.eventlist.eventlist')->with($notification);
        }
    }

    public function viewevent ($id)
    {
        $event=Event::find($id);
       
        return view('backend.event.view_event',compact('event'));
    }


    public function editevent($id)
    {
        $event=Event::find($id);
        return view('backend.event.edit_event',compact('event')); 
    }

    public function eventupdate(Request $req)
    {
        $validatedData = $req->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'event_last_date' => 'required',
            'event_fee' => 'required',
            'event_address'=> 'required',
            'landing_page'=>'required'
        ]);

        $id=$req->event_id;
        $event= Event:: find($id);
        $event->event_name=$req->event_name;
        $event->event_date=$req->event_date;
        $event->event_last_date=$req->event_last_date;
        $event->event_address=$req->event_address;
        $event->landing_page=$req->landing_page;
        $event->event_fee=$req->event_fee;
        $event->event_description=$req->event_description;

        $event_image=$req->event_image;
        $event_poster=$req->event_poster;

        $old_event_image=$req->old_event_image;
        $old_event_poster=$req->old_event_poster;

        if($event_image)
        {
            if(File::exists($old_event_image)){
                unlink($old_event_image);
            }
            $image_name=Str::random(10);//unique nmae generate every time
            $ext=strtolower($event_image->getClientOriginalExtension());
            $image_full_name='eventimage_'.$image_name.'.'.$ext;

            $upload_path='image/event/';
            
            $success=$event_image->move($upload_path,$image_full_name);

            $event->event_image=$upload_path.$image_full_name;
        }

        if($event_poster)
        {
            if(File::exists($old_event_poster)){
                $poster=explode(',',$old_event_poster);
                // echo '<pre>';
                // print_r($poster);die();
                foreach($poster as $posters_new){
                  unlink($posters_new);
                }
            }
            $poster_all=array();
            foreach($event_poster as $posters){
                //$name=$posters->getClientOriginalName();
                $name=Str::random(10);
                $ext=strtolower($posters->getClientOriginalExtension());
                $image_full_name='poster_'.$name.'.'.$ext;
                $upload_path='image/event/poster/';
                $success=$posters->move($upload_path,$image_full_name);
                $poster_all[]=$upload_path.$image_full_name;
            }
            $event->event_poster=implode(',',$poster_all);
        }
   
        $success=$event->save();
        
        //Start All Trainer Email send 
        $trainer=Trainer::all()->toArray();
        foreach($trainer as $trainers)
        {
            $trainer_email[]=$trainers['email'];
            
        }
        //$change=["{app_name}","{receiver_name}","{action_by}"];
        //$change_to=['kidspreneurship',$data['school_name'],"Super admin"];
        //$email_body=str_replace($change,$change_to,$notification['mail_body']);
        $email_body='Event has been Edited';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $emaie_data = array('subject'=>'Event Edited');
        
        $send_mail=Mail::send('mail',$emaie_data,function($message) use ($emaie_data,$trainer_email){
            $message->to($trainer_email)->subject
                ($emaie_data['subject']);
        });

        /* End Trainer Email send */
       
       
        //Start All School Email send 
        $school_data=School::all()->toArray();
        foreach($school_data as $school_datas)
        {
            $school_email[]=$school_datas['official_email_id'];
            
        }
        //$change=["{app_name}","{receiver_name}","{action_by}"];
        //$change_to=['kidspreneurship',$data['school_name'],"Super admin"];
        //$email_body=str_replace($change,$change_to,$notification['mail_body']);
        $email_body='Event has been Edited';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $emaie_data = array('subject'=>'Event Edited');
        
        $send_mail=Mail::send('mail',$emaie_data,function($message) use ($emaie_data,$school_email){
            $message->to($school_email)->subject
                ($emaie_data['subject']);
        });
       
       /* End School Email send */

        if($success)
        {
             $notification=array(
                 'message'=>'Event successfully Updated!',
                 'success'=>'success',
             );
 
             return redirect()->route('backend.eventlist.eventlist')->with($notification);
        }
    }

    public function eventdelete($id)
    {
     
        $event=Event::find($id);

  
       
        if($event->event_image)
        {

            if(File::exists($event->event_image)){
                unlink($event->event_image);
            }
        }
        if($event->event_poster)
        {
            if(File::exists($event->event_poster)){
                $poster=explode(',',$event->event_poster);
                // echo '<pre>';
                // print_r($poster);die();
                foreach($poster as $posters_new){
                  unlink($posters_new);
                }
            }
        }
     
       
		$success=Event::where('id',$id)->delete();

        //Start All Trainer Email send 
        $trainer=Trainer::all()->toArray();
        foreach($trainer as $trainers)
        {
            $trainer_email[]=$trainers['email'];
            
        }
        //$change=["{app_name}","{receiver_name}","{action_by}"];
        //$change_to=['kidspreneurship',$data['school_name'],"Super admin"];
        //$email_body=str_replace($change,$change_to,$notification['mail_body']);
        $email_body='Event has been Deleted';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $emaie_data = array('subject'=>'Event Deleted');
        
        $send_mail=Mail::send('mail',$emaie_data,function($message) use ($emaie_data,$trainer_email){
            $message->to($trainer_email)->subject
                ($emaie_data['subject']);
        });

        /* End Trainer Email send */
        
        
        //Start All School Email send 
        $school_data=School::all()->toArray();
        foreach($school_data as $school_datas)
        {
            $school_email[]=$school_datas['official_email_id'];
            
        }
        //$change=["{app_name}","{receiver_name}","{action_by}"];
        //$change_to=['kidspreneurship',$data['school_name'],"Super admin"];
        //$email_body=str_replace($change,$change_to,$notification['mail_body']);
        $email_body='Event has been Deleted';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $emaie_data = array('subject'=>'Event Deleted');
        
        $send_mail=Mail::send('mail',$emaie_data,function($message) use ($emaie_data,$school_email){
            $message->to($school_email)->subject
                ($emaie_data['subject']);
        });
        
        /* End School Email send */

        if($success)
        {
            $notification=array(
                'message'=>'Event Successfully deleted!',
                'success'=>'success',
            );
            return redirect()->back()->with($notification);
        }
		
    }

 
}
