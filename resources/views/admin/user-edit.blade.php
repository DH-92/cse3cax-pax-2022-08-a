@php
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SubjectController;
    $isEdit = (request()->segment(count(request()->segments())) != "add");

    $title = ($isEdit) ? sprintf("Edit User: %s %s", $user->firstName, $user->lastName) : "Add User";
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
                <input type="text" name="firstName" class="form-control border-primary" id="fname" value="{{ $user->firstName ?? "" }}" placeholder="" />
            </div>
            <div class="col-2">
                <label for="lname" class="form-label">Surname</label>
            </div>
            <div class="col-4">
                <input type="text" name="lastName" class="form-control border-primary" id="lname" value="{{ $user->lastName ?? "" }}" placeholder="" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="phone" class="form-label">Phone</label>
            </div>
            <div class="col-4">
                <input type="text" name="phone" class="form-control border-primary" id="phone" value="{{ $user->phone ?? "" }}" placeholder="" />
            </div>
            <div class="col-2">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="col-4">
                <input type="text" name="email" class="form-control border-primary" id="email" value="{{ $user->email ?? "" }}" placeholder="" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="employmentType" class="form-label">Employment Type</label>
            </div>
            <div class="col-4">
                <select id="employmentType" name="employmentType" class="selectpicker w-100 border rounded border-primary">
                    <option value="Other">Other</option>
                    @foreach(UserController::getEmploymentTypes() as $type)
                        <option value="{{ $type }}" @if (($user->employmentType ?? "Other") == $type) selected @endif>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="userType" class="form-label">User Type</label>
            </div>
            <div class="col-4">
                <select id="userType" name="userType" class="selectpicker w-100 border rounded border-primary">
                    @foreach(UserController::getUserTypes() as $id => $type)
                        <option value="{{ $id }}" @if (($user->userType ?? 3) == $id) selected @endif>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="qualifications" class="form-label">Subject Qualifications</label>
            </div>
            <div class="col-4">
                <select class="selectpicker w-100 border rounded border-primary" id="qualifications" name="qualifications[]" multiple>
                    @foreach(SubjectController::getSubjects() as $subject)
                        <option value="{{ $subject->id }}" @if(isset($user) && $user->qualifications()->get()->contains('id', $subject->id)) selected @endif>[{{ $subject->code }}] {{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="color" class="form-label">Schedule Colour</label>
            </div>
            <div class="col-4">
                <input type="color" name="color" class="form-control form-control-color border-primary" id="color" value="{{ $user->color ?? "#ffffff" }}" title="Assign the colour to be used in the schedule for this user" />
            </div>
        </div>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-2">
                <label for="load" class="form-label">Subject Load</label>
            </div>
            <div class="col-10">
                <input type="range" name="maxLoad" class="w-75" id="load" min="0.1" max="1" value="{{ $user->maxLoad ?? 0.8 }}" step="0.1" oninput="setLoadValue(this.value)" />
                <span id="lblLoad"></span>%
            </div>
        </div>
        <div class="w-75 px-2">
            @if($isEdit)
                <a href="../../users/delete/{{$user->id}}" class="btn btn-danger" role="button">Delete</a>
            @endif
            <button type="submit" class="btn btn-primary float-end mx-2">{{ ($isEdit) ? "Save" : "Add" }}</button>
            <a href="../../users" class="btn btn-secondary float-end" role="button">Cancel</a>
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
