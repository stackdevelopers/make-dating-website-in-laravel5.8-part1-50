<?php 
use App\User;
use App\Response;
?>
@extends('layouts.frontLayout.front_design')
@section('content')
<style>
.seenResponse{
    font-weight: normal !important;
}
</style>
<div id="right_container">
    <div style="padding:20px 15px 30px 15px;">
        <h1>Responses (<span class="newResponsesCount">{{ Response::newResponsesCount() }}</span>)</h1>
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
        <table id="responses" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Response</th>
                <th>Date/Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($responses as $response)
            <?php
            $sender_name = User::getName($response->sender_id);
            $sender_city = User::getCity($response->sender_id);
            $sender_username = User::getUsername($response->sender_id);
            $encoded_message = encrypt($response->message);
            ?>
            <tr align="center">
                @if($response->seen==0)
                    <?php $bold_response = 'style=font-weight:bold;'; ?>
                @else
                    <?php $bold_response = 'style=font-weight:normal;'; ?>
                @endif 
                <td class="rel1-{{ $response->id }}" {{ $bold_response }}>{{ $sender_name }}</td>
                <td class="rel1-{{ $response->id }}" {{ $bold_response }}>{{ $sender_city }}</td>
                <td class="rel1-{{ $response->id }}" {{ $bold_response }}>{{ substr($response->message,0,15) }}<a title="View Details" href="#responseDetails{{ $response->id }}" data-toggle="modal">...</a></td>
                <td class="rel1-{{ $response->id }}" {{ $bold_response }}>{{ $response->created_at }}</td>
                <td>
                    <a class="updateResponse" rel="{{ $response->id }}" title="View Details" href="#responseDetails{{ $response->id }}" data-toggle="modal"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>&nbsp;
                    <div id="responseDetails{{ $response->id }}" class="modal hide">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <strong>Response Details</strong>
                        </div>
                        <div class="modal-body">
                            <p><?php echo nl2br($response->message); ?></p>
                        </div>
                    </div>
                    <a href="{{ url('contact/'.$sender_username.'?encoded_message='.$encoded_message) }}" target="_blank"><i class="fa fa-reply" aria-hidden="true"></i></a>&nbsp;
                    <a rel="{{ $response->id }}" rel1="delete-response" class="deleteAction" href="javascript:"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="clear"></div>
</div>
@endsection