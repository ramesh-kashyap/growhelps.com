@include('layouts.admin.header')
@include('layouts.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Reply Support Message
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
            <!-- form start -->
           
        <form onsubmit="return amtValue()" action="{{route('admin_ticket_submit')}}" method="POST" class="form-horizontal" >
              <div class="box-body">
              	   @if(session()->has('message'))
                                        <div class="alert alert-success">
                                        <strong style="color:#006633;">
                                        {{ session()->get('message') }}
                                        </strong>
                                        </div>
                                        @endif

                                             @if ($errors->any())
                                            <div class="alert alert-danger">
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                            </div>
                                            @endif

                                               @csrf
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Ticket No.</label>

                  <div class="col-sm-9">
                    <input class="form-control"  text="text" name="ticket_no" value="{{@$open_ticket_msg}}" readonly required="">
                  </div>
                </div>
           
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Message</label>

                  <div class="col-sm-9">
                    <textarea class="form-control"   placeholder="Message in Discription"  name="message" required=""></textarea>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Confirm</button>
              </div>
              <!-- /.box-footer -->
           </form>
          </div>

      </div>
        </div>
          <!-- /.box -->
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $('.check_sponsor_exist').change(function (e) { 
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var sponsor = $(this).val();       
        // alert(sponsor); 
        $.ajax({
          type: "post",
          url: "{{route('getUserName')}}",
          data: {"user_id":sponsor, "_token": "{{ csrf_token() }}",},          
          success: function (response) {      
          // alert(response);      
            if(response!=1){
              // alert("hh");
              $('#'+res_area).val(response).css('color','#000').css('font-weight','800').css('margin-buttom','10px');
            }else{
              // alert("hi");
              $('#'+res_area).val("User Not exists!").css('color','red').css('margin-buttom','10px');
            }
          }
        });
    });

   
   </script> 


 <script>
  function validate() {
      var amt = document.getElementById("amount").value;
    if(amt%5000>0){
      document.getElementById("amount").value = "";
      alert("Amount has to be multiple of 5000.");
      return false; 
    }
    else{
      
    }
      
  }
</script> 

 @include('layouts.admin.footer')