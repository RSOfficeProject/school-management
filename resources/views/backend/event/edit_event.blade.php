@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">{{ __('admin/event.edit_event') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">{{ __('admin/event.home') }}</a></li>
                  <li class="breadcrumb-item active">{{ __('admin/event.edit_event') }}</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <form action="{{route('backend.eventupdate.eventupdate')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <input type="hidden" name="old_event_image" value="{{$event->event_image}}">
            <input type="hidden" name="old_event_poster" value="{{$event->event_poster}}">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="card card-primary">
                     <div class="card-header">

                     </div>

                     <div class="card-body">
                        <div class="form-group">
                           <label for="inchargename">{{ __('admin/event.event_name') }}</label>
                           <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="inchargename" placeholder="Event name" name="event_name" value="{{$event->event_name}}">
                           @error('event_name')
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="eventimages">{{ __('admin/event.event_image') }}</label>
                           <input type="file" class="form-control" id="eventimage" name="event_image">
                        </div>
                        <div class="form-group">
                           <label for="eventstart">{{ __('admin/event.event_date') }}</label>
                           <input type="date" class="form-control  @error('event_date') is-invalid @enderror" id="eventstart" name="event_date" value="{{$event->event_date}}">
                           @error('event_date')
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="eventend">{{ __('admin/event.submit_entry') }}</label>
                           <input type="date" class="form-control  @error('event_last_date') is-invalid @enderror" id="eventend" name="event_last_date" value="{{$event->event_last_date}}">
                           @error('event_last_date')
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="eventend">{{ __('admin/event.event_address') }}</label>
                           <input type="text" class="form-control  @error('event_address') is-invalid @enderror" id="eventend" name="event_address" placeholder="address" value="{{$event->event_address}}">
                           @error('event_address')
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label>{{ __('admin/event.landing_page') }}</label>
                           <input type="text" class="form-control mb-2 @error('landing_page') is-invalid @enderror" placeholder="Landing Page" name="landing_page" value="{{$event->landing_page}}">
                           @error('landing_page')
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label>{{ __('admin/event.event_fee') }}</label>
                           <input type="text" class="form-control  @error('event_fee') is-invalid @enderror" placeholder="Fee" name="event_fee" value="{{$event->event_fee}}">
                           @error('event_fee')
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="section_add">
                           <div class="row_check">
                              <div class="form-group toClone_example1">
                                 <label>{{ __('admin/event.upload_poster') }}</label>
                                 <input type="file" class="form-control mb-2" name="event_poster[]">
                              </div>

                              <div class="form-group simpleClone-btnWrap">
                                 <span class="btn btn-info btn-sm addBtn ">{{ __('admin/event.add_file') }}</span>
                                 <span class="btn btn-danger btn-sm removeBtn ">{{ __('admin/event.remove_file') }}</span>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>

               </div>

               <div class="col-md-6">
                  <div class="card card-warning">
                     <div class="card-header">

                     </div>

                     <div class="card-body">
                        <div class="form-group">
                           <label for="eventstart">{{ __('admin/event.decription') }}</label>
                           <textarea id="eventdescription" class="form-control" name="event_description">
                           {{$event->event_description}}
                           </textarea>
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