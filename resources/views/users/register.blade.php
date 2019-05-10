@extends('layouts.frontLayout.front_design')
@section('content')
  <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
          <h1>New User Registeration</h1>
          <div> <strong> <br />
            Register for free by filling out the form below:- </strong><br />
             </div>
          <div> <br />
            <h6 class="inner">Register</h6>
            <br />
            <form id="signupForm" action="{{ url('/register') }}" method="post">{{ csrf_field() }}
              <table width="80%">
                <tr>
                  <td align="left" valign="top" class="body"><strong> Username: </strong></td>
                  <td align="left" valign="top"><input id="username" name="username" type="text" size="22" /></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="body"><strong> Email: </strong></td>
                  <td align="left" valign="top"><input id="user_email" name="email" type="text" size="22" /></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="body"><strong> Password: </strong></td>
                  <td align="left" valign="top"><input id="user_password" name="password" type="password" size="22" /><span id="passstrength"></span></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="body"><strong> Confirm Password: </strong></td>
                  <td align="left" valign="top"><input id="confirm_password" name="confirm_password" type="password" size="22" /></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="body"><strong>Name:</strong></td>
                  <td align="left" valign="top"><input id="name" name="name" type="text" size="22" /></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="body"><strong>Please agree to our policy:</strong></td>
                  <td align="left" valign="top"><input type="checkbox" class="checkbox" id="agree" name="agree"></td>
                </tr>
                <!-- <tr>
                  <td align="left" valign="top" class="body"><strong>Captcha:</strong></td>
                  <td align="left" valign="top">{!! app('captcha')->display() !!}

                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif</td>
                </tr> -->
                <tr>
                  <td></td>
                  <td><input type="submit" name="submit" class="button" value="Register Now" /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <div class="clear"></div>
      </div>
@endsection