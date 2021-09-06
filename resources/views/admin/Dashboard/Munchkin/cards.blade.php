<div class="d-flex flex-column f-height">
    <div class="munchkin-top-menu d-lfex">
        @include('admin.Dashboard.Munchkin.parts.mainNav')
    </div>
    <div class="munchkin-content flex-fill">
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
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
