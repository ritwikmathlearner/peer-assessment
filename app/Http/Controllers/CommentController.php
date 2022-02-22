<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string'
        ]);

        if($validator->fails()) return back()->withErrors($validator);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'assessment_id' => $request->assessment_id
        ]);

        return redirect()->route('assessments.show', $request->assessment_id);
    }
}
