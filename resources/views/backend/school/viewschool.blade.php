@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
          <div class="row justify-content-center text-center mb-4">
             <div class="col-sm-12"> 
               <a href="{{route('backend.schooledit.schoolEdit',$school->id)}}" class=" m-2 btn btn-lg btn-info"> <i class=" fas fa-user"></i> Edit Profile</a>
             </div> 
          </div>
         <div class="card card-widget widget-user mb-4"> 
             
            <div class="widget-user-header text-white" style="background: url('{{asset($school->school_cover_image)}}') center center;"> 
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset($school->school_logo)}}" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-12 text-center">
                     <h3 class="widget-user-username text-primary"><strong>{{$school->school_name}}</strong></h3>
              <h4 class="widget-user-username">{{$school->school_address}}</h4>
              <h5 class="widget-user-desc">{{$school->year_establish}}</h5>
                </div>
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$school->principle_name}}</h5>
                    <span class="description-text">Principal </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <?php 

                       $grade=json_decode($school->number_of_student);
                       $sum=0;
                       foreach($grade as $grades)
                       {
                        $sum=$sum+$grades;
                       }
                ?>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$sum}}</h5>
                    <span class="description-text">Students</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">1-12</h5>
                    <span class="description-text">Grade</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
        
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$school->user->email}}</h5>
                    <span class="description-text"> Email ID </span>
                  </div> 
                </div>
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$school->contact_number}}</h5>
                    <span class="description-text">Contact Number</span>
                  </div> 
                </div>
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$school->course_start_date}}</h5>
                    <span class="description-text">Course Start Date</span>
                  </div> 
                </div>
           
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$school->incharge_name}}</h5>
                    <span class="description-text">Activity In charge Name</span>
                  </div> 
                </div>
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$school->kidspreneurship_representative}}</h5>
                    <span class="description-text">Kidspreneurship Representative</span>
                  </div> 
                </div>
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                        @if($school->membership_plan == '1')
                         <span class="badge badge-success">Essential</span></h5>
                        @elseif($school->membership_plan == '2')
                         <span class="badge badge-primary">Standard</span></h5>
                        @elseif($school->membership_plan == '3')
                        <span class="badge badge-warning">Premium</span></h5>
                        @endif
                    <span class="description-text">Membership Plan </span>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <div class="card  card-outline card-primary"> 
                <div class="card-body">
                    <h4>Weekly Class for Grade 7</h4>
                    <p>Wednesday 9:00 AM (Grade 7 – Sec A) | 30</p>
                    <p>Wednesday 10:00 AM (Grade 7 – Sec B) | 30</p>
                    <p>Wednesday 1:00 PM (Grade 7 – Sec C) | 30</p>
                    <p>Wednesday 2:00 PM (Grade 7 – Sec D) | 30</p>
                    <p class="text-danger">You have added 120 students!</p> 

                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-primary"> 
                   <div class="card-body">
                       <h4>Weekly Class for Grade 8</h4>
                    <p>Thursday 9:00 AM (Grade 8 – Sec A) | 30</p>
                    <p>Thursday 10:00 AM (Grade 8 – Sec B) | 30</p>
                    <p>Thursday 1:00 PM (Grade 8 – Sec C) | 30</p>
                    <p>Thursday 2:00 PM (Grade 8 – Sec D) | 30</p>
                    <p class="text-danger">You have added 120 students!</p> 
                   </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-primary"> 
                   <div class="card-body">
                    
                    <h4>Weekly Class for Grade 9</h4>
                    <p>Friday 9:00 AM (Grade 9 – Sec A) | 30</p>
                    <p>Friday 10:00 AM (Grade 9 – Sec B) | 30</p>
                    <p>Friday 1:00 PM (Grade 9 – Sec C) | 30</p>
                    <p class="text-danger">You have added 90 students!</p>
                   </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-primary"> 
                   <div class="card-body text-center">
                     <br>
                    <h4>Remarks – Yearly fee for 330 students paid </h4>
                    <h5>Renewal Due on June 10, 2023</h5>
                    <br>
                    <a href="#" class="btn btn-primary">Upgrade Plan</a>
                   </div>
                </div>
            </div>
          </div>
          <br>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  </div>
 
@endsection