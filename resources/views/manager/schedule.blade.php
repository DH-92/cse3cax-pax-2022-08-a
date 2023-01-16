@php
    $title = "Manage Schedule";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
@php
    //TODO: remove hardcoding when implementing pagination ca2-95
    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $year = 2022;
    $load_limit = 8;
    $schedule = [];


    //generate overload data for schedule view
    $loadByTermByUser = [];
    $overloadedUsersByMonth = [];
    foreach ($subjects as $key => $subject){
        for ($i = 0; $i < count($months); $i++) {
            $currTerm = $year . "_" . strtoupper($months[$i]);
            $instance = $subject['instances'][$currTerm] ?? null;
            if (!$instance) continue;
            $user = $instance['user'];
            if (!$user) continue;
            $userId = $user['id'];
            $loadByTermByUser[$userId] = $loadByTermByUser[$userId] ?? [];
            $loadByTermByUser[$userId][$currTerm] = $loadByTermByUser[$userId][$currTerm] ?? 0;
            $loadByTermByUser[$userId][$currTerm]++;

            $term2 = ($i >= 11)
                ? $year+1 . "_" . strtoupper($months[($i+1)%12])
                : $year . "_" . strtoupper($months[$i+1]);
            $loadByTermByUser[$userId][$term2] = $loadByTermByUser[$userId][$term2] ?? 0;
            $loadByTermByUser[$userId][$term2]++;

            $term3 = ($i >= 10)
                ? $year+1 . "_" . strtoupper($months[($i+2)%12])
                : $year . "_" . strtoupper($months[$i+2]);
            $loadByTermByUser[$userId][$term3] = $loadByTermByUser[$userId][$term3] ?? 0;
            $loadByTermByUser[$userId][$term3]++;

            if($loadByTermByUser[$userId][$currTerm] >= $user['maxLoad']*$load_limit) {
                $overloadedUsersByMonth[$months[$i]] = $overloadedUsersByMonth[$months[$i]] ?? [];
                array_push($overloadedUsersByMonth[$months[$i]], $user['firstName']);
            }
        }
    }

    foreach ($subjects as $key => $subject){
        $rows = [];
        for($i = 0; $i < count($months); $i++){
            $term = $year . "_" . strtoupper($months[$i]);
            $instance = $subject['instances'][$term] ?? null;
            if (!$instance) continue;
            $user = $subject['instances'][$term]['user'];
            if (!$user) {
                $icon = '<i class="fa-solid fa-triangle-exclamation text-danger"></i>';
                $name = 'Empty';
            } else {
                $isPublished = $subject['instances'][$term]['published'] == 1;
                $icon = $isPublished
                    ? '<i class="fa-solid fa-circle-check"></i>' 
                    : '<i class="fa-regular fa-circle-check"></i>';
                $name = $user['firstName'];
            }
            $color = $user['color'] ?? "white";
            $rows[0][$i]  = "<div class=\"col-%s h-100 text-center pt-1 pb-1 border border-dark text-truncate\" style=\"background-color:{$color}\"";
            $rows[0][$i] .= "<a class=\"assigned\" href=\"#\" onclick=\"assignLecturer('{$key}_{$term}')\" data-bs-toggle=\"modal\" data-bs-target=\"#modal\">";
            $rows[0][$i] .= "{$icon} <br /> {$name} </a> </div>";
        }
        $schedule[$key] = $rows;
    }
@endphp
<div class="col-2 offset-6 text-center">
    <button id="publish" type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modal">
        Publish Schedule
    </button>
