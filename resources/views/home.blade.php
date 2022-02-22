@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">{{ __('Greeting') }}</div>

                <div class="card-body">
                    {{ __('Welcome! '.auth()->user()->name) }}
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header bg-dark text-light">{{ __('Assessments') }}</div>

                <div class="card-body">
                    @forelse($assessments as $assement)
                    <div class="p-3 mb-1 d-flex align-items-center justify-content-between border">
                        <div>
                            <p><strong>Assessment: </strong>{{ __($assement->assessment) }}</p>
                            <p>{{ __($assement->user->name) }}</p>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-success" href="{{ route('assessments.show', $assement->id) }}">View</a>
                        </div>
                    </div>
                    @empty
                    <p class="text-danger">{{ __('No assessments yet') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection