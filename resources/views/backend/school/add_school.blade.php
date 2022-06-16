@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{__('admin.add_school')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.add_school')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
             
        <div class="row justify-content-center">
           <div class="col-md-6">
              <div class="card card-primary">
                 <div class="card-header">
                  
                 </div>
            
                 <form action="{{route('backend.schoolstore.schoolStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                       <div class="form-group">
                          <label for="schoolname">{{__('admin.school_name')}}</label>
                          <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="schoolname" name="school_name" placeholder="">
                          @error('school_name')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>

                       <div class="form-group">
                          <label for="schoolname">Principle Name</label>
                          <input type="text" class="form-control @error('principle_name') is-invalid @enderror" id="address" placeholder="" name="principle_name">
                          @error('principle_name')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>

                       <div class="form-group">
                          <label for="yearestablished">official Email Id</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="yearestablished" placeholder="" min="0" name="email">
                          @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>
                       <!-- <div class="form-group">
                          <label for="yearestablished">official Email Id</label>
                          <input type="email" class="form-control @error('official_email_id') is-invalid @enderror" id="yearestablished" placeholder="" min="0" name="official_email_id">
                          @error('official_email_id')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div> -->
                       
                       <div class="form-group">
                          <label for="yearestablished">Contact Number</label>
                          <input type="number" class="form-control @error('contact_number') is-invalid @enderror" id="yearestablished" placeholder="" min="0" name="contact_number">
                          @error('contact_number')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>

                       <div class="form-group">
                          <label for="schoolname">{{__('admin.number_of_student')}}</label>
                          @foreach($grade as $grades) 
                          <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                <span class="input-group-text">{{$grades->grade}}</span>
                             </div>
                             <input type="number" class="form-control" placeholder="" name="number_of_student[]" value="">
                          </div>
                        @endforeach  

                       </div>

                       
                       <div class="form-group">
                          <label for="inchargename">Country</label>
                          <input type="text" class="form-control @error('country') is-invalid @enderror" id="inchargename" name="country" placeholder="">
                          @error('country')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>
                       <div class="form-group">
                          <label for="package">Membership Plan</label>
                          <select class="form-control @error('membership_plan') is-invalid @enderror" name="membership_plan">
                            <option value="">---Select---</option>
                            <option value="1">Essential</option>
                            <option value="2">Standard</option>
                            <option value="3">Premium</option> 
                          </select>
                          @error('membership_plan')
                                <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                       </div>

                      </div>

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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