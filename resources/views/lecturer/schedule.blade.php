@php
    $title = "My Schedule";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
@php
    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $year = 2022; //TODO: put into Route for pagination
    $schedule = [];

    foreach ($subjects as $key => $subject){
        $terms = array_keys($subject['instances']);
        $rows = [];

        for($i = 0; $i < count($months); $i++){
            $term = $year . "_" . strtoupper($months[$i]);
            if(in_array($term, $terms)){
                $primary = ($subject['instances'][$term] != Session::get('user')->id) ? '<i class="fa-regular fa-user"></i>' : '<i class="fa-solid fa-user"></i>';
                $rows[0][$i] = '<div class="col-%s h-100 text-center pt-3 pb-2 border border-dark text-truncate" style="background-color:' . ($subject['color'] ?? "white") . '"} >
                <p class="text-dark h5">' . $primary . '</p>
                </div>';
            }
        }
        $schedule[$key] = $rows;
    }
@endphp
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
    @if($subjects != [])
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
                                    echo('<div class="col-1 text-center border border-dark pt-3 pb-3"></div>');
                                }
                            }
                            echo('</div>');

                            //multiple row view
                            while($schedule[$code][0] != []){
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
                                                        <!-- <i class="fa-solid fa-plus"></i> -->
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
    @else
        <div class="mx-0 text-center h5 pb-2 pt-2">There are currently no Subject Instances assigned to you</div>
    @endif
</div>
@include('modal.modal')
<script type="text/javascript">
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
</script>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
