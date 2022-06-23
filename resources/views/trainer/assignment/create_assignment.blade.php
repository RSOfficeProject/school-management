@extends('backend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('asset/plugins/dropzone/min/dropzone.min.css')}}">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/student_communication.student_communication') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/student_communication.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/student_communication.student_communication') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif
      <div class="container-fluid">
        <form id="multiAssignment" method="POST" action="{{ route('trainer.store-assignment') }}" enctype="multipart/form-data">
          @csrf
           <div class="card">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                      <label for="schoolname">{{ __('admin/student_communication.select_school') }}</label>
                      <select class="form-control" name="school_id">
                          @foreach($schools as $school)
                           <option value="{{$school['id']}}">{{$school['school_name']}}</option>
                          @endforeach
                      </select>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                      <label for="schoolname">{{ __('admin/student_communication.select_grade_batch') }}</label>
                      <select class="form-control" name="grade_id">
                          @foreach($grades as $grade)
                           <option value="{{$grade['id']}}">{{$grade['grade']}}</option>
                          @endforeach
                      </select>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label>{{ __('admin/student_communication.create_assignment') }}</label>

                  <div id="image_upload" class="dropzone">
                      <div class="dz-message needsclick">
                          <div class="mb-3">
                              <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                          </div>
                          <h4>{{ __('admin/student_communication.drop_file') }}</h4>
                      </div>
                  </div>

               </div>
               <div class="form-group">
                 <label>{{ __('admin/student_communication.add_comments') }}</label>
                 <textarea class="form-control" id="eventdescription" name="comment"></textarea>
               </div>  
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('admin/student_communication.submit') }}</button>
              </div>
           </div>      
        </form> 
      </div>
    </section>
  </div>
  
  <!-- dropzonejs -->
  <script src="{{asset('asset/plugins/dropzone/min/dropzone.min.js')}}"></script>

  <script>

      // Dropzone.options.imageUpload= {
      //   maxFilesize  : 1,
      //   acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf"
      // }

      var myDropzone = new Dropzone("#image_upload", {
          url: "{{ route('backend.multi-assignment') }}",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          parallelUploads: 1,
          uploadMultiple: true,
          acceptedFiles: '.png,.jpg,.jpeg',
          autoProcessQueue: true
      });

      myDropzone.on("success", (file, response) => {
          // console.log(file);
          // console.log(response);
          $('#multiAssignment').append('<input type="hidden" name="multi_assignment[]" value="'+response+'">');
          

      });

  </script>

@endsection
