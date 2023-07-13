@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Редактировать</h2>
        <div class="form_block">
            <form class="row g-3" action="{{ route('task.edit') }}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $task_edit->id }}">
                <div class="mb-2">
                    <label for="formControlInput" class="form-label">Название</label>
                    <input type="text" class="form-control" id="formControlInput" name="task_name"
                        value="{{ $task_edit->name }}" placeholder="Введите название задания">
                </div>
                <div class="mb-2">
                    <label for="formControlTextarea" class="form-label">Описание</label>
                    <textarea class="form-control" id="formControlTextarea" rows="3" name="task_description"
                        placeholder="Введите описание задания">{{ $task_edit->description }}</textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-3">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
