
<script src="{{asset('/assets-admin/js/modernizr.min.js')}}"></script>
<script src="{{asset('/assets-admin/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets-admin/js/moment.min.js')}}"></script>

<script src="{{asset('/assets-admin/js/popper.min.js')}}"></script>
<script src="{{asset('/assets-admin/js/bootstrap.min.js')}}"></script>

<script src="{{asset('/assets-admin/js/detect.js')}}"></script>
<script src="{{asset('/assets-admin/js/fastclick.js')}}"></script>
<script src="{{asset('/assets-admin/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('/assets-admin/js/jquery.nicescroll.js')}}"></script>

<!-- Counter-Up-->
<script src="{{asset('assets-admin/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets-admin/plugins/counterup/jquery.counterup.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('/assets-admin/js/admin.js')}}"></script>

<script>
    $(document).on('ready', function() {
        // counter-up
        $('.counter').counterUp({
            delay: 10,
            time: 600
        });
    });
</script>
