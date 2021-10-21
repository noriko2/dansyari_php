@extends('layouts.app')

@section('content')
<div class="top-visual top-visual-home">
    <div class="container top-visual-inner">
        <div class="top-visual__1">
            <img src="/images/robot.png" id="top-visual-home__img" alt="断捨離できるくん">
        </div>
        <div class="top-visual__2 top-visual-home__2">
            <p>ボクに任せて !</p>
            <p>質問に答えるだけで<br>カンタンに断捨離できるよ</p>
            <a href="#jump-question" class="btn btn-primary start-btn">さっそく始める</a>
        </div>
    </div>
</div>

<hr>
<div class="container question">
    <h2><a id="jump-question">断捨離したいものは？</a></h2>
    <div class="question__items">
        @foreach($items as $i => $item)
        <div class="question__item btn-blu">
            <p><a href="{{ route('question', ['id' => $i, 'question_number' => 0]) }}">{{$item}}</a></p>
        </div>
        @endforeach
    </div>
</div>

@endsection
