@extends('layouts.frontLayout.front_design')
@section('content')
  <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
          <h1>Contact {{ $userDetails->name }}</h1>
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
            <?php
            if(!empty($_GET['encoded_message'])){
              $decoded_message = decrypt($_GET['encoded_message']);
            }
            ?>
            <form action="{{ url('contact/'.$userDetails->username) }}" method="post">{{ csrf_field() }}
              <textarea style="width:330px; height: 140px;" id="message" name="message" required="">
              <?php
                if(!empty($decoded_message)){
                  echo "\n\n\n-------- $userDetails->username wrote:\n";
                  echo $decoded_message;
                }
              ?>  
              </textarea>
              <br>
              <input type="submit" value="Send Message">
            </form>
            <br />
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            <br />
            <div class="clear"></div>
          </div>       
        </div>
      </div>
@endsection