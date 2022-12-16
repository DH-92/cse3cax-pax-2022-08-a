@php
    $title = "Unauthorized Access";
@endphp

@include('header')
@include('navigation')
{{--Actual content starts here--}}
<div>
    You do not have access to this page. Please contact your system administrator if you believe you are seeing this message in error.
</div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
