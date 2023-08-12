@extends('layouts.admin')
@section('title', '登録済みクイズの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>クイズ一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.quiz.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.quiz.index') }}" method="get">
                    <div class="form-group row">
                       
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                   
                            @foreach($quizzes as $quiz)
                            <p>問題: {{$quiz->question}}</p>
    
    <div class="choices">
      <button type="button" onclick="checkAnswer('option1')">選択肢1: {{$quiz->option1}}</button>
      <button type="button" onclick="checkAnswer('option2')">選択肢2: {{$quiz->option2}}</button>
      <button type="button" onclick="checkAnswer('option3')">選択肢3: {{$quiz->option3}}</button>
      @if($quiz->option4)
      <button type="button" onclick="checkAnswer('option4')">選択肢4: {{$quiz->option4}}</button>
      @endif
    </div>
    
    <p id="answer{{$quiz->id}}" style="display: none;">選択肢: {{$quiz->answer}}</p>
    <div>
        <input type="button" value="答え" onclick="toggleElement('answer{{$quiz->id}}')" />
    </div>
                            @endforeach
<script>

function toggleElement(targetId){
	const target = document.getElementById(targetId);

	if(target.style.display=="block"){
		// noneで非表示
		target.style.display ="none";
	}else{
		// blockで表示
		target.style.display ="block";
	}
}
</script>
                        
                </div>
            </div>
        </div>
    </div>
@endsection