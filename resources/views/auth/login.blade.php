@extends('auth.app')

@section('content')
<div class="form-container">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
               
                    <h1 class="">LogIn to <a href="#"><span class="brand-name">ASSESSMENT</span></a></h1>
                    <p class="signup-link">New Here? <a href="register">Create an account</a></p>
                    <form action="{{ route('login') }}" method="POST" class="text-left">
                        @csrf
                        <div class="form">

                            <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                            </div>

                            {!!($errors->has('email') && $errors->first('email')!='These credentials do not match our records.') ? '<label class="error">'.$errors->first('email').'</label>' : ""!!}
                           
                            {!!($errors->has('email') && $errors->first('email')=='These credentials do not match our records.') ? '<label class="alert alert-danger">'.$errors->first('email').'</label>' : ""!!}
                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input id="password" name="password" type="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
                            </div>
                           
                           {!!($errors->has('password')) ? '<label class="error">'.$errors->first('password').'</label>' : "" !!}
                            
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper toggle-pass">
                                    <p class="d-inline-block">Show Password</p>
                                    <label class="switch s-primary">
                                        <input type="checkbox" id="toggle-password" class="d-none">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                </div>
                                
                            </div>

                            <div class="field-wrapper text-center keep-logged-in">
                                <div class="n-chk new-checkbox checkbox-outline-primary">
                                    <label class="new-control new-checkbox checkbox-outline-primary">
                                      <input type="checkbox" class="new-control-input" name="remember">
                                      <span class="new-control-indicator"></span>Keep me logged in
                                    </label>
                                </div>
                            </div>

                            <div class="field-wrapper">
                            @if (Route::has('password.request'))
                                <a class="forgot-pass-link">Forgot Password?</a>
                            @endif
                            </div>

                        </div>
                    </form>                        
                    <p class="terms-conditions">© 2020 All Rights Reserved. <a href="#">DENONTEK</a>

                </div>                    
            </div>
        </div>
    </div>
    <div class="form-image">
        <div class="l-image">

        </div>
    </div>
</div>
<script> 
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
</script>
@endsection
  