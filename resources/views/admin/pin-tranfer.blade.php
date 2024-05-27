@include('layouts.admin.header')
@include('layouts.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Activate User Post
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
           
        <form onsubmit="return amtValue()" action="{{route('pin-transfer-submit')}}" method="POST" class="form-horizontal" >
              <div class="box-body">
              	   @if(session()->has('message'))
                                        <div class="alert alert-success">
                                        <strong >
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
                  
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-5">
                    <input class="form-control" id="username_res" placeholder="Name" type="text" name="name" value="">
                  </div>
                  <div class="col-sm-5 result" id="status" style="align-items: left; color: red;" ></div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User ID.</label>

                  <div class="col-sm-10">
                    <input class="form-control check_sponsor_exist" data-response="username_res" required id="inputEmail3" placeholder="Username" type="text" name="user_id" value="" >
                  </div>
                 
                </div>
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
      
                    <select class="form-control" required="" name="amount">
                      <option>Select Package</option>
                        <option value="500">Rs.500 (2500 Rs)</option>
                        <option value="750">Rs.750 (5000 Rs)</option>
                        <option value="1000">Rs.1000 (10000 Rs)</option>
                        <!--<option value="3000">Rs.3000 (2500 DP)</option>-->
                        <!-- <option value="3200">Rs.3200 (2600 BV)</option> -->
                        <!--<option value="7500">Rs.7500 (5000 BV)</option>-->
                        <!--<option value="15000">Rs.15000 (10000 BV)</option>-->
                        <!--<option value="30000">Rs.30000 (20000 BV)</option>-->
                       
                       
                     </select>
                  </div>
                  
                </div>
                 <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">No of Pins</label>

                  <div class="col-sm-10">
      
                  <input class="form-control"  required id="inputEmail3" placeholder="Number Of Pins" min="0" type="number" name="pins" value="" >
                  </div>
                  
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