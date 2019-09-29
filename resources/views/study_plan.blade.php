@extends('layouts.layout')
@section('title')
    Plan de Estudio
@endsection
@section('content')
    <div>
        <h1>Plan de Estudios</h1>
    </div>

    <div>
        <ul>
            <li><a href="{{ route('career.index') }}">Carreras</a></li>
            <li><a href="{{ route('plan.index') }}">Plan de estudios</a></li>
        </ul>
    </div>
@endsection
