@php
    $title = "List Users";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<div>Admin/Manager Users View</div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="row">
        <div class="text-right">
            <a href="/admin/users/add">
                <button class="btn btn-secondary bg-didasko"><i class="fa-solid fa-plus"></i> Add User</button>
            </a>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-bordered table-responsive">
                <tr class="bg-didasko text-white">
                    <th>Name</th>
                    <th>Phone</th>
                    <td>Employment Type</td>
                    <th>Load</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                    @foreach($users as $user)
                    @php $fullName = $user->firstName." ".$user->lastName; @endphp
                    <tr>
                        <td>{{$fullName}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->employmentType}}</td>
                        <td>{{$user->maxLoad}}</td>
                        <td>
                            <a href="/admin/users/edit/{{$user->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/admin/users/delete/{{$user->id}}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>

{{--close off any opening tags made in header/navigation--}}
@include('footer')
