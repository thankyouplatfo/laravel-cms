<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Comment;

class CommentComposer
{
    protected $comments;
    //
    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }
    //
    public function compose(View $view)
    {
        # code...
        return $view->with('return_latest_comments', $this->comments->take(5)->latest()->get());
    }
}
