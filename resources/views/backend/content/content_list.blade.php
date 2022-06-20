@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('admin/content.content_list') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{ __('admin/content.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('admin/content.list_content') }}</li>
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
          @if(session()->has('success'))
          <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('success') }}
          </div>
          @endif

          @if(session()->has('update_success'))
          <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('update_success') }}
          </div>
          @endif

          @if(session()->has('delete_success'))
          <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('delete_success') }}
          </div>
          @endif
          <div class="card-tools">
            <a href="{{ route('backend.addcontent.addContent') }}" class="btn btn-primary">{{ __('admin/content.list_content') }}</a>
          </div>
        </div>

        <div class="card-body table-responsive">
          <table id="contentListDatatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>{{ __('admin/content.video') }}</th>
                <th>{{ __('admin/content.title') }}</th>
                <th>{{ __('admin/content.description') }}</th>
                <th>{{ __('admin/content.age_group') }}</th>
                <th>{{ __('admin/content.stream') }}</th>
                <th>{{ __('admin/content.worksheets') }}</th>
                <th>{{ __('admin/content.action') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contents as $content)
              <tr>
                <td>
                  <video width="320" height="240" controls>
                    <source src="{{url('/video/content/'.$content['video'])}}" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </td>
                <td>{{$content['title']}} </td>
                <td>
                  <!-- {!! strip_tags(substr($content['description'] , 0 , 100)) !!} -->
                  {!! strip_tags(str_replace('&nbsp;', ' ', $content['description'])) !!}
                </td>
                <td>
                  {{$content['get_age_group']['age']}}
                </td>
                <td>
                  {{$content['get_stream']['title']}}
                </td>
                <td>
                  <a class="btn btn-warning" href="{{url('/files/content/'.$content['worksheet'])}}" download>
                    <i class="fas fa-file-pdf"></i>
                  </a>
                </td>

                <td>
                  <a href="{{ route('backend.contentview.contentView',$content['id']) }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('backend.contentedit.contentEdit',$content['id']) }}" class="btn btn-block btn-info btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('backend.contentdelete.contentDelete',$content['id']) }}" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th>{{ __('admin/content.video') }}</th>
                <th>{{ __('admin/content.title') }}</th>
                <th>{{ __('admin/content.description') }}</th>
                <th>{{ __('admin/content.age_group') }}</th>
                <th>{{ __('admin/content.stream') }}</th>
                <th>{{ __('admin/content.worksheets') }}</th>
                <th>{{ __('admin/content.action') }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  $(function() {

    // DataTable
    $('#contentListDatatable').DataTable({
      // initComplete: function() {
      //   this.api()
      //     .columns()
      //     .every(function() {
      //       var column = this;
      //       var select = $('<select><option value=""></option></select>')
      //         .appendTo($(column.header()).empty())
      //         .on('change', function() {
      //           var val = $.fn.dataTable.util.escapeRegex($(this).val());
      //           column.search(val ? '^' + val + '$' : '', true, false).draw();
      //         });

          
      //       column
      //         .data()
      //         .unique()
      //         .sort()
      //         .each(function(d, j) {
      //           select.append('<option value="' + d + '">' + d + '</option>');
      //         });
      //     });
      // },
    });


  });
</script>




@endsection