@php
    $title = "Administrator Dashboard";
@endphp

@include('header')
@include('navigation')
{{--Actual content starts here--}}
<div class="container d-flex justify-content-start">
    <a href="/admin/subjects" class="nav-link px-0 link-primary">
        <div id="card" class="d-flex justify-content-center w-100 border border-2 border-primary m-3">
            <div id="card-content">
                <div id="card-title">
                    <div class="col pb-3">
                        <span class="h2">Subjects</span>
                    </div>
                    <div class="col d-flex justify-content-center">
                     <i class="fa-solid fa-book-open fa-5x"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="/admin/users" class="nav-link link-primary">
        <div id="card" class="d-flex justify-content-center w-100 border border-2 border-primary ms-5 m-3">
            <div id="card-content">
                <div id="card-title">
                    <div class="col pb-3">
                        <span class="h2">Users</span>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <i class="fa-solid fa-users fa-5x"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
