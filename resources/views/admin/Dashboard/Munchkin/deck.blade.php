<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        @include('admin.Dashboard.Munchkin.parts.mainNav')
    </div>
    <div class="munchkin-content flex-fill">
        <!--<div class="cards-options">
            <ul>
                <li><a href="/admin/munchkin/cards">Карточки</a></li>
                <li><a href="/admin/munchkin/addCard"> Добавить </a></li>
                <li class="active">Категории карт</li>
            </ul>
        </div>-->
        <h1>Колоды</h1>

        <div class="row cards">
            <div class="col-4">
                <div class="card">
                    <div class="card-title">
                        <strong>Название колоды</strong>
                    </div>
                    <div class="card-title">
                        Карт дверей: 10
                    </div>
                    <div class="card-title">
                        Карт сокровищ: 10
                    </div>
                    <div class="card-edit">
                        <a href="#}">
                            <img src="{{URL::asset("images/manchkin/admin-icons/edit-card.png")}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
