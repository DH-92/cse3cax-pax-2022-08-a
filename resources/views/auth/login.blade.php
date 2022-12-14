@php
    $title = "Login";
@endphp

@include('header')
{{--Actual content starts here--}}
<div id="card">
    <div id="card-content">
        <div id="card-title">
            <img src="{{ URL::asset('images/La-Trobe-Didasko_A_HD.jpg ') }}" class="text-center img-fluid d-block mx-auto"  title="Didasko Scheduler" alt="Didasko Scheduler">
        </div>
        <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="email" id="email" class="form-control" name="email" pattern="^[a-zA-Z0-9._%+-]+@ltu\.edu\.au" placeholder="Email - email@ltu.edu.au"  title="Please make sure that your email matches the following pattern 'name@ltu.edu.au'" required autofocus />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="checkbox" >
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <a href="{{ route('forget.password.get') }}">Reset Password</a>
                                      </label>
                                  </div>
                              </div>
                          </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-primary rounded-pill btn-lg">Sign in</button>
            </div>
        </form>
    </div>
</div>
{{--close off any opening tags made in header/navigation--}}
@include('footer')
