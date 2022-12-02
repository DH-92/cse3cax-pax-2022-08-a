@php
    $isEdit = (request()->segment(count(request()->segments())) != "add");
    //TODO: this needs to be passed from controller/retrieved from model
    $data = (!$isEdit) ? null : [
        'code' => $subject->code,
        'name' => $subject->name,
        'description' => $subject->description,
    ];
    //TODO: Move the above hardcode into the controller/routes
    $title = ($isEdit) ? "Edit " . $data['code'] : "Add Subject";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<div class="container-fluid">
    <form action="{{$subject->code ?? 'add'}}" method="post"> 
        @csrf
        <div class="w-50 mb-3">
            <label for="code" class="form-label">Subject Code</label>
            <input type="text" name="code" class="form-control" id="code" value="{{ $subject->code ?? "" }}" placeholder="e.g: CSE1ITX" required/>
        </div>
        <div class="w-50 mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $subject->name ?? "" }}" placeholder="e.g: Information Technology Fundamentals" required />
        </div>
        <div class="w-50 mb-3">
            <label for="description" class="form-label">Subject Description</label>
            <textarea class="form-control" name="description" rows="5" id="description" placeholder="Please enter a short description of the subject">{{ $subject->description ?? "" }}</textarea>
        </div>
        <div class="w-50 px-2">
            @if($isEdit)
                <a href="/admin/subjects/delete/{{$subject->code}}" class="btn btn-danger" role="button">Delete {{ $data['code'] }}</a>
            @endif
            <button type="submit" class="btn btn-primary float-end mx-2">{{ ($isEdit) ? "Save" : "Add" }}</button>
                <a href="/admin/subjects/" class="btn btn-secondary float-end" role="button">Cancel</a>
        </div>
    </form>
</div>

{{--close off any opening tags made in header/navigation--}}
@include('footer')
