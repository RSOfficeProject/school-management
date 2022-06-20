@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Content List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Content List</li>
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
                  <a href="addcontent.php" class="btn btn-primary"> + Add Content</a>
               </div>
              </div>
               <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr> 
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th> 
                    <th>Age Group</th>
                    <th>Stream</th> 
                    <th>Worksheets</th> 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr> 
                      <td> <iframe width="160" height="85" src="https://www.youtube.com/embed/wvTnXg54o9Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </td>
                      <td> How can use function? </td>
                      <td>
                        Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, 
                      </td>
                      <td>
                        <span class="badge badge-primary rounded-pill">7-9 Years</span>
                      </td>
                      <td> <span class="badge badge-light rounded-pill">  Entrepreneurial Mindset  </span> </td>
                      <td>
                        <a class="btn btn-warning">
                          <i class="fas fa-file-pdf"></i> 
                        </a> 
                      </td>
                       
                      <td>
                        <a  href="viewcontent.php" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        
                      </td>
                    </tr>
                    <tr> 
                      <td> <iframe width="160" height="85" src="https://www.youtube.com/embed/wvTnXg54o9Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </td>
                      <td> How can use function? </td>
                      <td>
                        Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, 
                      </td>
                      <td>
                        <span class="badge badge-primary rounded-pill">13-15 Years</span>
                      </td>
                      <td> <span class="badge badge-light rounded-pill">  Entrepreneurial Mindset  </span> </td>
                      <td>
                        <a class="btn btn-warning">
                          <i class="fas fa-file-pdf"></i> 
                        </a> 
                      </td>
                       
                      <td>
                        <a  href="viewcontent.php" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        
                      </td>
                    </tr>
                    <tr> 
                      <td> <iframe width="160" height="85" src="https://www.youtube.com/embed/wvTnXg54o9Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </td>
                      <td> How can use function? </td>
                      <td>
                        Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, 
                      </td>
                      <td>
                        <span class="badge badge-primary rounded-pill">10 - 12 YEARS</span>
                      </td>
                      <td> <span class="badge badge-light rounded-pill">  Entrepreneurial Mindset  </span> </td>
                      <td>
                        <a class="btn btn-warning">
                          <i class="fas fa-file-pdf"></i> 
                        </a> 
                      </td>
                       
                      <td>
                        <a  href="viewcontent.php" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        
                      </td>
                    </tr>
                    
                  </tbody>
                 </table>
              </div>
            </div>
      </div>
    </section>
  </div>

@endsection