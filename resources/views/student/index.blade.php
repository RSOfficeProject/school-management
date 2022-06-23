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
          <div class="row">
            <div class="col-md-3"> 
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">Jonathan Smith</h3>

                  <p class="text-muted text-center">Ideal School and Collage</p> 

                 
                
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> DOB</strong>

                  <p class="text-muted">
                    <strong> Blood Group:</strong> O+
                    <br>
                    <strong>Date of brith:</strong> 12/02/1990
                    <br>
                    <strong>Father Name:</strong> Alex hoda
                    <br>
                    <strong>Mother Name:</strong> Mandona
                    <br>
                    <strong>Email:</strong> student@gmail.com
                    <br>
                    <strong>Phone:</strong> 12345678
                    <br>
                    <strong>Activity Incharge:</strong> Alex Brad 
                  </p>
                  <hr> 
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                  <p class="text-muted">Malibu, California</p>  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-9">
              <div class="card card-info">
                <div class="card-body">

                  <div class="row">

        

                    <div class="col-md-6">
                      <div class="info-box mb-3 bg-info">
                        <div class="info-box-content">
                          <span class="info-box-text">Projects</span>
                          <span class="info-box-number">0</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="info-box mb-3 bg-warning">
                        <div class="info-box-content">
                          <span class="info-box-text">Assignment</span>
                          <span class="info-box-number">12/150</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                       <div class="row">
                          <div class="col-md-4">
                            <div class="info-box mb-3 bg-primary">
                              <div class="info-box-content">
                                <span>Classes Held</span>
                                <span class="info-box-number">10</span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="info-box mb-3 bg-danger">
                              <div class="info-box-content">
                                <span>Classes Attended</span>
                                <span class="info-box-number">8</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="info-box mb-3 bg-secondary">
                              <div class="info-box-content">
                                <span>Attendance</span>
                                <span class="info-box-number">90%</span>
                              </div>
                            </div>
                          </div>

                       
                       <div class="col-md-6">
                          <div class="card direct-chat direct-chat-primary">
                            <div class="card-header ui-sortable-handle" style="cursor: move;">
                              <h3 class="card-title">Feedback/Comments</h3>

                              <div class="card-tools">
                                <span title="3 New Messages" class="badge badge-primary">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button> 
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <!-- Conversations are loaded here -->
                              <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                  </div>
                                  <!-- /.direct-chat-infos -->
                                  <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="message user image">
                                  <!-- /.direct-chat-img -->
                                  <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                  </div>
                                  <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                  </div>
                                  <!-- /.direct-chat-infos -->
                                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="message user image">
                                  <!-- /.direct-chat-img -->
                                  <div class="direct-chat-text">
                                    You better believe it!
                                  </div>
                                  <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                  </div>
                                  <!-- /.direct-chat-infos -->
                                  <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="message user image">
                                  <!-- /.direct-chat-img -->
                                  <div class="direct-chat-text">
                                    Working with AdminLTE on a great new app! Wanna join?
                                  </div>
                                  <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                  </div>
                                  <!-- /.direct-chat-infos -->
                                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="message user image">
                                  <!-- /.direct-chat-img -->
                                  <div class="direct-chat-text">
                                    I would love to.
                                  </div>
                                  <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                              </div>
                              <!--/.direct-chat-messages-->

                             
                              <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <form action="#" method="post">
                                <div class="input-group">
                                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                  <span class="input-group-append">
                                    <button type="button" class="btn btn-primary">Send</button>
                                  </span>
                                </div>
                              </form>
                            </div>
                            <!-- /.card-footer-->
                          </div>
                       </div>
                       <div class="col-md-6">
                         <div class="info-box">
                          <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Overall Grade</span>
                            <span class="info-box-number">A<sup>+</sup></span>
                          </div>
                        </div>
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
                                <li>Creative &amp; Critical Thinking Quotient (CQ) -1-10</li>
                                <li>Adversity Quotient (AQ) -1-10</li>
                                <li>Social Quotient (SQ) -1-10</li>
                                <li>Social Quotient (SQ) -1-10</li>
                                <li>Social Quotient (SQ) -1-10</li>
                               
                              </ul>
                           </div>
                          </div> 
                       </div> 
                       </div>
                    </div>  
                  </div> 
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