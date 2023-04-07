@extends('layouts.main')



@section('content')
    <div>
        <p>Блюдо</p>
    </div>
    <form method="post" action="{{route('menu.store')}}" enctype="multipart/form-data">
        @csrf

        <label>Name</label>
        <input type="text" id="name" name="name">
        <input type="text" id="price" name="price" />
        <input type="text" id="count" name="count" />
        <input type="file" id="image" name="image" />
        <button type="submit">Создать</button>
    </form>

@endsection
