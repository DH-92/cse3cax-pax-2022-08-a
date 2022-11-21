@php
    $title = "Change Password";
@endphp

@include('header')
@include('navigation')




{{--Actual content starts here--}}
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Card</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div id="card-changePassword">
    <div id="card-changePasswordContent">
        <form method="POST" action="{{ route('custom.password') }}">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                      
                            <div class="form-group mb-3">
                                <input id="password" type="password" placeholder="Current Password" class="form-control" name="current_password" autocomplete="current-password">
                             
                            </div>
                        
  
              
                            <div class="form-group mb-3">
                                <input id="new_password" type="password" placeholder="New Password" class="form-control" name="new_password" autocomplete="current-password">
                               
                            </div>
                        
  
              
                            <div class="form-group mb-3">
                                <input id="new_confirm_password" type="password" placeholder="Confirm New Password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                               
                            </div>
                        
                        
                        @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                            @endif
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
  </div>
</body>

</html>
                  
{{--close off any opening tags made in header/navigation--}}
@include('footer')