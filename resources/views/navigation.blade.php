@php
    $userType = Session::get('user')->userType;
@endphp
<div class="col-auto col-md-3 col-xl-2 col-sm-3 px-0 bg-didasko">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none link-light">
            <span class="fs-5 d-none d-sm-inline align-items-center"><img class="mw-100" src="{{ URL::asset('images/didasko-logo.jpg') }}" alt="Didasko Logo" /></span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
        @if($userType == 0)
            <li>
                <a href="/lecturer/schedule" class="nav-link px-0 align-middle link-light">
                    <i class="fa-regular fa-calendar-days"></i> <span class="ms-1 d-none d-sm-inline">My Schedule</span>
                </a>
            </li>
        @elseif($userType == 1)
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle link-light">
                    <i class="fa-solid fa-pen-to-square"></i> <span class="ms-1 d-none d-sm-inline">Manage</span></a>
                <ul class="collapse nav flex-column ms-1 show" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="/manager/schedule" class="nav-link px-0 link-light"> <i class="fa-regular fa-calendar-days"></i> <span class="d-none d-sm-inline">Schedule</span></a>
                    </li>
                    <li class="w-100">
                        <a href="/manager/users" class="nav-link px-0 link-light"> <i class="fa-solid fa-users"></i> <span class="d-none d-sm-inline">Users</span></a>
                    </li>
                </ul>
            </li>
        @elseif($userType == 2)
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle link-light">
                    <i class="fa-solid fa-pen-to-square"></i> <span class="ms-1 d-none d-sm-inline">Administration</span></a>
                <ul class="collapse nav flex-column ms-1 show" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="/admin/subjects" class="nav-link px-0 link-light"> <i class="fa-solid fa-book-open"></i> <span class="d-none d-sm-inline">Subjects</span></a>
                    </li>
                    <li class="w-100">
                        <a href="/admin/users" class="nav-link px-0 link-light"> <i class="fa-solid fa-users"></i> <span class="d-none d-sm-inline">Users</span></a>
                    </li>
                </ul>
            </li>
        @endif
            <li class="w-100">
                <a href="/change-password" class="nav-link px-0 link-light"> <i class="fa-solid fa-key"></i> <span class="d-none d-sm-inline">Change Password</span></a>
            </li>
            <li>
                <a href="/signout" class="nav-link px-0 link-light"> <i class="fa-solid fa-door-open"></i> <span class="d-none d-sm-inline">Logout</span></a>
            </li>
        </ul>
    </div>
</div>
<div class="col-auto col-md-9 col-xl-10 col-sm-9 px-3 mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 ">
                <h2>{{$title}}</h2>
            </div>


