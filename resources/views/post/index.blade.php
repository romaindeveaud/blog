@extends('layouts.master')

@section('title', $post->title . ' &mdash; RÀ4M.')
@section('main_title', $post->title)
@section('bgimg', '/img/'.$post->image) <!-- change with a post image -->

@section('content')
  <article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="post-content">
          {{ $post->content }}
        </div>
          <div style="float: right; font-size: 16px;">
            &mdash; {{ $post->author->name }}
            <span class="avatar-box avt-sm">
               <img src="/img/{{ $post->author->avatar }}" alt="{{ $post->author->name }}" title="{{ $post->author->name }}" />
            </span>
          </div>
      </div></div>
  </div>
  </article>
<script src="//cdn.jsdelivr.net/marked/latest/marked.min.js"></script>
<script>
  $('.post-content').replaceWith(marked($('.post-content').text()));
</script>
@stop
