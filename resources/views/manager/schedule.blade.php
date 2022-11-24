@php
    $title = "Manage Schedule";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
@php
    //TODO: remove hardcoded data - sample of data required for display
    $lecturers = [
        0 => [
            "lastName" => "Acacia",
            "id" => 10,
            "color" => "yellow"],
        1 => [
            "lastName" => "Beech",
            "id" => 20,
            "color" => "green"],
        2 => [
            "lastName" => "Cypress",
            "id" => 30,
            "color" => "red"
        ]
    ];

    //Sample of data returned when querying where("year", 2022).where("active", 1)
    $data =[
        "subjects" => [
            0 => [//TODO: Could also change this to use the code as the subjectIndex
                "code" => "CSE1ITX",
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
            ]
        ]
    ];

    //Below to remain
    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $year = 2022; //TODO: put into Route for pagination

@endphp
<div class="col-1 offset-7 text-center">
<button id="import" type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modal">
    Import
</button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 bg-didasko text-center">
            <h6 class="text-light font-weight-bold">Subject</h6>
        </div>
        <div class="col-10 px-0">
            <div class="container">
                <div class="row">
                    @foreach($months as $month)
                        <div class="col bg-didasko text-center">
                            <h6 class="text-light font-weight-bold">{{ $month }}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @foreach ($data['subjects'] as $term => $subject)
        @php
            $terms = array_keys($subject['instances']);
        @endphp
        <div class="row">
            <div class="col-2 px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-9"><a href="#" class="h5">{{$subject['code']}}</a></div>
                        <div class="col-3 text-center">
                            <a href="#" id="expand" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline">+</span>
                            </a>
                            <a href="#" id="collapse" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline">-</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">{{$subject['name']}}</div>
                    </div>
                </div>
            </div>
            <div class="col-10 px-0">
                <div class="container h-100" id="{{$subject['code']}}-single">
                    <div class="row h-100">
                        @foreach($months as $month)
                            @php
                                $function = "createInstance";
                                $style = null;
                                $value = "+";

                                $term = $year . "_" . strtoupper($month);
                                $row1 = 0;
                                $row2 = 0;
                                if(in_array($term, $terms)){
                                    $user = $subject['instances'][$term]['user'];
                                    //TODO: pass assigned lecturer through to modal.assignedLecturer (for preselection in drop-down)
                                    $function = "assignLecturer";
                                    $style = ($user != null) ? "background-color: " . $user['color'] : "background-color: black; border: 3px red solid";
                                    $value = ($user != null) ? $user['lastName'] : "Unassigned";
                                }
                            @endphp
                            <div class="col-1 h-100 text-center" style="{{$style}}"}>
                                <a href="#" onclick="{{ $function }}('{{ $subject['code'] }}_{{ $term }}')" data-subject-instance="{{ $term }}" data-bs-toggle="modal" data-bs-target="#modal">
                                    {{ $value }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

<script type="text/javascript">
    document.getElementById('import').addEventListener("click", function () {
        importCSV();
    });

    document.getElementById('expand').addEventListener("click", function () {
        assignLecturer($(this).data('subject-instance'));
    });

    function expand(subjectCode) {
        $('#modal-content').empty();
        $.get("/modal/assignLecturer/" + instanceCode, function (data) {
            $('#modal-content').append(data);
        });
    }

    function collapse(subjectCode) {
        $('#modal-content').empty();
        $.get("/modal/assignLecturer/" + instanceCode, function (data) {
            $('#modal-content').append(data);
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
@include('modal.modal')
{{--close off any opening tags made in header/navigation--}}
@include('footer')
