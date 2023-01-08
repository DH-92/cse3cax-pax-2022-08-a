<div class="modal-header pb-1 pt-1">
    <h5 class="modal-title" id="exampleModalLabel">Create Subject Instance</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body pt-0" id="modal-body">
    <div>
        <small>Click "Create" to create this subject instance. You can also assign a lecturer to this Subject Instance (optional). Please note that only lecturers qualified to teach this subject will be displayed.</small>
    </div>
    <div class="pt-2">
        <label for="instance">Subject Instance: </label>
        <input id="instance" class="form-control" type="text" value="{{ $id }}" aria-label="Disabled input example" disabled>
    </div>
    <div class="pt-2">
        <label for="load">Additional Load: </label>
        <div class="row w-100">
            <div class="col-12">
                <input type="range" name="load" class="w-75" id="load" min="0" max="100" value="{{ $user->load ?? 0 }}" step="5" oninput="setLoadValue(this.value)" />
                <span id="lblLoad"></span>%
            </div>
            <div class="col-12 pt-2">
                <small>The "Additional Load" setting increases the amount of attention required from lecturers. For example, a large student count. An `additional load` of 100% equates to the load of two subjects.</small>
            </div>
        </div>
    </div>
    @if($lecturers->isEmpty())
        <div class="text-center text-danger pt-2 pb-2">
            Could not find any qualified lecturers! Click <a href="users" class="text-primary">here</a> to assign qualifications to lecturers.
        </div>
    @else
        <div class="pt-2">
            <label for="lecturer">Lecturer: </label>
            <select id="lecturer" class="form-select" aria-label="Default select example">
                <option value="0" selected>Unassigned</option>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->firstName . ' ' . $lecturer->lastName }}</option>
                @endforeach
            </select>
        </div>
        <div class="float-end">
            Click <a href="users" class="text-primary">here</a> to assign qualifications to lecturers.
        </div>
    @endif
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

    let loadVal = document.getElementById("load").value;
    document.getElementById("lblLoad").addEventListener('load', setLoadValue(loadVal));

    function setLoadValue(loadVal){
        document.getElementById("lblLoad").innerHTML = loadVal;
    }
</script>
