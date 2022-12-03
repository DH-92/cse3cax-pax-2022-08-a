<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Assign Lecturer</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="modal-body">
    <p>Select a lecturer to assign to this Subject Instance. Please note that only lecturers qualified to teach this subject will be displayed. Alternatively, you can delete this Subject Instance by clicking the "Delete Instance" button.</p>

    <label for="instance">Subject Instance: </label>
    <input id="instance" class="form-control" type="text" placeholder="{{ $id }}" aria-label="Disabled input example" disabled>
    <label for="lecturer">Lecturer: </label>
    <select id="lecturer" class="form-select" aria-label="Default select example">
        <option selected>Select a Lecturer</option>
        @foreach($lecturers as $lecturer)
            <option value="{{$lecturer['id']}}">{{$lecturer['lastName']}}</option>
        @endforeach
    </select>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary">Assign</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
