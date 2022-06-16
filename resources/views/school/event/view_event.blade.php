@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$event->event_name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{ __('admin/event.event_add') }}</a></li>
            <li class="breadcrumb-item active">{{$event->event_name}}</li>
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
            <a href="{{ route('school.event-list') }}" class="btn btn-primary">{{ __('admin/event.view_event') }}</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <img src="{{asset($event->event_image)}}" class="img-fluid" height="100">
          <div class="pt-4 pb-2">
            <p><strong><i class="far fa-calendar-alt"></i> {{$event->event_date}} to {{$event->event_last_date}}</strong></p>
            <p><strong><i class="fas fa-map-marker-alt mr-1"> </i>{{$event->event_address}}</strong></p>
          </div>
          <p>{{strip_tags($event->event_description)}}</p>
          <?php $file = explode(',', $event->event_poster); ?>
          <div class="">
            @foreach($file as $files)
            <a class="btn btn-warning" href="{{asset($files)}}" download="">
              <i class="fas fa-file"></i>
            </a>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
</div>

@endsection