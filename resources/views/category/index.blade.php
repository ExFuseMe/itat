@extends('layouts.main')


@section('popup')
<div class="popup">
    <div class="blocker" onclick="hidePopup()"></div>
    <div class="contents">
        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf

            <p>Название категории</p>
            <input type="text" id="name" name="name" />

            <div class="button-group">
                <button class="side-button" type="submit">Создать</button>
                <button class="side-button reset-button" type="reset">Отмена</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('top-menu')
<p>Меню/Категории</p>
<h2>Категории</h2>
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
