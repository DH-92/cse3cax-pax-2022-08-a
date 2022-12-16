@php
    $title = "Administrator Dashboard";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Subjects</h4>
        <a href="admin/subjects">List Subjects</a>
      </div>
      <div class="row">
        <div class="col-sm-9">
          <div class="well">
            <h4>Users</h4>
            <a href="admin/users">List Users</a>
          </div>
        </div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
