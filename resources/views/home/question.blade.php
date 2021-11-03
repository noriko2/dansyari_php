@extends('layouts.both')

@section('content')

<div class="top-visual">
    <div class="container top-visual-inner">
        <div id="question">
            <p>{{ $question_message }}</p>

            <div id="question__btn">
                <!--Yes-->
                <div class="yes-btn btn-blu">
                    @if ( $question_number === 0 )
                    <a href="{{ route('question', ['id' => $item_number, 'result_message_number' => 1]) }}">Yes</a>
                    @elseif ( $question_number === 1 )
                    <a href="{{ route('question', ['id' => $item_number, 'result_message_number' => 2]) }}">Yes</a>
                    @else
                    <a href="{{ route('question', ['id' => $item_number, 'result_message_number' => 3]) }}">Yes</a>
                    @endif
                </div>

                <!--No-->
                <div class="no-btn btn-blu">
                    @if ( $question_number === 0 )
                    <a href="{{ route('question', ['id' => $item_number, 'question_number' => 1]) }}">No</a>
                    @elseif ( $question_number === 1 )
                    <a href="{{ route('question', ['id' => $item_number, 'question_number' => 2]) }}">No</a>
                    @else
                    <a href="{{ route('question', ['id' => $item_number, 'question_number' => 3]) }}">No</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
