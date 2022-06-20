@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$content['title']}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{ __('admin/content.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('admin/content.view_content') }}</li>
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
          <div class="card-tools">
            <a href="{{ route('backend.contentlist.contentList') }}" class="btn btn-primary"> All Content</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <video width="100%" height="385" controls>
            <source src="{{url('/video/content/'.$content['video'])}}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <div class="pt-4 pb-2">
            <!-- <p><span class="badge badge-primary rounded-pill">{{$content['get_age_group']['age']}}</span></p>
            <p><span class="badge badge-light rounded-pill"> {{$content['title']}} </span></p> -->
          </div>
          {!! $content['description'] !!}
          <!-- <div class="">
            <a class="btn btn-warning" href="{{url('/files/content/'.$content['worksheet'])}}" download="">
              <i class="fas fa-file-pdf"></i>
            </a>
          </div> -->
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
</div>
@endsection