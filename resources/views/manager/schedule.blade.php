@php
    $title = "Manage Schedule";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
@php
    //TODO: remove hardcoded data - sample of data required for display
    //Sample of data returned when querying where("year", 2022).where("active", 1)
    $subjects =[
        "CSE1ITX" => [
            "name"=> "Information Technology Fundamentals",
            "active" => 1,//TODO: strikeout/ignore/disable links for inactive subjects
            "instances" => [
                "2022_JAN" => [
                    "version" => 0,
                    "user" => [
                        "id" => 10,
                        "lastName" => "Jacaranda",
                        "color" => "#B4C6E7",
                        "maxLoad" => "1"
                        ],
                    "published" => false,//TODO: disable links for published instances or just confirm with user before saving?
                    "active" => 1],//TODO: probably filter on active
                "2022_FEB" => [
                    "version" => 0,
                    "user" => [
                        "id" => 20,
                        "lastName" => "Beech",
                        "color" => "#F8CBAD",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_MAR" => [
                    "version" => 0,
                    "user" => [
                        "id" => 30,
                        "lastName" => "Cypress",
                        "color" => "#FFE699",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_APR" => [
                    "version" => 0,
                    "user" => [
                        "id" => 10,
                        "lastName" => "Jacaranda",
                        "color" => "#B4C6E7",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_MAY" => [
                    "version" => 0,
                    "user" => null,
                    "published" => false,
                    "active" => 1],
                "2022_JUN" => [
                    "version" => 0,
                    "user" => [
                        "id" => 30,
                        "lastName" => "Cypress",
                        "color" => "#FFE699",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_JUL" => [
                    "version" => 0,
                    "user" => [
                        "id" => 10,
                        "lastName" => "Jacaranda",
                        "color" => "#B4C6E7",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_AUG" => [
                    "version" => 0,
                    "user" => [
                        "id" => 20,
                        "lastName" => "Beech",
                        "color" => "#F8CBAD",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_SEP" => [
                    "version" => 0,
                    "user" => [
                        "id" => 30,
                        "lastName" => "Cypress",
                        "color" => "#FFE699",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_OCT" => [
                    "version" => 0,
                    "user" => [
                        "id" => 10,
                        "lastName" => "Jacaranda",
                        "color" => "#B4C6E7",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1]
            ]
        ],
        "CSE1SDX" => [
            "name"=> "Software Development",
            "active" => 1,
            "instances" => [
                "2022_MAY" => [
                    "version" => 0,
                    "user" => [
                        "id" => 40,
                        "lastName" => "Laurel",
                        "color" => "#a1a1a1",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_AUG" => [
                    "version" => 0,
                    "user" => [
                        "id" => 50,
                        "lastName" => "Maple",
                        "color" => "green",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1],
                "2022_NOV" => [
                    "version" => 0,
                    "user" => [
                        "id" => 40,
                        "lastName" => "Laurel",
                        "color" => "#a1a1a1",
                        "maxLoad" => "1"
                        ],
                    "published" => false,
                    "active" => 1]
            ]
        ]
    ];

    //Below to remain
    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $year = 2022; //TODO: put into Route for pagination
    $schedule = [];

    foreach ($subjects as $key => $subject){
        $terms = array_keys($subject['instances']);
        $rows = [];

        for($i = 0; $i < count($months); $i++){
            $style = null;
            $term = $year . "_" . strtoupper($months[$i]);
            if(in_array($term, $terms)){
                $user = $subject['instances'][$term]['user'];
                $rows[0][$i] = '<div class="col-%s h-100 text-center pt-3 pb-3 border border-dark text-truncate" style="background-color:' . ($user['color'] ?? "black") . '"}>
                <a class="text-primary" href="#" onclick="assignLecturer(\'' . $key . '_' . $term . '\')" data-bs-toggle="modal" data-bs-target="#modal">
                        ' . ($user['lastName'] ?? '<i class="fa-solid fa-triangle-exclamation text-danger"></i> Unassigned') . '
                    </a>
                </div>';
            }
        }
        $schedule[$key] = $rows;
    }
@endphp
<div class="col-1 offset-7 text-center">
<button id="import" type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modal">
    Import
</button>
</div>
<div class="container-fluid border border-dark">
    <div class="row">
        <div class="col-2 bg-didasko text-center border border-dark pt-2 pb-1">
            <h5 class="text-light font-weight-bold">Subject</h5>
        </div>
        <div class="col-10 px-0">
            <div class="container">
                <div class="row">
                    @foreach($months as $month)
                        <div class="col bg-didasko text-center border border-dark pt-2 pb-1">
                            <h5 class="text-light font-weight-bold">{{ $month }}</h5>
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
                        <div class="col-9  pt-2 pb-2">
                            <a href="#" class="h5 text-primary">
                                {{$code}}
                            </a>
                        </div>
                        <div class="col-3">
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
                        </div>
                    </div>
                    <div class="row collapse" id="{{$code}}-multiple">
                        <div class="col">
                            {{$subject['name']}}
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
                            if(array_key_exists($i, $schedule[$code][0])){
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
                                    if(array_key_exists($i, $schedule[$code][0])){
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
    document.getElementById('import').addEventListener("click", function () {
        importCSV();
    });

    document.getElementById('expand').addEventListener("click", function () {
        assignLecturer($(this).data('subject-instance'));
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

    function importCSV() {
        $('#modal-content').empty();
        $.get("/modal/import", function (data) {
            $('#modal-content').append(data);
        });
    }
</script>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
