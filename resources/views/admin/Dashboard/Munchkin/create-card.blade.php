<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        @include('admin.Dashboard.Munchkin.parts.mainNav')
    </div>
    <div class="munchkin-content flex-fill">
        <h1> Создание новой карточки </h1>
        @if (isset($params['responce']))
            <div style="color: white; background-color: green;">Данные успешно сохранены!!!</div>
        @endif
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{ Form::model(['url' => '/admin/munchkin/addCard', 'files' => true, 'method' => 'POST']) }}
            <div class="form-div">
                {{ Form::label('card_category', 'Категория карточки') }}
                {{ Form::select('card_category', ['' => 'Нет категории'])}}
            </div>
            <div class="form-div">
                {{ Form::label('title', 'Название карточки') }}
                {{ Form::text('title', old('title')) }}
            </div>
            <div class="form-div">
                {{ Form::label('description', 'Описание карточки:') }}
                {{ Form::text('description', old('description')) }}
            </div>
            <div class="form-div">
                <label> Изображение карточки </label>
                {{ Form::file('image') }}
            </div>
            <div class="form-div">
                {{ Form::label('char', 'Характеристики карточки (Дополнить)') }}
            </div>
            <div class="form-div">
                {{ Form::submit('Создать') }}
            </div>
        {{ Form::close() }}
    </div>
</div>
