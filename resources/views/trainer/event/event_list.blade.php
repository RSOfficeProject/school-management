@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/event.event_list') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/event.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/event.event_list') }}</li>
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
               @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
            
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ __('admin/event.event_id') }}</th>
                      <th>{{ __('admin/event.event_image') }}</th>
                      <th>Title</th>
                      <th>Start and End date</th>
                      <th>Fee</th>
                      <th>{{ __('admin/event.description') }}</th>
                      <th>{{ __('admin/event.action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($event as $key=>$events)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td> <img src="{{asset($events->event_image)}}" alt="Product 1" class="img-rounded img-size-80" height="150" width="150"> </td>
                      <td>{{$events->event_name}}</td>
                      <td>{{$events->event_date}} to {{$events->event_last_date}}</td>
                      <td>{{$events->event_fee}}</td>
                      <td> Last date to submit entry 
                      <br/>
                      Event Date -{{$events->event_date}}
                      <br/>
                      Fee - {{$events->event_fee}}
                      <br/>
                      {{strip_tags($events->event_description)}}
                      </td>                      
                      <td>
                        <a  href="{{ route('trainer.event/view.eventView',$events->id)}}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                       
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>

@endsection