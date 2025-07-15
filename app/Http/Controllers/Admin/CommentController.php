<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Comment;
use App\Models\TourDetail;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('client', 'details')->latest()->get();
        return view('admin.pages.comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::with('client', 'details')->findOrFail($id);
        return view('admin.pages.comments.show', compact('comment'));
    }

    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->image && file_exists(public_path($comment->image))) {
            unlink(public_path($comment->image));
        }

        $comment->delete();
        return redirect()->route('comments.index')->with('success', __('messages.Delete'));
    }
}
