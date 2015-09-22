@extends('layouts.master')

@section('title', 'Reboot à 4 mains.')
@section('main_title', 'Reboot à 4 mains.')
@section('bgimg', '/img/outdoor-bg.jpg')

<?php setlocale(LC_TIME, 'fr_FR'); ?>

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
         @foreach($posts as $post)
        <div class="post-preview">
          <a href="/post/{{ $post->urlified_title }}">
            <h2 class="title">
              {{ $post->title }}
            </h2>
          </a>
          <p class="post-meta"><a href="#">{{ $post->author->name }}</a>, le {{ strftime('%e %B %Y',strtotime($post->created_at))  }}</p>
        </div>
         @endforeach
                <hr>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">J'en veux encore! &rarr;</a>
                    </li>
                </ul>
      </div>
    </div>
  </div>
@stop
