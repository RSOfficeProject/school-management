<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\AdminOthers;

class AdminsettingController extends Controller
{
    public function trainerGuide(){
        $guide = AdminOthers::where('setting_name','trainer_guide')->first()->toArray();
        return view('backend.others.trainerguide')->with('guide',$guide);
    }

    public function updateTrainerguide(Request $request){

        $validated = $request->validate([
            'description' => 'required',
        ]);

        $guide = AdminOthers::where('setting_name','trainer_guide')->first();
        $guide->setting_name = "trainer_guide";
        $guide->setting_value = $request->description;
        $guide->save();

        return redirect()->route('backend.trainerguide.trainerGuide')->with('success', 'Data Updated successfully.');
    
    }
    public function resources(){
        $resource = AdminOthers::where('setting_name','resources')->first()->toArray();
        return view('backend.others.resources')->with('resource',$resource);
    }
    public function updateResources(Request $request){
        $validated = $request->validate([
            'resource' => 'required',
        ]);

        $guide = AdminOthers::where('setting_name','resources')->first();
        $guide->setting_name = "resources";
        $guide->setting_value = $request->resource;
        $guide->save();

        return redirect()->route('backend.resources.resources')->with('success', 'Data Updated successfully.');
    }
    public function trainerTerms(){
        $trainerterm = AdminOthers::where('setting_name','trainer_terms_and_privacy_policy')->first()->toArray();
        return view('backend.others.trainer_terms')->with('trainerterm',$trainerterm);
    }

    public function updateTrainerTerms(Request $request){
        
        $validated = $request->validate([
            'trainer_description' => 'required',
        ]);

        $guide = AdminOthers::where('setting_name','trainer_terms_and_privacy_policy')->first();
        $guide->setting_name = "trainer_terms_and_privacy_policy";
        $guide->setting_value = $request->trainer_description;
        $guide->save();

        return redirect()->route('backend.trainerterms.trainerTerms')->with('success', 'Data Updated successfully.');
    }

    public function schoolTerms(){
       $schoolterm = AdminOthers::where('setting_name','school_terms_and_privacy_policy')->first()->toArray();
        return view('backend.others.school_terms')->with('trainerterm',$schoolterm);
    }

    public function updateSchoolTerms(Request $request){
        
        $validated = $request->validate([
            'school_description' => 'required',
        ]);
        //::where('setting_name','school_terms_and_privacy_policy')->first();
        $guide = AdminOthers::where('setting_name','school_terms_and_privacy_policy')->first();
        $guide->setting_name = "school_terms_and_privacy_policy";
        $guide->setting_value = $request->school_description;
        $guide->save();

        return redirect()->route('backend.schoolterms.schoolTerms')->with('success', 'Data Updated successfully.');
    }

    public function studentTerms(){
        $studentterm = AdminOthers::where('setting_name','student_terms_and_privacy_policy')->first()->toArray();
         return view('backend.others.student_terms')->with('studentterm',$studentterm);
     }
 
     public function updateStudentTerms(Request $request){
         
         $validated = $request->validate([
             'student_description' => 'required',
         ]);
         
         $guide = AdminOthers::where('setting_name','student_terms_and_privacy_policy')->first();
         $guide->setting_name = "student_terms_and_privacy_policy";
         $guide->setting_value = $request->student_description;
         $guide->save();
 
         return redirect()->route('backend.studentterms.studentTerms')->with('success', 'Data Updated successfully.');
     }

    
}