@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <img src="{{ asset('images/welcome.jpg') }}" width="40%" alt="">
        <div class="col-md-8 text-center">
            <h1>Peer Assessment Website</h1>
            <h4 class="py-3">Taking Student Team Collaboration to a New Level</h4>
            <p>This website is peer assessment done right: it automates the peer assessment process, making it easier to hold more frequent peer assessments that return real feedback to students so they can improve their team skills. Prepare a peer assessment for your entire class in under 5 minutes. Then PeerAssessment.Com takes care of the rest; collecting and distributing the feedback to students, plus preparing a grading sheet for you.</p>
        </div>
    </div>
</div>
@endsection