@extends('layouts.main')


@section('popup')
<div class="updatepopup">
    <a href="{{route('category.index')}}"><div class="blocker" onclick="hidePopup()"></div></a>
    <div class="contents">
    <div>
        <p>Блюдо</p>
    </div>
    <form method="post" action="{{route('category.update', $category)}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="text-input">
            <div class="input-wrapper">
                <label>Название</label>
                <input type="text" id="name" name="name" placeholder="Название" value="{{$category->name}}"/>
            </div>
        </div>

        <div class="button-group">
            <button class="side-button" type="submit">Обновить</button>
            <button class="side-button reset-button" type="reset">Отмена</button>

    </form>
    <form action="{{route('category.destroy', $category->id)}}" method="post">
                @csrf
                @method('delete')
                <button class="delete-button" type="submit">Удалить</button>
            </form>
    </div>

    </div>
</div>

@endsection

@section('top-dish')
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
            <div class="column header-column category-column">Наименование</div>
            @foreach($categories as $category)
            <div class="column category-column"><a href="{{route('category.edit', $category->id)}}">{{$category->name}}</a>
</div>
            @endforeach
        </div>

    </div>

</div>
@endsection
