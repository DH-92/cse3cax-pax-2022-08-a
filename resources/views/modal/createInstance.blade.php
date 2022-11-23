<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create Subject Instance</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="modal-body">
    <p>Click "Create" to create this subject instance. You can also assign a lecturer to this Subject Instance (optional). Please note that only lecturers qualified to teach this subject will be displayed.</p>
    <label for="instance">Subject Instance: </label>
    <input id="instance" class="form-control" type="text" placeholder="{{ $id }}" aria-label="Disabled input example" disabled>
    <label for="lecturer">Lecturer (optional): </label>
    <select id="lecturer" class="form-select" aria-label="Default select example">
        <option selected>Select a Lecturer</option>
        @foreach($lecturers as $uid => $lecturer)
        <option value="{{$uid}}">{{$lecturer}}</option>
        @endforeach
    </select>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-didasko">Assign</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
