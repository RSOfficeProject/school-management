<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Models\School;
use App\Models\Grade;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\EmailInfo;
use App\Models\Students;
use App\Models\EmailNotification;
use App\Models\Event;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

use File;
use DB;

class ManageschoolController extends Controller
{
    public function index()
    {
       $userId = Session::get('user_id');
       $school = School::with('user')->where('user_id', $userId)->first();
    //    echo '<pre>'; print_r($school); die();

        return view('school.index', [
            'school' => $school,
        ]);
    }
    public function profileEdit()
    {
        $userId = Session::get('user_id');
        $schoolId = School::where('user_id', $userId)->first();
        $school = School::find($schoolId['id']);
        $grade = Grade::all();
        // echo '<pre>'; print_r($schoolLists); die();

        return view('school.profile.edit_profile', [
            'school' => $school,
            'grade' => $grade,
        ]);
    }

    public function updateSchool(Request $req)
    {

        $schhol_id = $req->school_id;
        // echo '<pre>'; print_r($schhol_id); die();

        $email = $req->school_email;

        $validatedData = $req->validate([
            'school_name' => 'required',
            'address' => 'required',
            'year_establish' => 'required',
            'incharge_name' => 'required',
            'incharge_email' => 'required',
            'contact_number' => 'required',
        ]);

        $user = User::where('email', $req->official_email_id)->first();
        // echo $req->official_email_id; die();
        // echo '<pre>'; print_r($user); die();

        if (!empty($user)) {

            if ($user['email'] == $req->official_email_id && $user['id'] == $req->user_id) {
                $user = User::find($req->user_id);
                $user->name = $req->school_name;
                $user->email = $req->official_email_id;
                $user->save();
            } else {
                return redirect()->back()->with('email_faild', 'Sorry Incharge Email Already Exits.');
            }
        } else {
            $user = User::find($req->user_id);
            $user->name = $req->school_name;
            $user->email = $req->official_email_id;
            $user->save();
        }

        $user_profile = Userprofile::where('user_id', $req->user_id)->first();
        $user_profile->email = $req->official_email_id;
        $user_profile->name = $req->school_name;
        $user_profile->save();

        //incharge email--------------------
        $school_row = School::where('incharge_email', $req->incharge_email)->first();

        if (!empty($school_row)) {
            if ($school_row['incharge_email'] == $req->incharge_email && $school_row['id'] == $req->school_id) {
                $data['incharge_email'] = $req->incharge_email;
            } else {
                return redirect()->back()->with('email_faild', 'Sorry incharge email id Already Exits.');
            }
        } else {
            $data['incharge_email'] = $req->incharge_email;
        }

        $data['school_name'] = $req->school_name;
        $data['school_address'] = $req->address;
        $data['year_establish'] = $req->year_establish;
        $data['incharge_name'] = $req->incharge_name;
        $data['official_email_id'] = $req->official_email_id;
        $data['contact_number'] = $req->contact_number;
        $data['kidspreneurship_representative'] = $req->partner_name;
        $data['course_start_date'] = $req->course_start_date;
        $data['membership_plan'] = $req->membership_plan;

        $school_logo = $req->school_logo;
        $school_cover = $req->school_cover_image;

        $old_school_logo = $req->old_school_logo;
        $old_cover_image = $req->old_cover_image;

        if ($school_logo) {

            if (File::exists($old_school_logo)) {
                unlink($old_school_logo);
            }
            $image_name = Str::random(10); //unique nmae generate every time
            $ext = strtolower($school_logo->getClientOriginalExtension());
            $image_full_name = 'school_' . $image_name . '.' . $ext;
            $upload_path = 'image/school/';
            $success = $school_logo->move($upload_path, $image_full_name);
            $data['school_logo'] = $upload_path . $image_full_name;
        }

        if ($school_cover) {
            if (File::exists($old_cover_image)) {
                unlink($old_cover_image);
            }
            $excel_name = Str::random(10); //unique nmae generate every time
            $ext = strtolower($school_cover->getClientOriginalExtension());
            $image_full_name = 'cover_' . $excel_name . '.' . $ext;

            $upload_path = 'image/school/cover_image/';
            $success = $school_cover->move($upload_path, $image_full_name);

            $data['school_cover_image'] = $upload_path . $image_full_name;
        }

        // echo 11; die();

        /*=================================================
                        CSV Upload Start
        ==================================================*/
        $csvUpload = $req->file('upload_csv');
        if ($csvUpload) {
            // echo '<pre>'; echo "csv"; die();
            
            $fileType = $csvUpload->getClientOriginalExtension();
            $fileName = 'student_' . Str::random(10) . '.' . $fileType;
            $csvUpload->move('csv/upload/', $fileName);

            $handle = fopen(public_path('csv/upload/' . $fileName), "r");

            $i = 1;
            

            while ($row = fgetcsv($handle)) {
                if ($i != 1) {

                    $data_array = $req->except('_token', 'roles', 'permissions', 'password_confirmation');
                    $data_array['name'] = $row[0];
                    $data_array['email'] = $row[9];
                    $data_array['group'] = 4;
                    $data_array['password'] = Hash::make("student");
                    $data_array['date_of_birth'] = $row[13];
                    $data_array['gender'] = $row[15];
                    $data_array['mobile'] = $row[10];

                    // echo '<pre>'; print_r($data_array); die();
            
                    if ($req->confirmed == 1) {
                        $data_array = Arr::add($data_array, 'email_verified_at', Carbon::now());
                    } else {
                        $data_array = Arr::add($data_array, 'email_verified_at', null);
                    }
            
                    User::create($data_array);
                    $user_id = DB::getPdo()->lastInsertId();

                    $students = new Students();
                    $students->user_id = $user_id;
                    $students->school_id = $schhol_id;
                    $students->project = $row[1];
                    $students->assignment = $row[2];
                    $students->classes_held = $row[3];
                    $students->classes_attended = $row[4];
                    $students->attendance = $row[5];
                    $students->overal_grade = $row[6];
                    $students->father_name = $row[7];
                    $students->mother_name = $row[8];
                    $students->address = $row[11];
                    $students->blood_group = $row[12];
                    $students->activity_incharge = $row[14];
                    $students->grade_id = $row[16];
                    $students->save();

                    // echo '<pre>'; print_r($students); die();

                    $user_profile = new Userprofile();
                    $user_profile->user_id = $user_id;
                    $user_profile->email = $row[9];
                    $user_profile->name = $row[0];
                    $user_profile->save();



                    //Student Account Mail
                    
                    $email = $row[9];
                    echo $emailSub = "Student created!!";

                    $emailBody = "Student Name: ".$row[0]."<br>";
                    $emailBody .= "Student Username: ".$row[9]."<br>";
                    $emailBody .= "Student Password: student <br>";

                    $emailBody .= "Please login your dashboard by clicking this link <a href='".url('school/dashboard')."'>click here</a> <br>";
                    echo $emailBody .= 'Thanks <br> Kidspreneurship';
                    
                    
                    $data = array('email'=> $email,'subject'=> $emailSub);
                    
                    file_put_contents('../resources/views/mail.blade.php',$emailBody);
                    
                    Mail::send('mail', $data, function($message) use ($data){
                        $message->to($data['email'], 'Kidspreneurship')->subject($data['subject']);
                    });


                    $student_email = new EmailInfo;
                    $student_email->name = $row[0];
                    $student_email->mail_address = $email;
                    $student_email->mail_description = $emailBody;
                    $student_email->group = 4;
                    $student_email->save();
                }
                $i++;
            }
            

            // die();
        }

        /*=================================================
                        CSV Upload End
        ==================================================*/

        $student_grade = $req->number_of_student;
        $i = 1;
        $grade = 'grade';
        $all_grade = array();
        foreach ($student_grade as $grade_value) {
            $all_grade[$i] = $grade_value;
            $i++;
        }

        $new = json_encode($all_grade);
        $data['number_of_student'] = $new;

        $weekly_class['day'] = $req->day;
        $weekly_class['start_time'] = $req->start_time;
        $weekly_class['end_time'] = $req->end_time;
        $weekly_class['grade'] = $req->grade;
        $weekly_class['sec'] = $req->sec;
        $weekly_class['number_student'] = $req->number_student_new;

        $data['weekly_class_for_grade'] = json_encode($weekly_class);

        // echo "<pre>"; print_r($data); die();

        $success = School::where("id", $schhol_id)->update($data);

        // echo "<pre>"; print_r($success); die();

        //Start Email send section-----
        $notification = EmailNotification::find(10)->toArray();

        $change = ["{app_name}", "{receiver_name}", "{action_by}"];
        $change_to = ['kidspreneurship', $data['school_name'], "Super admin"];
        $email_body = str_replace($change, $change_to, $notification['mail_body']);
        file_put_contents('../resources/views/mail.blade.php', $email_body);
        $data = array('email' => $data['incharge_email'], 'subject' => $notification['mail_sub']);

        $send_mail = Mail::send('mail', $data, function ($message) use ($data) {
            $message->to($data['email'], 'Tutorials Point')->subject($data['subject']);
        });

        /*End  Email section */
        if ($notification) {
            $school_email = new EmailInfo;
            $school_email->name = $req->school_name;
            $school_email->mail_description = $email_body;
            $school_email->group = 2;
            $school_email->save();
        }
        if ($success) {
            // $notification = array(
            //     'message' => 'School successfully Updated!',
            //     'success' => 'success',
            // );
            return redirect('/school/profile/edit')->with('message', 'School successfully Updated!');
        }
    }

    public function eventList(){
        $event = Event::all();
        return view('school.event.event_list', [
            'event' => $event
        ]);
    }

    public function eventView($id){
        $event = Event::find($id);
        return view('school.event.view_event', [
            'event' => $event
        ]);
    }

    public function privacyPolice(){
        return view('school.terms.privacy_police');
    }
}
