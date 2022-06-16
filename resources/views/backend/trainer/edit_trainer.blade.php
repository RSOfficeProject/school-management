@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/trainer.edit_trainer') }} </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/trainer.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/trainer.edit_trainer') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

               @if(session()->has('email_faild'))
                  <div class="alert alert-danger" style="text-align: center;">
                      {{ session()->get('email_faild') }}
                  </div>
               @endif

        <div class="row">
           <div class="col-md-6">
              <div class="card card-primary">
                 <div class="card-header"> 
                 </div> 
                 <form action="{{ route('backend.updatetrainer.updateTrainer') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="card-body">

                          <input type="hidden" name="id" value="{{$trainer['id']}}">
                          <input type="hidden" name="user_id" value="{{$trainer['user_id']}}">

                       <div class="form-group">
                          <label for="schoolname">{{ __('admin/trainer.trainer_name') }}</label>
                          <input type="text" class="form-control" id="schoolname" placeholder="" name="trainer_name" value="{{$trainer['trainer_name']}}">
                          @error('trainer_name')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div> 
                       <div class="form-group">
                          <label for="schoolname">{{ __('admin/trainer.trainer_address') }}</label>
                          <textarea type="text" class="form-control" id="address" placeholder="" name="address">{{$trainer['address']}}</textarea>
                          @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div> 
                       <div class="form-group">
                          <label for="trainercity">{{ __('admin/trainer.trainer_city') }}</label>
                          <input type="text" class="form-control" id="trainercity" placeholder="" min="0"
                          name="city" value="{{$trainer['city']}}">
                          @error('city')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>   
                       <div class="form-group">
                          <label for="inchargename">{{ __('admin/trainer.joining_date') }}</label>
                          <input type="date" class="form-control" id="joiningdate" placeholder="" name="join_date" value="{{$trainer['join_date']}}">
                          @error('join_date')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div> 
                       <div class="form-group">
                          <label for="inchargeemail">{{ __('admin/trainer.activity_emailId') }}</label>
                          <input type="text" class="form-control" id="inchargeemail" placeholder="" name="email" value="{{$trainer['email']}}">
                          @error('email')
                           <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div> 
                        <div class="form-group">
                          <label for="partnername">{{ __('admin/trainer.contact_no') }} </label>
                          <input type="text" class="form-control" id="partnername" placeholder="" name="contact_no" value="{{$trainer['contact_no']}}">
                          @error('contact_no')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
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
                          <label for="dob">{{ __('admin/trainer.date_of_birth') }}</label>
                          <input type="date" class="form-control" id="dob" placeholder="" name="date_of_birth" value="{{$trainer['date_of_birth']}}">
                             @error('date_of_birth')
                                <strong class="text-danger">{{ $message }}</strong>
                             @enderror
                     </div> 

                    <div class="form-group">
                          <label for="exampleInputFile">{{ __('admin/trainer.identity_proof') }}</label>
                          <div class="input-group">
                             <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <input type="text" name="pre_image" value="{{$trainer['image']}}">
                                <label class="custom-file-label" for="exampleInputFile">{{ __('admin/trainer.proof_file') }}</label>
                             </div>
                             <div class="input-group-append">
                                <span class="input-group-text">{{ __('admin/trainer.proof_upload') }}</span>
                             </div>
                          </div>
                             @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                             @enderror
                        </div>
                 
                    
                        <div class="form-group">
                          <label for="mode">{{ __('admin/trainer.mode') }}</label>
                           <select class="form-control" name="mode">
                             <option value="1"<?php if($trainer['mode']==1){echo "selected";}?>
                             >{{ __('admin/trainer.mode_online') }}</option>
                             <option value="2" <?php if($trainer['mode']==2){echo "selected";}?>>{{ __('admin/trainer.mode_offline') }}</option>
                             <option value="3" <?php if($trainer['mode']==3){echo "selected";}?>>{{ __('admin/trainer.mode_hybrid') }}</option> 
                           </select>
                           @error('mode')
                                <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                       </div>

                       <div class="form-group">
                          <label for="type">{{ __('admin/trainer.type') }}</label>
                           <select class="form-control" name="type">
                             <option value="1"<?php if($trainer['type']==1){echo "selected";}?>
                             >Full Time</option>
                             <option value="2" <?php if($trainer['type']==2){echo "selected";}?>>{{ __('admin/trainer.type_pertime') }}Per Time</option>
                             <option value="3" <?php if($trainer['type']==3){echo "selected";}?>>{{ __('admin/trainer.type_industry') }}Industry</option>
                             <option value="3" <?php if($trainer['type']==4){echo "selected";}?>>{{ __('admin/trainer.type_expert') }}Expert</option>
                             <option value="3" <?php if($trainer['type']==5){echo "selected";}?>>{{ __('admin/trainer.type_other') }}Other</option> 
                           </select>
                           @error('type')
                                <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                       </div>
                       
                        <div class="form-group">
                          <label>{{ __('admin/trainer.noofhours_perweek') }}</label> 
                          <input type="text" class="form-control" name="no_of_hour_per_week" value="{{$trainer['no_of_hour_per_week']}}">
                          @error('no_of_hour_per_week')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div> 

                       <div class="form-group">
                          <label for="status">{{ __('admin/trainer.status') }}</label>
                           <select class="form-control" name="status">
                             <option value="1"<?php if($trainer['status']==1){echo "selected";}?>
                             >{{ __('admin/trainer.status_active') }}</option>
                             <option value="2" <?php if($trainer['status']==2){echo "selected";}?>>{{ __('admin/trainer.status_deactive') }}</option>
                           </select>
                           @error('status')
                                <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                       </div>

                      </div> 
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('admin/trainer.submit') }}</button>
                      </div> 
                      
                     </form>
              </div>
              
           </div>

        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

























