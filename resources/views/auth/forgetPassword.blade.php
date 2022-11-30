@php
    $title = "Reset Password Link";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
    <div id="card-changePassword">
        <div id="card-changePasswordContent">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                        <div class="form-group mb-3">
                            <input id="email_address" type="text" placeholder="Email Address" class="form-control" name="email" autocomplete="email">
                        </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif    
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Reset Password Link
                                </button>
                            </div>
                        </div>
                </form>               
        </div>
    </div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')


