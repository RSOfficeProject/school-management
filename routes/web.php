<?php

use App\Http\Controllers\Auth\TrainerController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Autho Routes
require __DIR__ . '/auth.php';

// Language Switch
Route::get('language/{language}', 'LanguageController@switch')->name('language.switch');

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
});
/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    // Admin Routes is start here

    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    // School Onboarding
    Route::get('schoolcreate', ['as' => "schoolcreate.schoolCreate", 'uses' => "SchoolController@schoolCreate"]);
    Route::post('schoolstore', ['as' => "schoolstore.schoolStore", 'uses' => "SchoolController@schoolStore"]);
    Route::get('schoollist', ['as' => "schoollist.schoolList", 'uses' => "SchoolController@schoolList"]);
    Route::get('schooledit/{id}', ['as' => "schooledit.schoolEdit", 'uses' => "SchoolController@schoolEdit"]);
    Route::post('schoolupdate', ['as' => "schoolupdate.schoolUpdate", 'uses' => "SchoolController@schoolUpdate"]);
    Route::get('schooldelete/{id}', ['as' => "schooldelete.schoolDelete", 'uses' => "SchoolController@schoolDelete"]);
    Route::get('viewschool/{id}', ['as' => "viewschool.viewschool", 'uses' => "SchoolController@viewschool"]);
    Route::get('schoolnotification', ['as' => "schoolnotification.schoolnotification", 'uses' => "SchoolController@schoolnotification"]);

    //event section---------------------
    Route::get('createevent', ['as' => "createevent.createevent", 'uses' => "EventController@createevent"]);
    Route::post('eventstore', ['as' => "eventstore.eventstore", 'uses' => "EventController@eventstore"]);
    Route::get('eventlist', ['as' => "eventlist.eventlist", 'uses' => "EventController@eventlist"]);
    Route::get('viewevent/{id}', ['as' => "viewevent.viewevent", 'uses' => "EventController@viewevent"]);
    Route::get('editevent/{id}', ['as' => "editevent.editevent", 'uses' => "EventController@editevent"]);
    Route::post('eventupdate', ['as' => "eventupdate.eventupdate", 'uses' => "EventController@eventupdate"]);
    Route::get('eventdelete/{id}', ['as' => "eventdelete.eventdelete", 'uses' => "EventController@eventdelete"]);

    // Trainer Onboarding
    Route::get("addtrainer", ['as' => "addtrainer.addTrainer", 'uses' => "TrainerController@addTrainer"]);
    Route::post("storetrainer", ['as' => "storetrainer.storeTrainer", 'uses' => "TrainerController@storeTrainer"]);
    Route::get("trainerlist", ['as' => "trainerlist.trainerList", 'uses' => "TrainerController@trainerList"]);
    Route::get("traineredit/{id}", ['as' => "traineredit.trainerEdit", 'uses' => "TrainerController@trainerEdit"]);
    Route::post("traineredit", ['as' => "updatetrainer.updateTrainer", 'uses' => "TrainerController@updateTrainer"]);
    Route::get("trainerdelete/{id}", ['as' => "trainerdelete.trainerDelete", 'uses' => "TrainerController@trainerDelete"]);
    Route::get('trainernotification', ['as' => "trainernotification.trainerNotification", 'uses' => "TrainerController@trainerNotification"]);

    //new
    Route::post('trainer/checkinfo/', ['as' => "trainer-checkinfo", 'uses' => "TrainerController@trainerCheckInfo"]);


    //Trainer Allocation------------------
    Route::get('trainerallocation', ['as' => "trainerallocation.trainerallocation", 'uses' => "TrainerAllocationController@trainerallocation"]);
    Route::get('alltainer', ['as' => "alltainer.alltainer", 'uses' => "TrainerAllocationController@alltainer"]);
    Route::get('schoolinfo', ['as' => "schoolinfo.schoolinfo", 'uses' => "TrainerAllocationController@schoolinfo"]);
    Route::post('assigntrainer', ['as' => "assigntrainer.assigntrainer", 'uses' => "TrainerAllocationController@assigntrainer"]);
    Route::get('event_insert', ['as' => "event_insert.event_insert", 'uses' => "TrainerAllocationController@event_insert"]);

    // Student Communication
    Route::get("/assignment/create/", [
        'uses' => "StudentCommunication@createAssignment",
        'as' => "create-assignment"
    ]);

    Route::post("/assignment/save/", [
        'uses' => "StudentCommunication@saveAssignment",
        'as' => "save-assignment"
    ]);

    Route::post("/multi/assignment/", [
        'uses' => "StudentCommunication@multiAssignment",
        'as' => "multi-assignment"
    ]);

    // Route::get("/assignment/send/mail/", [
    //     'uses' => "StudentCommunication@sendAssignmentMail",
    //     'as' => "send-assignment-mail"
    // ]);


    // Content
    Route::get("addcontent", ['as' => "addcontent.addContent", 'uses' => "ContentController@addContent"]);
    Route::post("storecontent", ['as' => "storecontent.storeContent", 'uses' => "ContentController@storeContent"]);
    Route::get("contentlist", ['as' => "contentlist.contentList", 'uses' => "ContentController@contentList"]);
    Route::get("contentedit/{id}", ['as' => "contentedit.contentEdit", 'uses' => "ContentController@contentEdit"]);
    Route::post("contentupdate", ['as' => "updatecontent.updateContent", 'uses' => "ContentController@updateContent"]);
    Route::get("contentdelete/{id}", ['as' => "contentdelete.contentDelete", 'uses' => "ContentController@contentDelete"]);
    Route::get("contentview/{id}", ['as' => "contentview.contentView", 'uses' => "ContentController@contentView"]);

    Route::post("addstream", ['as' => "addstream.addStream", 'uses' => "ContentController@addStream"]);
    Route::post("addagegroup", ['as' => "addagegroup.addAgeGroup", 'uses' => "ContentController@addAgeGroup"]);


    // Other setting of Admin
    Route::get("trainerguide", ['as' => "trainerguide.trainerGuide", 'uses' => "AdminsettingController@trainerGuide"]);
    Route::post("updatetrainerguide", ['as' => "updatetrainerguide.updateTrainerguide", 'uses' => "AdminsettingController@updateTrainerguide"]);

    Route::get("resources", ['as' => "resources.resources", 'uses' => "AdminsettingController@resources"]);
    Route::post("updateresources", ['as' => "updateresources.updateResources", 'uses' => "AdminsettingController@updateResources"]);

    Route::get("schoolterms", ['as' => "schoolterms.schoolTerms", 'uses' => "AdminsettingController@schoolTerms"]);
    Route::post("updateschoolterms", ['as' => "updateschoolterms.updateSchoolTerms", 'uses' => "AdminsettingController@updateSchoolTerms"]);

    Route::get("trainerterms", ['as' => "trainerterms.trainerTerms", 'uses' => "AdminsettingController@trainerTerms"]);
    Route::post("updatetrainerterms", ['as' => "updatetrainerterms.updateTrainerTerms", 'uses' => "AdminsettingController@updateTrainerTerms"]);

    Route::get("studentterms", ['as' => "studentterms.studentTerms", 'uses' => "AdminsettingController@studentTerms"]);
    Route::post("updatestudentterms", ['as' => "updatestudentterms.updateStudentTerms", 'uses' => "AdminsettingController@updateStudentTerms"]);

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});

