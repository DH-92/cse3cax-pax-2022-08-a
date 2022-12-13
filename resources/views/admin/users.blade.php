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
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
    <div class="row">
        <div class="text-right">
            <a href="/admin/users/add">
                <button class="btn btn-secondary bg-didasko"><i class="fa-solid fa-plus"></i> Add User</button>
            </a>

            <button type="button" class="btn btn-secondary bg-didasko" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Data
                </button>
           </div>
                    
            
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
        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div>

{{--close off any opening tags made in header/navigation--}}
@include('footer')
