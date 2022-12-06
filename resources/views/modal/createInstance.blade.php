<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create Subject Instance</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="modal-body">
    <p>Click "Create" to create this subject instance. You can also assign a lecturer to this Subject Instance (optional). Please note that only lecturers qualified to teach this subject will be displayed.</p>
    <label for="instance">Subject Instance: </label>
    <input id="instance" class="form-control" type="text" value="{{ $id }}" aria-label="Disabled input example" disabled>
    <label for="lecturer">Lecturer (optional): </label>
    <select id="lecturer" class="form-select" aria-label="Default select example">
        <option selected>Select a Lecturer</option>
        @foreach($lecturers as $lecturer)
        <option value="{{$lecturer['id']}}">{{$lecturer['lastName']}}</option>
        @endforeach
    </select>
</div>
<div class="modal-footer">
    <button type="button" id="submitInstance" class="btn btn-primary">Create</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>

<script>
    $(document).ready(function(){
        $("#submitInstance").click(function(){
            var instance = $('#instance').val();
            var lecturer = $('#lecturer').val();
            $.ajax({
                method: "POST",
                url: "/instance/create",
                data: { instance: instance, lecturer: lecturer }
                })
                .done(function( msg ) {
                    location.reload();
                    // alert( "Data Saved: " + msg );
            });
        });
    });
</script>