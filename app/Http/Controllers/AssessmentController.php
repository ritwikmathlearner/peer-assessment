<?php

namespace App\Http\Controllers;

use App\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::orderBy('created_at', 'desc')->get();
        return view('home', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assessments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'assessment' => 'required|string',
            'file' => 'required|file'
        ]);

        if($validator->fails()) return back()->withErrors($validator);

        if($request->hasFile('file')) {
            $fileName = $request->file->getClientOriginalName();
            $request->file->storeAs('assessments', $fileName);
        }

        Assessment::create([
            'assessment' => $request->assessment,
            'filename' => $fileName,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('assessments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment)
    {
        return view('assessments.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }

    public function download(Assessment $assessment)
    {
        $pathToFile = storage_path('app/assessments/' . $assessment->filename);

        return response()->download($pathToFile);
    }
}
