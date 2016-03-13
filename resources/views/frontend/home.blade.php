@extends('frontend.layouts.master')

@section('content')
    <div id="title" style="text-align: center;">
        <h1>Learn Laravel 5</h1>
        <div style="padding: 5px; font-size: 16px;">{{ Inspiring::quote() }}</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            <li style="margin: 50px 0;">
                <div class="title">
                    <a href="javascript:;">
                        <h4>Home</h4>
                    </a>
                </div>
                <div class="body">
                    <p>Welcome</p>
                </div>
            </li>
        </ul>
    </div>
@endsection
