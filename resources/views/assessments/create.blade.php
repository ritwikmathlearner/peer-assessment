@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('assessments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Select Assessment</label>
                <select name="assessment" id="assessment" class="form-control">
                    <option value="">Select an Assessment</option>
                    <option value="CS345">CS345</option>
                    <option value="CS560">CS560</option>
                    <option value="CS675">CS675</option>
                </select>
                @if($errors->get('assessment'))
                    <small class="text-danger">{{$errors->first('assessment')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="file">Upload Your Assessment</label>
                <input type="file" name="file" class="form-control-file" id="file">
                @if($errors->get('file'))
                    <small class="text-danger">{{$errors->first('file')}}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection