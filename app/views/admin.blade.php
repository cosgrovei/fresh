@extends('layout.main')

@section('content')
<br>
<br>
<br>
@if(Auth::check())

    <li>{{ HTML::linkRoute('logout', 'Logout (' . Auth::user()->username . ')') }}</li>
@else
    <li>{{ HTML::linkRoute('login', 'Login') }}</li>
@endif
<br>
<br>
<br>
<br>
<br>
@stop