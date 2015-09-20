<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller {

  public function index (Request $request) {
    $posts = Post::query()->where('is_draft', 'false')
                          ->orderBy('created_at','desc')
                          ->get()->all();

    foreach($posts as $post)
      $post->author = $post->getAuthor();

    return view('dashboard.index', ['posts' => $posts]);
  }
}
