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
use Auth;
use Log;
use File;
use Image;
use DB;
use Hash;

class ContentController extends Controller
{
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    //     $this->middleware('permission:trainer_edit');
    //     //$this->middleware('role:admin|writer')->only('testmiddleware');

    //     $this->module_name = 'users';
    // }

    public function contentView(){
        return view('content.view');
    }
    
} 