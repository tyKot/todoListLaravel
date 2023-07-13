@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добавить</h2>
        <div class="form_block">
            <form class="row g-3" action="{{ route('task.add') }}" method="post">
                @csrf
                <div class="mb-2">
                    <label for="formControlInput" class="form-label">Название</label>
                    <input type="text" class="form-control" id="formControlInput" name="task_name"
                        placeholder="Введите название задания">
                </div>
                <div class="mb-2">
                    <label for="formControlTextarea" class="form-label">Описание</label>
                    <textarea class="form-control" id="formControlTextarea" rows="3" name="task_description"
                        placeholder="Введите описание задания"></textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
