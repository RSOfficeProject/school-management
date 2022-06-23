@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if(Session::has('message'))
      <div class="alert alert-success">
          {{ Session::get('message') }}
      </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="card"> 
          <div class="card-header"> 
            <div class="card-tools">
              <select class="form-control">
                <option value="">Select Year & Term</option>
                <option value="1">1 Class</option>
                <option value="2">2 Class</option>
              </select>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr> 
                <th>Name</th> 
                <th>School</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Projects</th>
                <th>Assignment</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

                <?php foreach($students as $student) : ?>
                <tr>
                    <td><?= $student['std_user']['name']; ?></td>
                    <td><?= $student['school']['school_name']; ?></td>
                    <td><?= $student['overal_grade']; ?></td>
                    <td><?= $student['project']; ?></td>
                    <td> 
                        <span class="badge badge-light">Make a robot for new janaration</span>
                        <span class="badge badge-light">Make a robot for new janaration</span>
                        <span class="badge badge-light">Make a robot for new janaration</span> 
                    </td>
                    <td>
                        <a href="#" class="m-2 d-inline-block">
                        <span class="btn btn-sm btn-warning">
                            <i class="fas fa-file-pdf"></i> 
                        </span>
                        Assignment Asign 2
                        </a>
                        <a href="#" class="m-2 d-inline-block">
                        <span class="btn btn-sm btn-warning">
                            <i class="fas fa-file-pdf"></i> 
                        </span>
                        Assignment Asign 1
                        </a> 
                    </td> 
                    
                    <td>
                        <a href="{{route('school.student-edit', $student['id'])}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    </td>

                </tr>
                <?php endforeach; ?>
                 
              </tbody>
             </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection