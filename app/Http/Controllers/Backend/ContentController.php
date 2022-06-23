<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use App\Models\School;
use App\Models\User;
use App\Models\Grade;
use App\Models\AgeGroup;
use App\Models\Stream;
use App\Models\Content;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;
use Log;
use File;
use Image;
use DB;
// use Illuminate\Validation\Validator;
use Validator;

class ContentController extends Controller
{
    public function addContent()
    {
        $streams = Stream::get()->toArray();
        $AgeGroups = AgeGroup::get()->toArray();
        return view('backend.content.add_content')->with('streams', $streams)->with('AgeGroups', $AgeGroups);
    }

    public function storeContent(Request $request)
    {

        $validated = $request->validate([
            'ageGroup_id' => 'required',
            'stream_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);


        if ($request->hasFile('worksheets')) {

            $file = $request->file('worksheets');
            $filename = $file->getClientOriginalName();
            $path = public_path('/files/content/');
            $file->move($path, $filename);
            $worksheet_url = $filename;
        }

        if ($request->hasFile('video')) {

            $file2 = $request->file('video');
            $video = $file2->getClientOriginalName();
            $path = public_path('/video/content/');
            $file2->move($path, $video);
            $video_url = $video;
        }

        $content = new Content;
        $content->title = $request->title;
        $content->description = $request->description;
        $content->ageGroup_id = $request->ageGroup_id;
        $content->stream_id = $request->stream_id;
        $content->video = $video_url;
        $content->worksheet = $worksheet_url;
        $content->save();
        return redirect()->route('backend.contentlist.contentList')->with('success', 'Data Stored successfully.');
    }

    public function contentList()
    {
        $contents = Content::with(['getStream', 'getAgeGroup'])->get()->toArray();
        //echo "<pre>";print_r($contents);die();
        return view('backend.content.content_list')->with('contents', $contents);
    }

    public function addStream(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stream_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $user_id = Session::get('user_id');
            $last_name = Session::get('last_name');
            $first_name = Session::get('first_name');
            $user_name = $first_name . ' ' . $last_name;
            $stream_name = $request->stream_name;

            $stream = new Stream;
            $stream->title = $stream_name;
            $stream->creator_id = $user_id;
            $stream->creator = $user_name;
            $stream->save();

            $get_data = Stream::latest()->first()->toArray();
            return response()->json($get_data);
        }
    }
    public function addAgeGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'agegroup_name' => 'required'
        ]);
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);

        } else {
            $user_id = Session::get('user_id');
            $last_name = Session::get('last_name');
            $first_name = Session::get('first_name');
            $user_name = $first_name . ' ' . $last_name;

            $agegroup_name = $request->agegroup_name;

            $stream = new AgeGroup;
            $stream->age = $agegroup_name;
            $stream->creator_id = $user_id;
            $stream->creator = $user_name;
            $stream->save();

            $get_age = AgeGroup::latest()->first()->toArray();
            return response()->json($get_age);
        }
    }

    public function contentView($id)
    {
        // $streams = Stream::get()->toArray();
        // $AgeGroups = AgeGroup::get()->toArray();->with('streams',$streams)->with('AgeGroups',$AgeGroups)
        $content = Content::with(['getStream', 'getAgeGroup'])->find($id)->toArray();
        return view('backend.content.view_content')->with('content', $content);
    }

    public function contentEdit($id)
    {

        $streams = Stream::get()->toArray();
        $AgeGroups = AgeGroup::get()->toArray();
        $content = Content::find($id)->toArray();
        return view('backend.content.edit_content')->with('streams', $streams)->with('AgeGroups', $AgeGroups)->with('content', $content);
    }

    public function updateContent(Request $request)
    {

        $validated = $request->validate([
            'ageGroup_id' => 'required',
            'stream_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $content = Content::find($request->id);

        if ($request->hasFile('worksheets')) {
            if ($content->worksheet) {
                $destinationPath = public_path('/files/content/');
                File::delete($destinationPath . $content->worksheet);
            }

            $file = $request->file('worksheets');
            $filename = $file->getClientOriginalName();
            $path = public_path('/files/content/');
            $file->move($path, $filename);
            $worksheet_url = $filename;
        } else {
            $worksheet_url = $request->pre_worksheet;
            if (!empty($request->pre_worksheet)) {
                $worksheet_url = $request->pre_worksheet;
            } else {
                $worksheet_url = "no worksheet";
            }
        }

        if ($request->hasFile('video')) {

            if ($content->video) {
                $destinationPath = public_path('/files/content/');
                File::delete($content->video);
            }

            $file2 = $request->file('video');
            $video = $file2->getClientOriginalName();
            $path = public_path('/video/content/');
            $file2->move($path, $video);
            $video_url = $video;
        } else {
            if (!empty($request->pre_video)) {
                $video_url = $request->pre_video;
            } else {
                $video_url = "no video";
            }
        }



        $content->title = $request->title;
        $content->description = $request->description;
        $content->ageGroup_id = $request->ageGroup_id;
        $content->stream_id = $request->stream_id;
        $content->video = $video_url;
        $content->worksheet = $worksheet_url;
        $content->save();
        return redirect()->route('backend.contentlist.contentList')->with('update_success', 'Data Updated successfully.');
    }

    public function contentDelete($id)
    {
        $data = Content::find($id);
        if (!is_null($data)) {
            $data->delete();
        }
        return redirect()->route('backend.contentlist.contentList')->with('delete_success', 'Data deleted successfully.');
    }
}
