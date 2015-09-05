@extends('layouts.backend')

@section('title', 'RÀ4M - Nouveau post')

@section('content')
<div class="container">
<form class="form-post" method="POST" action="/create-post">
  <input type="text" name="title" id="post_title" class="form-control" placeholder="Titre du post" />
  <textarea id="post_content" name="content"></textarea>
</form>
</div>

<script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<script>
var simplemde = new SimpleMDE({
  spellChecker: false,
  autosave: {
    enabled: true,
    unique_id: "post_content",
    delay: 60000
  },
  initialValue: "# Intro\n" +
  "Go ahead, play around with the editor! Be sure to check out **bold** and *italic* styling, or even [links](http://google.com). You can type the Markdown syntax, use the toolbar, or use shortcuts like `cmd-b` or `ctrl-b`.\n\n" +
  "# Lists\n" +
  "Unordered lists can be started using the toolbar or by typing `* `, `- `, or `+ `. Ordered lists can be started by typing `1. `.\n\n" +
  "#### Unordered\n" +
  "* Lists are a piece of cake\n" +
  "* They even auto continue as you type\n" +
  "* A double enter will end them\n" +
  "* Tabs and shift-tabs work too\n\n" +
  "#### Ordered\n" +
  "1. Numbered lists...\n" +
  "2. ...work too!\n\n" +
  "## What about images?\n" +
  "![Yes](http://i.imgur.com/sZlktY7.png)"

});
simplemde.render();
</script>
@stop
