<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
            'rating'  => 'required|integer|min:1|max:5',
            'image'   => 'nullable|string', // URL أو اسم ملف
            'tour_detail_id'  => 'required|exists:tour_details,id',
            'client_id'  => 'required|exists:clients,id',
        ]);

        $comment = Comment::create($data);

        return response()->json([
            'message' => 'Comment added successfully.',
            'data'    => $comment
        ], 201);
    }
}