</div>
<div class="manager-schedule container-fluid border border-dark">
    <div class="row">
        <div class="col-2 bg-didasko text-center border border-dark pt-2 pb-1">
            <h5 class="text-light font-weight-bold">Subject</h5>
            @if(!empty($overloadedUsersByMonth))
            <hr/>
            <h5 class="text-danger">Overloaded Lecturers</h5>
            @endif
        </div>
        <div class="col-10 px-0">
            <div class="container">
                <div class="row">
                    @foreach($months as $month)
                        <div class="col bg-didasko text-center border border-dark pt-2 pb-1">
                            <h5 class="text-light font-weight-bold">{{ $month }}</h5>
                            @if(!empty($overloadedUsersByMonth))
                                <hr/>
                                @isset($overloadedUsersByMonth[$month])
                                @foreach($overloadedUsersByMonth[$month] as $name)
                                    <h5 class="text-danger">{{ $name }}</h5>
                                @endforeach
                                @endisset
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @foreach ($subjects as $code => $subject)
        <div class="row">
            <div class="col-2 px-0 border border-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-9 pt-2">
                            <p class="h5 text-dark">
                                {{$code}}
                            </p>
                        </div>
                        <div class="col-3">
                            @if($subject['instances'] != [])
                            <div class="container">
                                <div class="col text-center pt-2 pb-2" id="{{$code}}-single">
                                    <a href="#" class="text-primary" onclick="expand('{{$code}}')">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col text-center collapse pt-2 pb-2" id="{{$code}}-multiple">
                                <a href="#" class="text-primary" onclick="collapse('{{$code}}')">
                                    <i class="fa-solid fa-minus"></i>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row collapse" id="{{$code}}-multiple">
                        <div class="col">
                            <small>{{$subject['name']}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 px-0">
                <div class="container h-100">
                    @php
                        echo('<div class="row" id="' . $code . '-single">');
                        //Single row view
                        for($i = 0; $i < count($months); $i++){
                            $term = $year . '_' . strtoupper($months[$i]);
                            if(isset($schedule[$code][0]) && array_key_exists($i, $schedule[$code][0])){
                                echo(sprintf($schedule[$code][0][$i], "1"));
                            } else {
                                echo('<div class="col-1 text-center border border-dark pt-3 pb-3">
                                        <a href="#" class="text-primary" onclick="createInstance(\'' . $code . '_' . $term . '\')" data-subject-instance="' . $term . '" data-bs-toggle="modal" data-bs-target="#modal">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>');
                            }
                        }
                        echo('</div>');

                        //multiple row view
                        $creates = [];
                        while(count($creates) < 12){
                            echo('<div class="row collapse" id="' . $code . '-multiple">');
                                for($i = 0; $i < count($months); $i++){
                                    $term = $year . '_' . strtoupper($months[$i]);
                                    if(isset($schedule[$code][0]) && array_key_exists($i, $schedule[$code][0])){
                                        $length = (count($months)-$i > 3) ? 3 : count($months)-$i;
                                        echo(sprintf($schedule[$code][0][$i], $length));
                                        unset($schedule[$code][0][$i]);
                                        $creates[$i] = false;
                                        $i += 2;
                                        $previous = $i;
                                    } elseif (!array_key_exists($i, $creates)) {
                                        $previous = $i;
                                        $creates[$i] = true;
                                        echo('<div class="col-1 text-center border border-dark pt-3 pb-3">
                                                <a class="text-primary" href="#" onclick="createInstance(\'' . $code . '_' . $term . '\')" data-subject-instance="' . $term . '" data-bs-toggle="modal" data-bs-target="#modal">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </div>');
                                    } elseif(!array_key_exists($i+1, $creates)) {
                                        echo('<div class="col-' . $i-($previous ?? -1) . ' bg-disabled border border-dark"></div>');
                                    }
                                }
                                unset($previous);
                            echo('</div>');
                        }
                    @endphp
                </div>
            </div>
        </div>
    @endforeach
</div>
@include('modal.modal')
<script type="text/javascript">
    document.getElementById('publish').addEventListener("click", function () {
        publish();
    });

    function collapse(subjectCode) {
        document.querySelectorAll("[id*=" + subjectCode + "-single]").forEach(function(div) {
            div.classList.remove("collapse");
        });
        document.querySelectorAll("[id*=" + subjectCode + "-multiple]").forEach(function(div) {
            div.classList.add("collapse");
        });
    }

    function expand(subjectCode) {
        document.querySelectorAll("[id*=" + subjectCode + "-single]").forEach(function(div) {
            div.classList.add("collapse");
        });
        document.querySelectorAll("[id*=" + subjectCode + "-multiple]").forEach(function(div) {
            div.classList.remove("collapse");
        });
    }

    function assignLecturer(instanceCode) {
        $('#modal-content').empty();
        $.get("/modal/assignLecturer/" + instanceCode, function (data) {
            $('#modal-content').append(data);
        });
    }

    function createInstance(instanceCode) {
        $('#modal-content').empty();
        $.get("/modal/createInstance/" + instanceCode, function (data) {
            $('#modal-content').append(data);
        });
    }

    function publish() {
        let unassigned = false; //TODO: link to unassigned lecturer Jira issue
        let overload = false; //TODO: link to overloaded lecturer warning jira issue
        let validate = 0;

        if(unassigned || overload){
            validate += (unassigned) ? 1 : 0;
            validate += (overload) ? 2 : 0;
        }

        $('#modal-content').empty();
        $.get("/modal/publish/" + validate, function (data) {
            $('#modal-content').append(data);
        });
    }
</script>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
