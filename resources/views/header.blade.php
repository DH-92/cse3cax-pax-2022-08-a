@php


    //TODO: Temporary hardcode - change when implementing login/authorization (CA2-41)
    use Illuminate\Support\Facades\Request;$title = isset($title) ? " :: " . $title : "";
    $permission = 0;
    if (Request::is('lecturer/*')) {
        $permission = 1;
    } else if (Request::is('manager/*')) {
        $permission = 2;
    } else if (Request::is('admin/*') || Request::is('admin')) {
        $permission = 3;
    }
    Session::put('permission', $permission);
@endphp

    <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css"/>
    <title>Didasko Staff Scheduler{{$title}}</title>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/7fd83a0b84.js" crossorigin="anonymous"></script>
<div class="row flex-nowrap">
