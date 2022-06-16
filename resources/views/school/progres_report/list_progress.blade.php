@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Progress Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Progress Report </li>
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
              <div class="sticky-top mb-2">
                  <div class="card card-default"> 
                    <div class="card-header">
                      You have 320 students from your school pursuing Entrepreneurship Course
                    </div>
                    <div class="card-body table-responsive p-0" style="max-height:535px;overflow-y: scroll;">
                       <table class="table table-striped table-valign-middle">
                          
                          <tbody>
                            <?php foreach($students as $student) : ?>
                            <tr>
                              <td>
                                 <a href="#"><img src="{{ asset('img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                 <?= $student['name']; ?></a>
                              </td>
                            </tr>
                            <?php endforeach; ?>

                          </tbody>
                       </table>
                    </div> 
                  </div>
              </div> 
            </div>
            
            <div class="col-md-9"> 
                <div class="card card-info">
                <div class="card-body">

                  <div class="row">

                    <div class="col-md-6">
                      <div class="info-box mb-3 bg-success">
                        <div class="info-box-content">
                          <span class="info-box-text">Name of the Student</span>
                          <span class="info-box-number">Jonathan Smith</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="info-box mb-3 bg-info">
                        <div class="info-box-content">
                          <span class="info-box-text">Grade</span>
                          <span class="info-box-number">10th</span>
                        </div>
                      </div>
                    </div>


                  </div>


                  <div class="row">

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                              Projects involved in
                            </div>
                            <div class="card-body" style="max-height: 250px;overflow-y: auto;">
                              <ul class="nav flex-column">
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 1
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                   Project 2
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 3
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 4
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 5
                                    </a>
                                 </li>

                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 1
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                   Project 2
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 3
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 4
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    Project 5
                                    </a>
                                 </li>

                              </ul>
                            </div>
                        </div>
                        <div class="card card-primary">
                          <div class="card-header">
                            Assignment Submitted 
                          </div>
                          <div class="card-body" style="max-height: 250px;overflow-y: auto;">
                            <ul class="nav flex-column">
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 1
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 2
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 3
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 4
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 5
                                    </a>
                                 </li>

                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 1
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                   Assignment 2
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 3
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 4
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                      <span class="btn btn-sm btn-warning">
                                        <i class="fas fa-file-pdf"></i> 
                                      </span>
                                      Assignment 5
                                    </a>
                                 </li>

                              </ul>
                          </div>
                        </div>
                        
                    </div>
                    

                    <div class="col-md-6">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="info-box mb-3 bg-primary">
                              <div class="info-box-content">
                                <span class="info-box-text">Classes Held</span>
                                <span class="info-box-number">10</span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="info-box mb-3 bg-danger">
                              <div class="info-box-content">
                                <span class="info-box-text">Classes Attended</span>
                                <span class="info-box-number">8</span>
                              </div>
                            </div>
                          </div>

                       </div>

                       
                        <div class="info-box">
                          <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Overall Grade</span>
                            <span class="info-box-number">A<sup>+</sup></span>
                          </div>
                        </div>

                        <div class="card card-outline card-primary">
                         <div class="card-header">
                            <h3 class="card-title">Comments/Feedback </h3> 
                         </div>
                         <div class="card-body">
                            <ul>
                              <li>Good Need to more improve (Alex Broad)</li>
                              <li>More improvement needed (Donald Tramp)</li>
                            </ul>
                         </div>
                      </div>
                        <div class="card card-outline card-success">
                         <div class="card-header">
                            <h3 class="card-title">Assessment Parameters</h3>
                         </div>
                         <div class="card-body">
                            <ul>
                              <li> 
                                <a href="#"> Emotional Quotient (EQ)-1-10</a>
                              </li>
                              <li> 
                                <a href="#"> Intelligence Quotient (IQ) -1-10</a>
                              </li>
                              <li> 
                                <a href="#"> Creative & Critical Thinking Quotient (CQ) -1-10</a></li>
                              <li> 
                                <a href="#"> Adversity Quotient (AQ) -1-10</a></li>
                              <li> 
                                <a href="#"> Social Quotient (SQ) -1-10</a></li>
                              <li> 
                                <a href="#"> Entrepreneurship Quotient (EnQ) – 1-10</a>
                              </li>
                            </ul>
                         </div>
                      </div>

                    </div>
                    <div class="col-md-12">
                      <div class="card card-warning">
                          <div class="card-header">
                            Note By Entrepreneurship Coach 
                          </div>
                          <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                          </div>
                        </div>
                    </div>
                  </div>


                </div>
            </div>
          </div> 
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection