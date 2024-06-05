<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Yap;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Yap $yap){
        // dump(request()->all());
        $comment = new Comment();
        $comment->yap_id = $yap->id;
        $comment->user_id = auth()->id();
        $comment->yap = request()->get('reply');
        $comment->save();
        return redirect()->route('yaps.show', $yap->id)->with('success', "Replied successfully");
    }
}
