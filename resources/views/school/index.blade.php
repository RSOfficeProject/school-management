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
               <a href="addstudent.php" class=" m-2 btn btn-lg btn-primary"><i class=" fas fa-user-graduate"></i> Add  Student</a>
               <a href="class_schedule.php" class=" m-2 btn btn-lg btn-success"><i class=" fas fa-calendar-alt"></i> Add  Schedule</a>
               <a href="addschool.php" class=" m-2 btn btn-lg btn-info"> <i class=" fas fa-user"></i> Edit Profile</a>
             </div> 
          </div>
         <div class="card card-widget widget-user mb-4"> 
            <div class="widget-user-header text-white" style="background: url('{{asset('img/school.jpg')}}') center center;">
              <h3 class="widget-user-username text-right">Ideal School And Collage</h3>
              <h5 class="widget-user-desc text-right">Establish 1980 </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset('img/logoscholl.png')}}" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Md. Hossain Ali</h5>
                    <span class="description-text">Principal </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
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
              </div>
              <!-- /.row -->
            </div>
          </div>
          
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">school@gmail.com</h5>
                    <span class="description-text">Email ID</span>
                  </div> 
                </div>
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">+12345678</h5>
                    <span class="description-text">Contact Number</span>
                  </div> 
                </div>
                <div class="col-sm-4 text-center border-right">
                  <div class="description-block">
                    <h5 class="description-header">12-3-2022</h5>
                    <span class="description-text">Course Start Date</span>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <div class="card  card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Today Shedule</h3> 
                 </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Teacher Name</th>
                        <th>Class</th> 
                        <th>Start Time</th>
                        <th>End Time</th> 
                         
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#001</td>
                          <td>  Alex Hale </td>
                          <td> 1 </td>
                          
                          <td>
                             10:30am
                          </td>
                          <td>
                            11:30
                          </td> 
                          
                        </tr>
                        <tr>
                          <td>#002</td>
                          <td>  Alex Hale </td>
                          <td> 1 </td>
                          
                          <td>
                             10:30am
                          </td>
                          <td>
                            11:30
                          </td> 
                          
                        </tr>
                    
                       
                      </tbody>
                     </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-success">
                   <div class="card-header">
                      <h3 class="card-title">Assessment Parameters</h3>
                      <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                         </button>
                      </div>
                   </div>
                   <div class="card-body">
                      <ul>
                        <li>Emotional Quotient (EQ)-1-10</li>
                        <li>Intelligence Quotient (IQ) -1-10</li>
                        <li>Creative & Critical Thinking Quotient (CQ) -1-10</li>
                        <li>Adversity Quotient (AQ) -1-10</li>
                        <li>Social Quotient (SQ) -1-10</li>
                        <li>Entrepreneurship Quotient (EnQ) – 1-10</li>
                      </ul>
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