<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        try {
            // التحقق من البيانات يدويًا بدل استخدام validate
            $data = $request->all();

            // التحقق من الحقول المطلوبة
            if (empty($data['name']) || !is_string($data['name']) || strlen($data['name']) > 255) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['name' => 'Please provide a valid name (max 255 characters).'],
                ], 422);
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['email' => 'Please provide a valid email.'],
                ], 422);
            }

            if (empty($data['comment']) || !is_string($data['comment']) || strlen($data['comment']) > 1000) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['comment' => 'Please provide a valid comment (max 1000 characters).'],
                ], 422);
            }

            if (empty($data['rating']) || !is_int($data['rating']) || $data['rating'] < 1 || $data['rating'] > 5) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['rating' => 'Rating must be a number between 1 and 5.'],
                ], 422);
            }

            if (!empty($data['image']) && (!is_string($data['image']) || !filter_var($data['image'], FILTER_VALIDATE_URL))) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['image' => 'Image must be a valid URL.'],
                ], 422);
            }

            if (empty($data['tour_detail_id']) || !\App\Models\TourDetail::find($data['tour_detail_id'])) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['tour_detail_id' => 'Invalid tour detail ID.'],
                ], 422);
            }

            if (empty($data['client_id']) || !\App\Models\Client::find($data['client_id'])) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => ['client_id' => 'Invalid client ID.'],
                ], 422);
            }

            $comment = Comment::create($data);

            return response()->json([
                'message' => 'Comment added successfully.',
                'data' => $comment,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while adding the comment.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
