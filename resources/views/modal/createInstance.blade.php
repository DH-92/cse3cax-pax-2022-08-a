<div class="modal-header pb-1 pt-1">
    <h5 class="modal-title" id="exampleModalLabel">Create Subject Instance</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="modal-body">
    <p>Click "Create" to create this subject instance. You can also assign a lecturer to this Subject Instance (optional). Please note that only lecturers qualified to teach this subject will be displayed.</p>
    <label for="instance">Subject Instance: </label>
    <input id="instance" class="form-control" type="text" value="{{ $id }}" aria-label="Disabled input example" disabled>
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
    <br>
        <label for="lecturer">Lecturer: </label>
        <select id="lecturer" class="form-select" aria-label="Default select example">
            <option value="0" selected>Unassigned</option>
            @foreach($lecturers as $lecturer)
                <option value="{{ $lecturer->id }}">{{ $lecturer->firstName . ' ' . $lecturer->lastName }}</option>
            @endforeach
        </select>
        <div class="row w-75 mb-3 align-items-center">
            <div class="col-6">
                <label for="load" class="form-label">Primary Lecturer Load Allocation:</label>
            </div>
            <div class="col-10">
                <input type="range" name="lecturer_load" class="w-75" id="lecturer_load" min="1" max="100" value="{{ $user->lecturer_load ?? 100 }}" step="1" oninput="setLoadValue(this.value)" disabled='true'/>
                <span id="lblLoad">100</span>%
            </div>
        </div>
        <br>
        <label for="support-lecturer">Supporting Lecturer: </label>
        <select id="support-lecturer" class="form-select" aria-label="Default select example">
            <option value="0" selected>Unassigned</option>
            @foreach($lecturers as $lecturer)
                <option value="{{ $lecturer->id }}">{{ $lecturer->firstName . ' ' . $lecturer->lastName }}</option>
            @endforeach
        </select>
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
    
    function setLoadValue(loadVal){
        document.getElementById("lblLoad").innerHTML = loadVal;
    }

    $(document).ready(function(){
        toggleSupport();
        support();
        $("#submitInstance").click(function(){
            var instance = $('#instance').val();
            var lecturer = $('#lecturer').val();
<<<<<<< HEAD
            var supportLecturer = $('#support-lecturer').val();
            var load = $('#lblLoad').text();
            $.ajax({
                method: "POST",
                url: "/instance/create",
                data: { instance: instance, lecturer: lecturer, support: supportLecturer, load: load }
=======
            var load = $('#load').val() / 100;
            $.ajax({
                method: "POST",
                url: "/instance/create",
                data: { instance: instance, lecturer: lecturer, load: load }
>>>>>>> d0166516bef10d70b0e6cf0540a8263f16ac27f2
                })
                .done(function( msg ) {
                    location.reload();
                    // alert( "Data Saved: " + msg );
            });
        });
    });

    document.getElementById("lblLoad").addEventListener('load', setLoadValue(document.getElementById("load").value));

    function setLoadValue(loadVal){
        document.getElementById("lblLoad").innerHTML = loadVal;
    }
</script>
