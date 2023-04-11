@extends('layouts.main')


@section('popup')
<div class="updatepopup">
    <a href="{{route('menu.index')}}"><div class="blocker" onclick="hidePopup()"></div></a>
    <div class="contents">
    <div>
        <p>Блюдо</p>
    </div>
    <form method="post" action="{{route('menu.update', $current_dish)}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input class="file-adding" type="file" id="image" name="image" />
        <div class="text-input">
            <div class="input-wrapper">
                <label>Название</label>
                <input type="text" id="name" name="name" placeholder="Название"/>
            </div>

            <div class="input-wrapper">
                <label>Цена</label>
                <input type="number" id="price" name="price" placeholder="Цена" min="0"/>
            </div>

            <div class="input-wrapper">
                <label>Количество</label>
                <input type="number" id="count" name="count" min="1"/>
            </div>
        <select name="category_id" id="category_id" class="category-select">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="button-group">
            <button class="side-button" type="submit">Обновить</button>
            <button class="side-button reset-button" type="reset">Отмена</button>
            <a href=""></a>
        </div>
    </form>
    </div>
</div>

@endsection

@section('top-menu')
<p>Меню/блюда</p>
<h2>Блюда</h2>
@endsection

@section('content')


<div class="main">
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
            <div class="column"><a href="">{{$dish->name}}</a></div>
            <div class="column">{{$dish->category->name}}</div>
            <div class="column">{{$dish->price}} ₽</div>
            @endforeach
        </div>

    </div>

</div>
@endsection
