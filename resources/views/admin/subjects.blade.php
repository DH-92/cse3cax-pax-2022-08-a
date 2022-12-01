@php
    $title = "List Subjects";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<!-- <div>Admin Subjects View</div> -->
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="row">
        <div class="text-right">
            <a href="/admin/subjects/add">
                <button class="btn btn-secondary bg-didasko"><i class="fa-solid fa-plus"></i> Add Subject</button>
            </a>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-bordered table-responsive">
                <tr class="bg-didasko text-white">
                    <th>Code</th>
                    <th>Name</th>
                    <td>Actions</td>
                </tr>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->code}}</td>
                        <td>{{$subject->name}}</td>
                        <td>
                            <a href="/admin/subjects/edit/{{$subject->code}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/admin/subjects/delete/{{$subject->code}}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>


{{--close off any opening tags made in header/navigation--}}
@include('footer')