Route::group(['namespace' => 'School', 'prefix' => 'school', 'as' => 'school.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    // School Dashboard
    Route::get('dashboard', 'ManageschoolController@index')->name('dashboard');

    // School Profile
    Route::get("/profile/edit/", ['uses' => "ManageschoolController@profileEdit", 'as' => "profile-edit"]);
    Route::post("/profile/update/", ['uses' => "ManageschoolController@updateSchool", 'as' => "update-school"]);

    // School Event
    Route::get('/event/list/', ['uses' => "ManageschoolController@eventList", 'as' => "event-list"]);
    Route::get('/event/view/{id}', ['uses' => "ManageschoolController@eventView", 'as' => "event-view"]);

    // School Privacy
    Route::get('/privacy/police/', ['uses' => "ManageschoolController@privacyPolice", 'as' => "privacy-police"]);

    // Student Progress Report
    Route::get('/progress/report/', ['uses' => "ProgressreportController@progressReport", 'as' => "progress-report"]);

    // Student List
    Route::get('/student/list/', ['uses' => "SchoolController@studentList", 'as' => "student-list"]);
    Route::get('/student/edit/{id}', ['uses' => "SchoolController@studentEdit", 'as' => "student-edit"]);
    Route::post('/student/update/{id}', ['uses' => "SchoolController@studentUpdate", 'as' => "school-update"]);

    //School Class Schedule-------------- 
    Route::get('/class/schedule',['uses'=>"ClassScheduleController@class_schedule", 'as' => "class_schedule"]);
    Route::get('/school/class/schedule',['uses'=>"ClassScheduleController@school_classSchedule", 'as' => "school_classSchedule"]);


});

// =====================  Trainer Section =================

Route::group(['namespace' => 'Trainer', 'prefix' => 'trainer', 'as' => 'trainer.', 'middleware' => ['auth', 'can:view_backend']], function () {

    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Content
    Route::get('content/view', ['as' => "content/view.contentView", 'uses' => "DashboardController@contentView"]);

    // Content
    Route::get('content/list', ['as' => "content/list.contentList", 'uses' => "ContentController@content_list"]);
    Route::get('content/view/{id}', ['as' => "content/view.contentView", 'uses' => "ContentController@contentView"]);

    //Event----------------------
    Route::get('event/list', ['as' => "event/list.eventList", 'uses' => "EventController@event_list"]);
    Route::get('event/view/{id}', ['as' => "event/view.eventView", 'uses' => "EventController@eventView"]);

});
