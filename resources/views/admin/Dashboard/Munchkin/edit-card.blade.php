<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        @include('admin.Dashboard.Munchkin.parts.mainNav')
    </div>
    <div class="munchkin-content flex-fill">
        <h1> Изменение карточки </h1>
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

        <form action="/admin/munchkin/editCard/{{$params['id']}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="form-div">
                {{ Form::label('card_category', 'Категория карточки') }}
                <select id="card_category" name="card_category">
                    @foreach ($params['categories'] as $key => $category)
                        @if ($key == $params['info'][0]['category_id'])
                            <option selected="selected"  value="{{$key}}">{{$category}}</option>
                        @else
                            <option value="{{$key}}">{{$category}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-div">
                {{ Form::label('type', 'Категория карточки') }}
                <select id="type" name="type">
                    @if ('treasure' == $params['info'][0]['type'])
                        <option value="door">Двери</option>
                        <option selected="selected" value="treasure">Сокровища</option>
                    @else
                        <option selected="selected" value="door">Двери</option>
                        <option value="treasure">Сокровища</option>
                    @endif
                </select>
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
                {{ Form::submit('Изменить') }}
            </div>
        </form>
    </div>
</div>
