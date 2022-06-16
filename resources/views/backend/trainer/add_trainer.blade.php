@extends('backend.layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/trainer.add_trainer') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/trainer.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/trainer.add_trainer') }}</li>
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

        <div class="row justify-content-center">
           <div class="col-md-6">
              <div class="card card-primary">
                 <div class="card-header">
                  
                 </div>
                 <form action="{{ route('backend.storetrainer.storeTrainer') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="card-body">

                       <div class="form-group">
                          <label for="inchargename">{{ __('admin/trainer.trainer_name') }}</label>
                          <input type="text" class="form-control" id="inchargename" placeholder="" name="trainer_name">
                          @error('trainer_name')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>
                     
                    
                       <div class="form-group">
                          <label for="inchargeemail">{{ __('admin/trainer.email_id') }}</label>
                          <input type="text" class="form-control" id="inchargeemail" placeholder="" name="email">
                          @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>

                        <div class="form-group">
                          <label for="inchargecontact">{{ __('admin/trainer.trainer_fee') }}</label>
                          <div class="row align-items-center">
                            <div class="col-3">
                              <input type="number" class="form-control" placeholder="Hours" name="hour">
                              @error('hour')
                                <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                            <div class="col-3">
                              <select class="form-control" name="currency">
                                <option value="1">{{ __('admin/trainer.currency_inr') }}</option>
                                <option value="2">{{ __('admin/trainer.currency_doller') }}</option>
                              </select>
                            </div>
                            <div class="col-3">
                              <input type="number" class="form-control" placeholder="Fee" name="trainer_fee">
                              @error('trainer_fee')
                                <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                        </div>

                       <div class="form-group">
                          <label for="schoolname">{{ __('admin/trainer.contact_no') }}</label>
                          <input type="text" class="form-control" placeholder="" name="contact_no">
                          @error('contact_no')
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
