<div class="modal-header pb-1 pt-1">
    <h5 class="modal-title" id="exampleModalLabel">Publish Schedule</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body pt-0" id="modal-body">
    <small>Are you sure you want to publish this schedule? Lecturers will not be able to see the subject instances assigned to them until the Schedule is published.</small>
        <div id="overrideBox" class="collapse">
        <small class="text-danger">There are issues that need to be attended to before you can publish this schedule. Please go back and fix the errors or select the override option below.</small>
            <div class="pb-1 collapse" id="uBox">
                <input type="checkbox" id="unassigned" /><label for="unassigned"><strong>Override:</strong> There is a subject instance without a lecturer assigned.</label>
            </div>
            <div class="pt-1 collapse" id="oBox">
                <input type="checkbox" id="overload" /><label for="overload"><strong>Override:</strong> A lecturer has been assigned more subject instances (load) than they are capable of.</label>
            </div>
        </div>
    </div>
<div class="modal-footer">
    <button type="button" id="continue" class="btn btn-primary" onclick="save()">Publish</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
<script type="text/javascript">
    document.getElementById('unassigned').addEventListener('change', (event) => {
        enableButton();
    });
    document.getElementById('overload').addEventListener('change', (event) => {
        enableButton();
    });

    document.getElementById('continue').addEventListener('load', load());

    function save(){
        //TODO: remove hardcoding and replace with pagination in ca2-95
        let firstTerm = '2022_JAN';
        let timeframe = 12;

        $.ajax({
            method: "POST",
            url: "/schedule/publish",
            data: { firstTerm: firstTerm, timeframe:  timeframe}
        }).done(function(msg) {
            //alert(msg);
            location.reload();
        });
    }

    function load(){
        if([1,3].includes({{$id}})){
            document.getElementById('uBox').classList.remove('collapse');
            document.getElementById('overrideBox').classList.remove('collapse');
        }
        if([2,3].includes({{$id}})){
            document.getElementById('oBox').classList.remove('collapse');
            document.getElementById('overrideBox').classList.remove('collapse');
        }
        enableButton();
    }

    function enableButton(){
        let val = (([1,3].includes({{ $id }})) && document.getElementById('unassigned').checked) ? 1 : 0;
        val += (([2,3].includes({{ $id }})) && document.getElementById('overload').checked) ? 2 : 0;

        if(val == {{$id}}){
            document.getElementById('continue').disabled = false;
            document.getElementById('continue').classList.replace("btn-danger", "btn-primary");
        } else {
            document.getElementById('continue').disabled = true;
            document.getElementById('continue').classList.replace("btn-primary", "btn-danger");
        }
    }
</script>
