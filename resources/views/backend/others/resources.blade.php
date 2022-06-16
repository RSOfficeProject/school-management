@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/event.other') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/event.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/event.other') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="{{ route('backend.updateresources.updateResources') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="row">
    
            
             <div class="col-md-12">
              <div class="card card-primary">
                @if(session()->has('success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{ session()->get('success') }}
                  </div>
                @endif
                <div class="card-header"> 
                </div> 
                <div class="card-body">
                    <div class="form-group">
                      <label for="eventstart">{{ __('admin/event.description') }}</label>
                      <textarea id="compose-textarea" class="form-control" name="resource">{{$resource['setting_value']}}</textarea>
                    </div> 
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ __('admin/event.submit') }}</button>
                </div> 
              </div> 
           </div> 
          </div>
        </form> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection