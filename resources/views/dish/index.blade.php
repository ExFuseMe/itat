@extends('layouts.main')


@section('popup')

<div class="popup">
    <div class="blocker" onclick="hidePopup()"></div>
    <div class="contents">
        <div>
            <p>Блюдо</p>
        </div>
        <form method="post" action="{{route('menu.store')}}" enctype="multipart/form-data">
            @csrf

            <label>
                Name<input type="text" id="name" name="name" />
            </label>

            <input type="text" id="price" name="price" />
            <input type="text" id="count" name="count" />
            <input type="file" id="image" name="image" />
            <button type="submit">Создать</button>
        </form>
    </div>
</div>

@endsection
@section('top-menu')
    <p>Меню/блюда</p>
    <h2>Блюда</h2>
@endsection

@section('content')



<div class="content-wrapper wrapper side-panel-open">
    <div class="sub-menu">
        <button onclick="showPopup()" class="side-button">
            Добавить
        </button>
    </div>


    <div class="information">
        <div class="column header-column">Наименование</div>
        <div class="column header-column">Категория</div>
        <div class="column header-column">Цена</div>
        @foreach($dishes as $dish)
        <div class="column">{{$dish->name}}</div>
        <div class="column">{{$dish->category->name}}</div>
        <div class="column">{{$dish->price}} ₽</div>
        @endforeach
    </div>

</div>


@endsection
