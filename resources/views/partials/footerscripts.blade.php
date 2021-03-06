<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/demo8/base/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
<script>
    var authUser = {!! auth()->user() !!};
    var isAdmin = {!! json_encode(auth()->user()->hasRole('Admin')) !!};
    var userModeratedTeams = {!! auth()->user()->moderator() !!};
</script>

<script>
    $(function() {
        $.fn.select2.defaults.set("theme", "bootstrap");
    });
</script>