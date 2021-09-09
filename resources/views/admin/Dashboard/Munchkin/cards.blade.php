<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        @include('admin.Dashboard.Munchkin.parts.mainNav')
    </div>
    <div class="munchkin-content flex-fill">
        <div class="cards-options">
            <ul>
                <li class="active">Карточки</li>
                <li><a href="/admin/munchkin/addCard"> Добавить </a></li>
                <li><a href="/admin/munchkin/category"> Категории карт</a></li>
            </ul>
        </div>
        <div class="munchkin-filters">
            Фильтры (в будущем ближайшем)
        </div>
        <div class="row cards">
            @foreach ($cards as $card)
            <div class="col-4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{URL::asset("images/manchkin/cards/".$card['image']) }}"/>
                    </div>
                    <div class="card-title">
                        {{$card['title']}}
                    </div>
                    <div class="card-edit">
                        <a href="/admin/munchkin/editCard/{{$card['id']}}">
                            <img src="{{URL::asset("images/manchkin/admin-icons/edit-card.png")}}">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
