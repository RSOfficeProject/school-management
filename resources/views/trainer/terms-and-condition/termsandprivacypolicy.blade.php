@extends('backend.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      @if(session()->has('success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{ session()->get('success') }}
                  </div>
              @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Terms of use Privacy Policy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class Schedule</li>
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
            <h3 class="card-title">User Agreement</h3>
          </div>
           <div class="card-body">
              <div class="alert alert-success">  
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Our User agreement has been update . Please read our use agreement  and agree or disagree to this terms and conditions. 
              </div>
            <form action="{{route('trainer.savetermsandprivacypolicy')}}" method="post">  
             @csrf 
            <h2><strong>Terms and Conditions</strong></h2>
               {!!$terms['setting_value']!!}
              <div class="form-check mb-2">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="termandcondition" <?php if($user['termandcondition']==1){echo "checked";}?>>
                  <label class="form-check-label" for="exampleCheck1">I accept the <a href="#">trems of use</a>  and <a href="#">privacy pollicy</a></label>
              </div>
              <button type="sumbit" class="btn btn-primary">Confirm and Continue</button>
            </form>
           </div>
         </div>
      </div><!-- /.container-fluid -->

    </section> 
    <br/>
  </div>
@endsection