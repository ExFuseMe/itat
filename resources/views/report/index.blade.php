@extends('layouts.main')


@section('top-menu')
<p>Отчёты/</p>
<h2>Отчёты</h2>
@endsection

@section('content')



<div class="content-wrapper wrapper side-panel-open report-box">

    <div class="information">
        <div class="column header-column category-column">Общая стоимость всех блюд</div>
        <p>{{$prices}}₽</p>
    </div>

</div>


@endsection
