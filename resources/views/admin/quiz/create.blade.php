{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'クイズの新規作成'を埋め込む --}}
@section('title', 'クイズの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>クイズ新規作成</h2>
                <form action="{{ route('admin.quiz.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">問題</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="question" rows="8">{{ old('question') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">選択肢1</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="option1" value="{{ old('option1') }}">
                        </div>
                        <label class="col-md-2">選択肢2</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="option2" value="{{ old('option2') }}">
                        </div>
                        <label class="col-md-2">選択肢3</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="option3" value="{{ old('option2') }}">
                        </div>
                        <label class="col-md-2">選択肢4</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="option4" value="{{ old('option4') }}">
                        </div>
                        
                        <div class="form-group row">
                        <label class="col-md-2">解答</label>
                        <div class="col-md-10">
                        <input type="radio" id="option1" name="answer" value="1">
<label for="option1">選択肢1</label><br>

<input type="radio" id="option2" name="answer" value="2">
<label for="option2">選択肢2</label><br>

<input type="radio" id="option3" name="answer" value="3">
<label for="option3">選択肢3</label><br>

<input type="radio" id="option4" name="answer" value="4">
<label for="option4">選択肢4</label><br>
                        </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection