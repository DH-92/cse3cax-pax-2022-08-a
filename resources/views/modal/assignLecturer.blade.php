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
    <div class="row w-75 mb-3 align-items-center">
        <div class="col-6">
            <label for="load" class="form-label">Primary Lecturer Load Allocation:</label>
        </div>
        <div class="col-10">
            <input type="range" name="lecturer_load" class="w-75" id="lecturer_load" min="5" max="100" value="{{ $lecturer_load ?? 100 }}" step="5" oninput="setLoadValue(this.value)" />
            <span id="lblLoad">{{ $lecturer_load ?? 100 }}</span>%
        </div>
    </div>
    <br>
    <label for="support-lecturer">Supporting Lecturer: </label>
    <select id="support-lecturer" class="form-select" aria-label="Default select example" disabled='true'>
        <option value="0">primary lecturer required for support lecturer allocation</option>
        @foreach($lecturers as $lecturer)
            <option value="{{ $lecturer->id }}" @if($assignedSupport == $lecturer->id) selected @endif >{{ $lecturer->firstName . ' ' . $lecturer->lastName }}</option>
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
    $('#lecturer').change(toggleSupport);

    function toggleSupport(){
        var lecturer = $('#lecturer').val();
        if(lecturer != 0){
            $('#support-lecturer option:contains(primary lecturer required for support lecturer allocation)').text('Unassigned');
            $("#support-lecturer > option").each(function() {
                if($(this).val() == lecturer){
                    $(this).attr('disabled', true);
                }
            });
            $('#support-lecturer').removeAttr('disabled');
        }else{
            $('#support-lecturer option:contains(Unassigned)').text('primary lecturer required for support lecturer allocation');
            $('#support-lecturer').attr('disabled', true);
        }
    }
    function support(){
        support = $('#support-lecturer').val();
        if(support != 0){
            $('#lecturer_load').removeAttr('disabled');
            let loadVal = document.getElementById("lecturer_load").value;
            $("lblLoad").load(setLoadValue(loadVal));
        }else{
            $('#lecturer_load').attr('disabled', true);
        }
    }

    $('#support-lecturer').change(support);

    function setLoadValue(loadVal){
        document.getElementById("lblLoad").innerHTML = loadVal;
    }

    $(document).ready(function(){
        toggleSupport();
        support();
        $("#submitLecturer").click(function(){
            var instance = $('#instance').val();
            var lecturer = $('#lecturer').val();
            var supportLecturer = $('#support-lecturer').val();
            var load = $('#lblLoad').text();
            $.ajax({
                method: "POST",
                url: "/instance/assignLecturer",
                data: { instance: instance, lecturer: lecturer, support: supportLecturer, load: load }
                })
                .done(function( msg ) {
                    location.reload();
                    // alert( "Data Saved: " + msg );
            });
        });
    });
</script>
