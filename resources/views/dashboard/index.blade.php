@extends('layouts.backend')

@section('title', 'RÀ4M - Tableau de bord')

<?php setlocale(LC_TIME, 'fr_FR'); ?> 

@section('content')
<div class="container">
  <ul class="list-group post-list">
    @foreach($posts as $post)
    <li class="list-group-item post-item clearfix">
      <span class="post-title">{{ $post->title }}</span>
      <span class="avatar-box avt-sm">
         <img src="/img/{{ $post->author->avatar }}" alt="{{ $post->author->name }}" title="{{ $post->author->name }}" />
      </span>
        @if($post->is_draft)
          <span class="label label-info">Brouillon</span>
        @else
          <span class="label label-success">Publié</span>
        @endif
      <div style="float:right">
        <span>
        Créé le {{ strftime('%d/%m/%Y',strtotime($post->created_at))  }}
        </span>
        <span>
        Vues :  <span class="badge"> {{ $post->count_read }}</span>
        </span>
        <span>
        <a href="/post/{{ $post->id }}">Voir<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
        </span>
        <span>
        <a href="/post/edit/{{ $post->id }}">Modifier<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        </span>
        <span>
        <a href="#" role="button" data-href="/post/delete/{{ $post->id }}" data-placement="left" data-toggle="confirmation" class="btn btn-sm btn-danger">Supprimer<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        </span>
      </div>
      <div class="post-content" style="display:none;">
        <div>
        {{ $post->content }}
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>
<script src="/js/bootstrap-tooltip.js"></script>
<script src="/js/bootstrap-confirmation.js"></script>
<script>
$('[data-toggle="confirmation"]').confirmation({
    title: "Sûr(e)?",
    btnOkLabel: "Oui",
    btnCancelLabel: "Non"
});
/*
$('#finish').confirmation({  href:"intro.html",
                                 onConfirm: function() {

        if(current_event_edit == true)
          $('#save_event').click();

        sendAllEvents(); 
      }
    });
 */
</script>
@stop
