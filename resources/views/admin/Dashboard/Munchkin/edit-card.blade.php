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

        <form action="/admin/munchkin/editCard/{{$params['id']}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="form-div">
                {{ Form::label('card_category', 'Категория карточки') }}
                {{ Form::select('card_category', ['' => 'Нет категории'])}}
            </div>
            <div class="form-div">
                {{ Form::label('title', 'Название карточки') }}
                {{ Form::text('title', $params['info'][0]['title']) }}
            </div>
            <div class="form-div">
                {{ Form::label('description', 'Описание карточки:') }}
                {{ Form::text('description', $params['info'][0]['description']) }}
            </div>
            <div class="form-div">
                <label> Изображение карточки </label>
                @if (isset($params['info'][0]['image']) && $params['info'][0]['image'])
                    <div style="height: 200px;">
                        <img class="f-height" src="{{URL::asset("images/manchkin/cards/".$params['info'][0]['image'])}}">
                    </div>
                @endif
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
