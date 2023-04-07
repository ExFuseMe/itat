@extends('layouts.main')
@section('content')

<img src="{{asset('images/'.$dish->image_name)}}" />
<p>{{$dish->name}}| {{$dish->price}}</p>
@endsection
