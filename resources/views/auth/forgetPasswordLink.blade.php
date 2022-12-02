@php
    $title = "Change Password";
@endphp

@include('header')
@include('navigation')

{{--Actual content starts here--}}
<div id="card-changePassword">
    <div id="card-changePasswordContent">
        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group mb-3">
                        <input id="email_address" type="text" placeholder="Email Address" class="form-control" name="email" autocomplete="email">
                    </div>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    <div class="form-group mb-3">
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" autocomplete="password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="form-group mb-3">
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" autocomplete="password">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </div>

        </form>
    </div>
</div>
      
{{--close off any opening tags made in header/navigation--}}
@include('footer')
