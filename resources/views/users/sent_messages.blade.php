<?php use App\User; ?>
@extends('layouts.frontLayout.front_design')
@section('content')
<div id="right_container">
    <div style="padding:20px 15px 30px 15px;">
        <h1>Sent Messages</h1>
        <table id="responses" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Response</th>
                <th>Date/Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sent_msg as $msg)
            <?php
            $receiver_name = User::getName($msg->receiver_id);
            $receiver_city = User::getCity($msg->receiver_id);
            ?>
            <tr align="center">
                <td>{{ $receiver_name }}</td>
                <td>{{ $receiver_city }}</td>
                <td>{{ $msg->message }}</td>
                <td>{{ $msg->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="clear"></div>
</div>
@endsection