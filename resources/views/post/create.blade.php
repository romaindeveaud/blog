@extends('layouts.master')

@section('title', 'Create post')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
new post yay !
    <p>This is my body content.</p>
@stop
