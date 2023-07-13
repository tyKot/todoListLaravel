@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}
            </div>
        @endif
        <div class="outer">

            <a href="{{ route('task.add.page') }}" class="btn btn-primary mb-2">Добавить задачу</a>

            <div class="list-group">
                <h2>Задачи</h2>
                @if ($tasks->isEmpty())
                    <h3 class="">Список пуск</h3>
                @else
                    @foreach ($tasks as $task)
                        <div class="list-group-item d-flex flex-row justify-content-between">
                            <div class="list-group-item__title">
                                {{ $task->name }}
                            </div>
                            <div class="list-group-item__description"
                                style="width:50%;
                                       overflow: hidden;
                                       white-space: nowrap;
                                       text-overflow: ellipsis;">
                                {{ $task->description }}
                            </div>
                            <div class="list-group-item__actions">
                                <a class="btn btn-info" href="{{ route('task.view.page', $task->id) }}">Открыть</a>
                                <a class="btn btn-success"
                                    href="{{ route('task.edit.page', $task->id) }}">Редактировать</a>
                                <a class="btn btn-danger" href="{{ route('task.delete', $task->id) }}">Удалить</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
@endsection
