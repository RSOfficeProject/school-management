@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Content List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Content List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                 
             
              </div>
               <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr> 
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th> 
                    <th>Age Group</th>
                    <th>Stream</th> 
                    <th>Worksheets</th> 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($contents as $content)
                    <tr> 
                      <td>
                        <video width="320" height="240" controls>
                        <source src="{{url('/video/content/'.$content['video'])}}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                      </td>
                      <td>{{$content['title']}} </td>
                      <td>
                      {{$content['description']}}
                      </td>
                      <td>
                        <span class="badge badge-primary rounded-pill">{{$content['get_age_group']['age']}}</span>
                      </td>
                      <td> <span class="badge badge-light rounded-pill"> {{$content['get_stream']['title']}}  </span> </td>
                      <td>
                        <a class="btn btn-warning"href="{{url('/files/content/'.$content['worksheet'])}}" download>
                          <i class="fas fa-file-pdf"></i> 
                        </a> 
                      </td>
                       
                      <td>
                        <a href="{{ route('trainer.content/view.contentView',$content['id']) }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                      
                      </td>
                    </tr>
                   @endforeach
                    
                  </tbody>
                 </table>
              </div>
            </div>
      </div>
    </section>
  </div>

@endsection