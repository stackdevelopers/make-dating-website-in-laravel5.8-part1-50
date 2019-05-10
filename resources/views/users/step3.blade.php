@extends('layouts.frontLayout.front_design')
@section('content')
<div id="right_container">
    <div style="padding:20px 15px 30px 15px;">
        <h1>My Photos</h1>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif    
        <div> <strong> <br />
            You can upload your multiple photos of your choice.</strong><br />
        </div>
        <div>
            <br />
            <h6 class="inner">Upload Photos</h6>
            <br />
            <form id="photosForm" name="photosForm" action="{{ url('/step/3') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
                <table width="80%" cellpadding="10" cellspacing="10">
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Photos: * </strong></td>
                        <td align="left" valign="top"><input autocomplete="off" id="photo" name="photo[]" type="file" multiple="multiple" style="width:220px; font-size: 14px" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" class="button" value="Submit" /></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="recent_add_prifile">
            <p>&nbsp;</p> 
            @foreach($user_photos as $photo)
              <div class="profile_box first"> <span class="photo"><img src="/images/frontend_images/photos/{{ $photo->photo }}" alt="" /></span>
                <p class="left">Status:</p>
                <p class="right">
                    @if($photo->status==1)
                        Active
                    @else
                        Inactive
                    @endif
                    @if($photo->default_photo == "Yes")
                        (Default)
                    @endif
                </p>
              <p>&nbsp;</p>  
              <table cellspacing="2" cellpadding="2">
              <tr><td>
                <a <?php /* href="/delete-photo/{{ $photo->photo }}" */ ?> rel="{{ $photo->photo }}" rel1="delete-photo"  href="javascript:" class="deleteAction"><button type="button" class="btn btn-danger">Delete</button></a> 
              </td><td>
                @if($photo->default_photo != "Yes")
                    <a href="/default-photo/{{ $photo->photo }}"><button type="button" class="btn btn-danger">Default</button></a>
                @endif
              </td></tr>
              </table>
              </div>

            @endforeach
    </div>
    <div class="clear"></div>
</div>
@endsection