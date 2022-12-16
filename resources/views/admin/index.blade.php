@php
    $title = "Administrator Dashboard";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<br>
    
<div style="background-color:#0e6ea1;"class="col-sm-9">
      <div class="well">
        <h4 style="color:white;"> Subjects</h4>
        <a href="admin/subjects">List Subjects</a>
      </div>
</br>     
<br>
        <div  style="background-color:#0e6ea1;"class="col-sm-9">
          <div class="well">
            <h4 style="color:white;"> Users</h4>
            <a href="admin/users">List Users</a>
          </div>
        </div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
