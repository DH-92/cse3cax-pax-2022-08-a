<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Assign Lecturer</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="modal-body">
    <p>Select a lecturer to assign to this Subject Instance. Please note that only lecturers qualified to teach this subject will be displayed. Alternatively, you can delete this Subject Instance by clicking the "Delete Instance" button.</p>

    <label for="instance">Subject Instance: </label>
    <input id="instance" class="form-control" type="text" value="{{ $id }}" aria-label="Disabled input example" disabled>
    @if($lecturers->isEmpty())
        <div class="text-center text-danger pt-2 pb-2">
            Could not find any qualified lecturers! Click <a href="users" class="text-primary">here</a> to assign qualifications to lecturers.
        </div>
    @else
    <label for="lecturer">Lecturer: </label>
    <select id="lecturer" class="form-select" aria-label="Default select example">
        <option value="0">Unassigned</option>
        @foreach($lecturers as $lecturer)
            <option value="{{ $lecturer->id }}" @if($assigned == $lecturer->id) selected @endif>{{ $lecturer->firstName . ' ' . $lecturer->lastName }}</option>
        @endforeach
    </select>
    <div class="float-end">
        Click <a href="users" class="text-primary">here</a> to assign qualifications to lecturers.
    </div>
    @endif
</div>
<div class="modal-footer">
    @if(!$lecturers->isEmpty())
    <button type="button" id="submitLecturer" class="btn btn-primary">Assign</button>
    @endif
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>

<script>
    $(document).ready(function(){
        $("#submitLecturer").click(function(){
            var instance = $('#instance').val();
            var lecturer = $('#lecturer').val();
            $.ajax({
                method: "POST",
                url: "/instance/assignLecturer",
                data: { instance: instance, lecturer: lecturer }
                })
                .done(function( msg ) {
                    location.reload();
                    // alert( "Data Saved: " + msg );
            });
        });
    });
</script>
