@extends('admin.layouts.master')

@section('title')
    {{ __('comments_trans.comment_details') }}
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('comments_trans.comment_details') }} #{{ $comment->id }}</h5>
            <a href="{{ route('comments.index') }}" class="btn btn-light btn-sm">
                <i class="fa fa-arrow-left"></i> {{ __('comments_trans.back') }}
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('comments_trans.name') }}:</strong>
                    <p>{{ $comment->name }}</p>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('comments_trans.email') }}:</strong>
                    <p>{{ $comment->email }}</p>
                </div>
            </div>

            <div class="mb-3">
                <strong>{{ __('comments_trans.comment') }}:</strong>
                <p>{{ $comment->comment }}</p>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>{{ __('comments_trans.rating') }}:</strong>
                    <span class="badge badge-warning">{{ $comment->rating }}/5</span>
                </div>

                <div class="col-md-4">
                    <strong>{{ __('comments_trans.client') }}:</strong>
                    <p>{{ $comment->name ?? '-' }}</p>
                </div>
            </div>

            @if($comment->image)
                <div class="mb-3">
                    <strong>{{ __('comments_trans.image') }}:</strong><br>

                    @php
                        $imageSrc = Illuminate\Support\Str::startsWith($comment->image, ['http://', 'https://'])
                            ? $comment->image
                            : asset('public/' . ltrim($comment->image, '/'));
                    @endphp

                    <img src="{{ $imageSrc }}" width="150" class="img-thumbnail shadow-sm" alt="Comment Image">
                </div>
            @endif

        </div>
    </div>
@endsection
