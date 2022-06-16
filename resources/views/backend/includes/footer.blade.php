<!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="#">kidspreneurship</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1.0
      </div>
   </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- DataTables  & Plugins -->
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('asset/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('asset/plugins/fullcalendar/main.js')}}"></script>
<script src="{{asset('asset/dist/js/jquery.metalClone.min.js')}}"></script>
<script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('asset/dist/js/intlTelInput-jquery.min.js')}}"></script>
<script> 
   jQuery(function(){
      $('.form-group').multifield({
      section: '.toClone_example1',
      btnAdd:'.addBtn',
      btnRemove:'.btnRemove'
    });
 if($("#phone").attr('id')){
   $("#phone").intlTelInput({ 
        autoPlaceholder:"polite",
        customPlaceholder:null,
        formatOnDisplay: true,
        utilsScript: "../dist/js/utils.js",

    });
   }
    
  $('.section_add').multifield({
    section: '.row_check',
    btnAdd:'.addBtn',
    btnRemove:'.removeBtn'
  });

  $('.section_add_more').multifield({
    section: '.row_check_new',
    btnAdd:'.addBtn1',
    btnRemove:'.removeBtn1'
  });
  
  });
  Dropzone.options.myDropzone= {
    url: 'upload.php',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true, 
}
 
  $(function () {
    //Add text editor
    $('#eventdescription').summernote({
        placeholder: 'Event description',
        tabsize: 2,
        height: 385,
      })
    $('#compose-textarea').summernote({
        placeholder: 'Description Here',
        tabsize: 2,
        height: 385,
      })
    $('#contentdescription').summernote({
        placeholder: 'Content description',
        tabsize: 2,
        height: 255,
      })

  })
 
 
   $.widget.bridge('uibutton', $.ui.button);


</script>
<!-- Bootstrap 4 -->
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('asset/plugins/chart.js/Chart.min.js')}}"></script>
 
<!-- jQuery Knob Chart -->
<script src="{{asset('asset/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('asset/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('asset/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('asset/dist/js/adminlte.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 

 

</body>
</html>




