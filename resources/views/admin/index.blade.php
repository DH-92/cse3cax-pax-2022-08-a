@php
    $title = "Administrator Dashboard";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<a href="admin/subjects">List Subjects</a>
<a href="admin/users">List Users</a>

{{--close off any opening tags made in header/navigation--}}
@include('footer')
