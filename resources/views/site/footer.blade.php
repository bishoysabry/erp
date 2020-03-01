<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<!-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> -->
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script type="text/javascript">
var segment1 = '';
 $(document).ready(function() {
segment1 = getSegment(1);


});//docuemnt ready
function deleteObject(id,method='delete'){ 
   if(confirm("هل تريد المسح ؟")){
    if (method=='')method='delete';
     var URL  = '{{url("/")}}' +'/'+segment1 +"/"+id+'/'+method;
                  $.ajax({
                        type:"POST",
                        url:URL,
                        data:{
                          _token: "{{ csrf_token() }}",
                        },
                        dataType:"json",
                
            
                    success: function( data )
                    {
                     if(data.type == "success")
                        {
                          alert('deleted');
                        
                    $('#'+id).hide();
                        }
                     
                          
                        
                    }
                  });
                }
                    else{
                 return false ;
               }

         }//delete 
function getSegment(number){

  var currentURL = window.location.href;
  var arr = currentURL.split('/');
  number =parseInt(number);
  segment = arr[2+number] ;

if (arr[2]=='http://homestead.test/') segment =arr[3+number] ;

//cut segment from get ?

if (segment!=undefined && segment.length > 0 && segment.indexOf('?')!= -1 ) {
  segment = segment.substring(0, segment.indexOf('?'));
}
return segment ;
}


 


 
         function scroll(element){
           $('html, body').animate({
               scrollTop: $(element).offset().top
          }, 1000);
         }
         function redirectLink(link){
          window.location = link;
         }






</script>
</body>
</html>