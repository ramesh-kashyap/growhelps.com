@include('layouts.upnl.header')


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Member</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Activation</a></li>
                                            <li class="breadcrumb-item active">Account Activity</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Account Activity</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3">Account Activity</h4>
    
                                     <form method="POST"  action="{{route('SubmitActivation')}}" enctype="multipart/form-data"  files="true" >
											                @if(session()->has('messages'))
                                        <div class="alert alert-success">
                                        <strong style="color:#006633;">
                                        {{ session()->get('messages') }}
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
                                                <label for="exampleInputEmail1">Amount</label>
                                            

                                                <select class="form-control" name="amount" onchange="change_language(this.value);" required="">
                                                <option value="">Select Package</option>
                                                   <option value="3000">Rs.3000 (2500 DP)</option>
                                                 
                                               </select>
                                     
                                            </div>
                                           
                                            
                                               
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Select Pin No</label>
                                              <select id="breeds" class="form-control" name="pin" required="">
                                                  
                                            </select>
                                     
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">User ID</label>
                                              <input type="text" name="user_id" class="form-control check_sponsor_exist" value="" data-response="sponsor_res" required="" placeholder="User ID">
                                               <span id="sponsor_res"></span>
                                     
                                            </div>



                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div>
 <script src="https://code.jquery.com//jquery-3.3.1.min.js"> </script>                      
 <script>
         function change_language(lang)
    {

      var type=lang;
      // alert(type);
      
        $.ajax({
         url: "{{route('Get-Selected-pin')}}",
         data: {"type":type, "_token": "{{ csrf_token() }}",},             
        type:'POST',
         dataType: 'json',
        success: function(response) {
            $("#breeds").attr('disabled', false);
            console.log(response);
            $('#breeds').children().remove().end()
            $.each(response,function(key, value)
            {
                $("#breeds").append('<option value=' + value.pin + '>' + value.pin + '</option>');
            });
         }

    });
   }
      $('.check_sponsor_exist').change(function (e) { 
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var sponsor = $(this).val();       
        // alert(sponsor); 
        $.ajax({
          type: "POST",
          url: "{{route('getUserName')}}",
          data: {"user_id":sponsor, "_token": "{{ csrf_token() }}",},          
          success: function (response) {      
          // alert(response);      
            if(response!=1){
              // alert("hh");
              $('#'+res_area).html(response).css('color','#000').css('font-weight','800').css('margin-buttom','10px');
            }else{
              // alert("hi");
              $('#'+res_area).html("User Not exists!").css('color','red').css('margin-buttom','10px');
            }
          }
        });
    });

   
   </script> 
       
                            </div>
                            <!-- end row -->
    
    
                            <!-- Inline Form -->
                   
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


		<!--end page-wrapper-->
	@include('layouts.upnl.footer')