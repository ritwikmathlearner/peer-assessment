@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header bg-dark text-light">{{ __('Assessment') }}</div>

                <div class="card-body">
                    <p><strong>Assessment: </strong>{{ $assessment->assessment }}</p>
                    <p><strong>Uploaded by: </strong>{{ $assessment->user->name }}</p>
                    <p><strong>Download File: </strong></p>
                    <p><a href="{{ route('assessments.download', $assessment->id) }}">{{ $assessment->filename }}</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header bg-dark text-light">{{ __('Comments') }}</div>

                <div class="card-body">
                    <form class="form-inline mb-5" action="{{ route('comments.save') }}" method="POST">
                        @csrf
                        <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                        <div class="form-group w-75 mx-sm-3 mb-2">
                            <label for="comment" class="sr-only">Comment</label>
                            <input type="text" name="comment" class="form-control w-100" id="comment" placeholder="Comment">
                            @if($errors->get('comment'))
                                <small class="text-danger">{{$errors->first('comment')}}</small>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Save</button>
                    </form>
                    <div>
                        <ul>
                            @forelse ($assessment->comments as $comment)
                                <li>{{ $comment->comment }} <small class="text-info">({{ $comment->user->name }})</small></li>
                            @empty
                                <p class="text-danger">No Comments Yet</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection