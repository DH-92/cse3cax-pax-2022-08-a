@php
    $title = "Administrator Dashboard";
@endphp

@include('header')
@include('navigation')
{{--Actual content starts here--}}

<br>
<div class="container">
<div class="row">
<div style="background-color:#08508a;"class="col-sm-8">
      <div class="well">
        <h4 style="color:white;"> Subjects</h4>
        <a style = "background-color:white;" href="admin/subjects">List Subjects</a>
      </div>
</div>
</div>
<div class="row">
<div style="background-color:white;"class="col-sm-4">
      <div class="well">
      </div>
</div>
</div>
<div class="row">
        <div  style="background-color:#08508a;"class="col-sm-8">
          <div class="well">
            <h4 style="color:white;"> Users</h4>
            <a style="background-color:white;" href="admin/users">List Users</a>
          </div>
        </div>
</div>
</div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
