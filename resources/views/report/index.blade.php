@extends('layouts.main')


@section('top-menu')
<p>Отчёты/</p>
<h2>Отчёты</h2>
@endsection

@section('content')


<div class="report-box">
    <div class="report-title">Общая стоимость всех блюд</div>
    <div class="report-price">{{$prices}}₽</div>
</div>
@endsection
