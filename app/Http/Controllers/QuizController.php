<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;

class QuizController extends Controller
{
    public function index(Request $request)
    {
    $posts = Quiz::all()->sortByDesc('updated_at');
    
    if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('quiz.index', ['headline' => $headline, 'posts' => $posts]);
    }
    //
}
