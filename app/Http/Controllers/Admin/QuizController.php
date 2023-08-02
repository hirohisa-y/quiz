<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quiz;

class QuizController extends Controller
{
    //
     public function add()
    {
        return view('admin.quiz.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Quiz::$rules);

        $quiz = new Quiz;
        $form = $request->all();

       

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        

        // データベースに保存する
        $quiz->fill($form);
        $quiz->save();
        return redirect('admin/quiz/create');
    }

    public function edit()
    {
        return view('admin.quiz.edit');
    }

    public function update()
    {
        return redirect('admin/quiz/edit');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $quizzes = Quiz::where('question', $cond_title)->get();
        } else {
            // それ以外はすべてのクイズを取得する
            $quizzes = Quiz::all();
        }
        return view('admin.quiz.index', ['quizzes' => $quizzes, 'cond_title' => $cond_title]);
    }
}