<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        @include('admin.Dashboard.Munchkin.parts.mainNav')
    </div>
    <div class="munchkin-content flex-fill">
        <div class="cards-options">
            <ul>
                <li><a href="/admin/munchkin/cards">Карточки</a></li>
                <li class="active">Добавить</li>
                <li><a href="/admin/munchkin/category"> Категории карт</a></li>
            </ul>
        </div>
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
        @error('card_category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <form action="/admin/munchkin/addCard" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="form-div">
                {{ Form::label('card_category', 'Категория карточки') }}
                {{ Form::select('card_category', $params['categories'])}}
            </div>
            <div class="form-div">
                {{ Form::label('type', 'Категория карточки') }}
                {{ Form::select('type', ['door' => 'Двери', 'treasure' => 'Сокровища'])}}
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
        </form>
    </div>
</div>
