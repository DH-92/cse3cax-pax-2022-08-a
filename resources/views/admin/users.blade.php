@php
    $title = "List Users";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
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
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Employment Type</th>
                    <th class="text-center">Load</th>
                    <th class="text-center">Actions</th>
                </tr>
                <tbody>
                    @foreach($users as $user)
                    @php $fullName = $user->firstName." ".$user->lastName; @endphp
                    <tr>
                        <td class="text-center">{{$fullName}}</td>
                        <td class="text-end">{{$user->phone}}</td>
                        <td class="text-center">{{$user->employmentType}}</td>
                        <td class="text-center">{{$user->maxLoad}}</td>
                        <td class="text-center">
                            <a href="users/edit/{{$user->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="users/delete/{{$user->id}}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

{{--close off any opening tags made in header/navigation--}}
@include('footer')
