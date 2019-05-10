@extends('layouts.frontLayout.front_design')
@section('content')
  <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
          <h1>{{ $userDetails->name }}</h1>
          @foreach($userDetails->photos as $key => $photo)
            @if($photo->default_photo == "Yes")
              <?php $user_photo = $userDetails->photos[$key]->photo; ?>
            @else
              <?php $user_photo = $userDetails->photos[0]->photo; ?>
            @endif
          @endforeach
          <div>
            @if(!empty($user_photo))
              <img src="{{ asset('images/frontend_images/photos/'.$user_photo) }}" alt="" width="210" class="aboutus-img" />
            @else
              <img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" width="210" class="aboutus-img" />
            @endif  
            <strong>Profile ID:</strong> {{ $userDetails->username }}<br>
            <strong>Name:</strong> {{ $userDetails->name }}<br>
            <strong>Gender:</strong> {{ $userDetails->details->gender }}<br>
            <strong>Marital Status:</strong> {{ $userDetails->details->marital_status }}<br>
            <strong>Age:</strong> <?php
                      echo $diff = date('Y') - date('Y',strtotime($userDetails->details->dob)); 
                    ?> Yrs.<br>
            <strong>Height:</strong> {{ $userDetails->details->height }}<br>
            <strong>Body Type:</strong> {{ $userDetails->details->body_type }}<br>
            <strong>Complexion:</strong> {{ $userDetails->details->complexion }}<br>
            <strong>Languages:</strong> {{ $userDetails->details->languages }}<br>
            <strong>Hobbies:</strong> {{ $userDetails->details->hobbies }}<br>
            <strong>City:</strong> {{ $userDetails->details->city }}<br>
            <strong>State:</strong> {{ $userDetails->details->state }}<br>
            <strong>Country:</strong> {{ $userDetails->details->country }}<br>
            <strong style="float:right;">
              <script type="text/javascript">
                  var viewer = new PhotoViewer();
                  @foreach($userDetails->photos as $key => $photo)
                    viewer.add('/images/frontend_images/photos/<?php echo $userDetails->photos[$key]->photo ?>');
                  @endforeach
              </script>
                <a href="javascript:void(viewer.show(0))">Photo Album</a>
            </strong><br>
            <strong style="float:right;">
              <a href="{{ url('/contact/'.$userDetails->username) }}" style="color: red"><i class="fa fa-comment" aria-hidden="true" style="color: red"></i>&nbsp;Contact Profile</a>
            </strong>
            <br />
            <br />
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div>
            <h6 class="inner">Education & Career</h6>
            <div>
              <strong>Highest Education:</strong> {{ $userDetails->details->hobbies }}<br>
              <strong>Occupation:</strong> {{ $userDetails->details->hobbies }}<br>
              <strong>Income:</strong> {{ $userDetails->details->hobbies }}<br>
            </div>
          </div>
          <div class="clear"></div>
          <div class="aboutcolumnzone">
            <div class="aboutcolumn1">
              <div>
                <h5 class="inner">About Myself</h5>
                <div>{{ $userDetails->details->about_myself }}</div>
              </div>
            </div>
            <div class="aboutcolumn2">
              <div>
                <h5 class="inner">About My Preferred Partner</h5>
                <div>{{ $userDetails->details->about_partner }}</div>
              </div>
            </div>
          </div>         
        </div>
      </div>
@endsection