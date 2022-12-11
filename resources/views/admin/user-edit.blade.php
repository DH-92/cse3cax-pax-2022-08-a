@php
    $isEdit = (request()->segment(count(request()->segments())) != "add");

    //TODO: this needs to be passed from controller/retrieved from model
    $data = (!$isEdit) ? null : [
        'firstName' => "Professor",
        'lastName' => "Acacia",
        'phone' => "0412 345 678",
        'email' => 'acacia@didasko.com',
        'employmentType' => 'Full-Time',
        'userType' => 1,
        'qualifications' => [
            "CSE1ITX",
            "CSE1ISX"
        ],
        'color' => '#ff00ff',
        'load' => 40
    ];
    //TODO: Move the above hardcode into the controller/routes
    $title = ($isEdit) ? sprintf("Edit User: %s %s", $data['firstName'], $data['lastName']) : "Add User";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<div class="container-fluid">
    <form action="{{$user->id ?? 'add'}}" method="post"> @csrf
        <div class="row w-75 mt-3 mb-3 align-items-center">
            <div class="col-2">
                <label for="fname" class="form-label">First Name</label>
            </div>
            <div class="col-4">
                <input type="text" name="firstName" class="form-control" id="fname" value="{{ $user->firstName ?? "" }}" placeholder="" />
            </div>
            <div class="col-2">
                <label for="lname" class="form-label">Surname</label>
            </div>
            <div class="col-4">
                <input type="text" name="lastName" class="form-control" id="lname" value="{{ $user->lastName ?? "" }}" placeholder="" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="phone" class="form-label">Phone</label>
            </div>
            <div class="col-4">
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone ?? "" }}" placeholder="" />
            </div>
            <div class="col-2">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="col-4">
                <input type="text" name="email" class="form-control" id="email" value="{{ $user->email ?? "" }}" placeholder="" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="employmentType" class="form-label">Employment Type</label>
            </div>
            <div class="col-4">
                <input type="text" name="employmentType" class="form-control" id="employmentType" value="{{ $user->employmentType ?? "" }}" placeholder="" />
            </div>
            <div class="col-2">
                <label for="userType" class="form-label">User Type</label>
            </div>
            <div class="col-4">
                <input type="text" name="userType" class="form-control" id="userType" value="{{ $user->userType ?? "" }}" placeholder="" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="qualifications" class="form-label">Subject Qualifications</label>
            </div>
            <div class="col-4">
                    <select class="selectpicker form-select" multiple aria-label="size 3 select example">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                    </select>
            </div>
            <div class="col-2">
                <label for="color" class="form-label">Schedule Colour</label>
            </div>
            <div class="col-4">
                <input type="color" name="color" class="form-control form-control-color" id="color" value="{{ $user->color ?? "#ffffff" }}" title="Assign the colour to be used in the schedule for this user" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="load" class="form-label">Subject Load</label>
            </div>
            <div class="col-10">
                <input type="range" name="maxLoad" class="w-75" id="load" min="0.1" max="1" value="{{ $user->maxLoad }}" step="0.1" oninput="setLoadValue(this.value)" />
                <span id="lblLoad"></span>%
            </div>
        </div>
        <div class="w-75 px-2">
            @if($isEdit)
                <a href="/admin/users/delete/{{$user->id}}" class="btn btn-danger" role="button">Delete</a>
            @endif
            <button type="submit" class="btn btn-primary float-end mx-2">{{ ($isEdit) ? "Save" : "Add" }}</button>
            <a href="/admin/users/" class="btn btn-secondary float-end" role="button">Cancel</a>
        </div>
    </form>
</div>
<script type="text/javascript">
    let loadVal = document.getElementById("load").value;
    document.getElementById("lblLoad").onload(setLoadValue(loadVal));

    function setLoadValue(loadVal){
        document.getElementById("lblLoad").innerHTML = loadVal * 100;
    }
</script>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
