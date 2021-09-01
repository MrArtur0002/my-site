<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        <ul>
            <li><a href="/admin/munchkin"> Главная</a></li>
            <li><a href="/admin/munchkin/card"> Карточки</a></li>
            <li><a href="#"> Игроки</a></li>
            <li><a href="#"> Режимы игры</a></li>
        </ul>
    </div>
    <div class="munchkin-content flex-fill">
        <h1> Создание новой карточки </h1>
        {{ Form::model(['url' => 'admin']) }}
            <div class="form-div">
                {{ Form::label('card_category', 'Категория карточки') }}
                {{ Form::select('card_category', ['' => 'Нет категории'])}}
            </div>
            <div class="form-div">
                {{ Form::label('name', 'Название карточки') }}
                {{ Form::text('name') }}
            </div>
            <div class="form-div">
                <label> Изображение карточки </label>
                <input type="file" name="image_card" accept="image/*,image/jpeg">
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
