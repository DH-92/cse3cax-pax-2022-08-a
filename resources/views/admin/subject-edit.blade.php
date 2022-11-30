@php
    $isEdit = (request()->segment(count(request()->segments())) != "add");

    //TODO: this needs to be passed from controller/retrieved from model
    $data = (!$isEdit) ? null : [
        'code' => "CSE1ITX",
        'name' => "Information Technology Fundamentals",
        'description' => "This subject provides a general and practical introduction to information technology. It covers: fundamental principles of computer operation, the main hardware components of the computer and a few common application software."
    ];
    //TODO: Move the above hardcode into the controller/routes
    $title = ($isEdit) ? "Edit " . $data['code'] : "Add Subject";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<div class="container-fluid">
    <form action="#" method="post">
        <div class="w-50 mb-3">
            <label for="code" class="form-label">Subject Code</label>
            <input type="text" class="form-control" id="code" value="{{ $data['code'] }}" placeholder="e.g: CSE1ITX" />
        </div>
        <div class="w-50 mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="name" value="{{ $data['name'] }}" />
        </div>
        <div class="w-50 mb-3">
            <label for="description" class="form-label">Subject Description</label>
            <textarea class="form-control" rows="5" id="description">{{ $data['description'] }}</textarea>
        </div>
        <div class="w-50 px-2">
            @if($isEdit)
                <a href="#" class="btn btn-danger" role="button">Delete {{ $data['code'] }}</a>
            @endif
            <button type="submit" class="btn btn-primary float-end mx-2">{{ ($isEdit) ? "Save" : "Add" }}</button>
                <a href="/admin/subjects/" class="btn btn-secondary float-end" role="button">Cancel</a>
        </div>
    </form>
</div>

{{--close off any opening tags made in header/navigation--}}
@include('footer')
