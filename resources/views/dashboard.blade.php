@extends('dashboard.main')


@section('container')

    <h1 class="mt-5">Welcome back, {{ auth()->user()->name }}</h1>

@endsection
