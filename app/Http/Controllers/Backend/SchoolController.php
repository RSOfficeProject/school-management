<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\School;
use App\Models\Userprofile;
use App\Models\User;
use App\Models\Grade;
use App\Models\EmailInfo;
use App\Models\EmailNotification;
use App\Models\ClassSchedule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
use App\Models\Students;

use App\Events\Backend\UserCreated;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\Models\Permission;

class SchoolController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:school_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');
        $this->module_name = 'users';
    }

    public function schoolCreate()
    {
        $grade = Grade::all();
        return view('backend.school.add_school', compact('grade'));
    }

    public function schoolStore(Request $req)
    {
        $validatedData = $req->validate([
            'school_name' => 'required',
            'city' => 'required',
            'principle_name' => 'required',
            'country' => 'required',
            'membership_plan' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();

        if (empty($user)) {

            $module_name = $this->module_name;
            $module_name_singular = Str::singular($module_name);

            $data_array = $req->except('_token', 'roles', 'permissions', 'password_confirmation');
            $data_array['name'] = $req->school_name;
            $data_array['group'] = 2;
            $data_array['password'] = Hash::make("school");

            if ($req->confirmed == 1) {
                $data_array = Arr::add($data_array, 'email_verified_at', Carbon::now());
            } else {
                $data_array = Arr::add($data_array, 'email_verified_at', null);
            }

            $$module_name_singular = User::create($data_array);
            $user_id = DB::getPdo()->lastInsertId();

            $roles = Role::select('name')->where('id', 7)->get()->toArray();
            $permissions = Permission::select('name')->whereIn('id', [1, 40])->get()->toArray();
            $permission = array();
            $role = array();
            foreach ($roles as $getrole) {
                $role[] = $getrole['name'];
            }

            foreach ($permissions as $getper) {
                $permission[] = $getper['name'];
            }

            $module_name_singular = Str::singular('user');

            if (isset($roles)) {
                $$module_name_singular->syncRoles($roles);
            } else {
                $roles = [];
                $$module_name_singular->syncRoles($roles);
            }

            // Sync Permissions
            if (isset($permissions)) {
                $$module_name_singular->syncPermissions($permissions);
            } else {
                $permissions = [];
                $$module_name_singular->syncPermissions($permissions);
            }

            // Username
            $id = $$module_name_singular->id;
            $username = config('app.initial_username') + $id;
            $$module_name_singular->username = $username;
            $$module_name_singular->save();

            event(new UserCreated($$module_name_singular));
        } else {
            return redirect()->back()->with('email_faild', 'Sorry Email Already Exits.');
        }

        // echo 11; die();


        $school = new School();
        $school->school_name = $req->school_name;
        $school->city = $req->city;
        $school->principle_name = $req->principle_name;
        $school->country = $req->country;
        $school->official_email_id = $req->email;
        $school->contact_number = $req->contact_number;
        $school->membership_plan = $req->membership_plan;
        $school->user_id = $user_id;


        $student_grade = $req->number_of_student;
        $i = 1;
        $grade = 'grade';
        $all_grade = array();
        foreach ($student_grade as $grade_value) {
            $all_grade[$i] = $grade_value;
            $i++;
        }

        $new = json_encode($all_grade);



        $school->number_of_student = $new;



        $success = $school->save();

        if ($success) {
            $ClassSchedule = new ClassSchedule();
            $ClassSchedule->school_id = $school->id;
            $ClassSchedule->save();
        }

        //Start Email send section-----
        $notification = EmailNotification::find(1)->toArray();

        $change = ["{app_name}", "{receiver_name}", "{email}", "{pass}"];
        $change_to = ['kidspreneurship', $req->school_name, $req->email, "school"];
        $email_body = str_replace($change, $change_to, $notification['mail_body']);


        file_put_contents('../resources/views/mail.blade.php', $email_body);


        $data = array('email' => $req->email, 'subject' => $notification['mail_sub']);


        Mail::send('mail', $data, function ($message) use ($data) {
            $message->to($data['email'], 'Tutorials Point')->subject($data['subject']);
        });

        if ($notification) {
            $school_email = new EmailInfo;
            $school_email->name = $req->school_name;
            $school_email->mail_description = $email_body;
            $school_email->group = 2;
            $school_email->save();
        }
        /*End  Email section */

        if ($success) {
            $notification = array(
                'message' => 'School successfully Inserted!',
                'success' => 'success',
            );
            return redirect()->route('backend.schoollist.schoolList')->with($notification);
        }
    }

    public function schoolList()
    {
        $school_list = School::all();
        // echo '<pre>';
        // print_r($school_list);
        // die();
        return view('backend.school.school_list', compact('school_list'));
    }

    public function schoolEdit($id)
    {
        $school = School::with('ClassSchedule')->find($id)->toArray();
        //    echo '<pre>';
        //    print_r($school);die();
        $grade = Grade::all();
        return view('backend.school.edit_school', compact('school', 'grade'));
    }

    public function schoolUpdate(Request $req)
    {
        // echo 11; die();
        $schhol_id = $req->school_id;
        $email = $req->school_email;

        $validatedData = $req->validate([
            'school_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'year_establish' => 'required',
            'incharge_name' => 'required',
            'incharge_email' => 'required',
            'contact_number' => 'required',

        ]);

        $user = User::where('email', $req->official_email_id)->first();


        if (!empty($user)) {

            if ($user['email'] == $req->official_email_id && $user['id'] == $req->user_id) {
                $user = User::find($req->user_id);
                $user->name = $req->school_name;
                $user->email = $req->official_email_id;
                $user->save();
            } else {
                // echo 22; die();
                return redirect()->back()->with('email_faild', 'Sorry Official Email Already Exits.');
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
        $data['city'] = $req->city;
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

        /*=================================================
                        CSV Upload Start
        ==================================================*/
        $csvUpload = $req->file('upload_csv');
        if ($csvUpload) {
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
                    $data_array['password'] = Hash::make("school");
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

                }
                $i++;
            }
        }

        /*=================================================
                        CSV Upload End
        ==================================================*/

        // $student_grade=$req->number_of_student;
        // $i=1;
        // $grade='grade';
        // $all_grade=array();
        // foreach($student_grade as $grade_value)
        // {
        //     $all_grade[$i]=$grade_value;
        //     $i++;
        // }

        // $new=json_encode($all_grade);
        // $data['number_of_student']=$new;

        // echo '<pre>';
        // print_r($_POST);
        // die();
        $day = $req->day;
        $start_time = $req->start_time;
        $end_time = $req->end_time;
        $grade = $req->grade;
        $sec = $req->sec;
        $number_student = $req->number_student_new;

        //Previous all class schedule delete by this school id---
        ClassSchedule::where('school_id', $schhol_id)->delete();

        $ClassSchedule = new ClassSchedule();
        foreach ($req->day as $key => $days) {
            ClassSchedule::create([
                'school_id' => $schhol_id,
                'day' => $day[$key],
                'start_time' => $start_time[$key],
                'end_time' => $end_time[$key],
                'grade' => $grade[$key],
                'section' => $sec[$key],
                'number_of_student' => $number_student[$key]
            ]);
        }
        $success = School::where("id", $schhol_id)->update($data);

        //Start Email send section-----
        $notification = EmailNotification::find(10)->toArray();

        $change = ["{app_name}", "{receiver_name}", "{action_by}"];
        $change_to = ['kidspreneurship', $data['school_name'], "Super admin"];
        $email_body = str_replace($change, $change_to, $notification['mail_body']);

        file_put_contents('../resources/views/mail.blade.php', $email_body);

        // echo $data['incharge_email']; die();

        $data = array('email' => $req->official_email_id, 'subject' => $notification['mail_sub']);


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
            $notification = array(
                'message' => 'School successfully Updated!',
                'success' => 'success',
            );

            return redirect()->route('backend.schoollist.schoolList')->with($notification);
        }
    }

    public function schoolDelete($id)
    {
        $data = School::find($id);



        if ($data->school_logo) {

            if (File::exists($data->school_logo)) {
                unlink($data->school_logo);
            }
        }
        if ($data->upload_excel) {
            if (File::exists($data->upload_excel)) {
                unlink($data->upload_excel);
            }
        }
        //echo $data->user_id;die();
        $user = User::where('id', $data->user_id)->first();

        $success = School::where('id', $id)->delete();

        if ($success) {
            $notification = array(
                'message' => 'School Successfully deleted!',
                'success' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function viewschool($id)
    {
        $school = School::with('user')->find($id);
        // echo '<pre>';
        // print_r($school);die();
        return view('backend.school.viewschool', compact('school'));
    }

    public function schoolnotification()
    {
        $email = EmailInfo::where('group', 2)->get();

        return view('backend.trainer.trainer_notification', compact('email'));
    }
}
