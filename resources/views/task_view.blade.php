@extends('layouts.app')


@section('content')
    <div class="container">
        Задание:
        <h3>{{ $task->name }}</h3>
        Описание:
        <h3>{{ $task->description }}</h3>
        Когда было создано:
        <h3>{{ $task->created_at }}</h3>
    </div>
@endsection
