@extends('layouts.admin')

@section('content')
    <div id="main-content">
        <div id="page-container">
            <h1 class="text-center">Xin chào {{ Auth::user()->username }}</h1>
        </div>
    </div>
@endsection
