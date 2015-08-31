<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Post extends Model {

  public function getAuthor() {
    $author = User::query()->findOrFail($this->author_id);
    return $author;
  }
}
