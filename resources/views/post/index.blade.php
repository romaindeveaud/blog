@extends('layouts.master')

@section('title', $post->title)
@section('bgimg', '/img/'.$post->image) <!-- change with a post image -->

@section('content')
  <article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    {{ $post->content }}
</div></div>
  </div>
  </article>
@stop
