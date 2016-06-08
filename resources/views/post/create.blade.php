@extends('layouts.backend')

@section('title', 'RÀ4M')

@section('content')
<div class="container">
<form class="form-post" method="POST" action="/post/save">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_post_id" value="{{ $post->id }}">
<input type="hidden" name="_post_bg_image" value="{{ $post->image }}">
<input type="hidden" name="_submit"  value="">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tab-texte">Texte</a>
<!--
-->
  </li>
  <li><a data-toggle="tab" href="#tab-img-bg">Image de fond</a>
<!--
-->
  </li>
  <li><a data-toggle="tab" href="#tab-imgs">Images du post</a></li>
</ul>

<div class="publish">
<button type="button" class="btn draft-button btn-primary ember-view">Sauvegarder</button>

@if($post->is_draft)
<button type="button" class="btn publish-button btn-success ember-view">Publier</button>
@endif
</div>

<div class="tab-content">
  <div id="tab-texte" class="tab-pane fade in active">
    <input type="text" name="title" id="post_title" class="form-control" placeholder="Titre du post" value="{{ $post->title }}" />
    <textarea id="post_content" name="content"></textarea>
  </div>
  <div id="tab-img-bg" class="tab-pane fade">
    <label class="control-label">Image de fond</label>
    <input id="input-image-bg" name="image-bg" type="file" class="file-loading"> 
  </div>
  <div id="tab-imgs" class="tab-pane fade">
  </div>
</form>
</div>

<script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<script>
var mysupercontent = "{!! str_replace(array("\r\n", "\n", "\r"), "\\n", addslashes($post->content)) !!}";
var simplemde = new SimpleMDE({
  spellChecker: false,
  autosave: {
    enabled: true,
    unique_id: "post_content",
    delay: 10000
  },
  initialValue: mysupercontent
});
simplemde.value(mysupercontent);
simplemde.render();
</script>
<script src="/js/image-loading.js"></script>
@stop
