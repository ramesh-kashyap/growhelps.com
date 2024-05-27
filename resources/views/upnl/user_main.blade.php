@include('layouts.upnl.header')


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

       
	@if(isset($page) && $page != '')
		@include($page)
	@endif

		<!--end page-wrapper-->
	@include('layouts.upnl.footer')