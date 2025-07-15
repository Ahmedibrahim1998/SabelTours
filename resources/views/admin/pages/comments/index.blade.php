@extends('admin.layouts.master')

@section('title')
    {{ __('comments_trans.comments') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ __('comments_trans.comments') }}</h4>
            <a href="#" class="btn btn-secondary mb-3 disabled">{{ trans('books_trans.add_disabled') }}</a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('comments_trans.name') }}</th>
                        <th>{{ __('comments_trans.email') }}</th>
                        <th>{{ __('comments_trans.comment') }}</th>
                        <th>{{ __('comments_trans.rating') }}</th>
                        <th>{{ __('comments_trans.tour_detail') }}</th>
                        <th>{{ __('comments_trans.client') }}</th>
                        <th>{{ __('comments_trans.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ Str::limit($comment->comment, 50) }}</td>
                            <td>{{ $comment->rating }} / 5</td>
                            <td>{{ optional(optional($comment->details)->tour)->getLocalizedName(app()->getLocale()) ?? '-' }}</td>
                            <td>
                                {{ $comment->name ?? '-'}}
                            </td>
                            <td>
                               
                                <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('{{ trans('$comments_trans.confirm_delete') }}')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">{{ __('comments_trans.no_comments_trans_found') ?? 'No comments_trans found.' }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
