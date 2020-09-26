@extends('_layout/header')
@section('content')
@include('friend/_form', ['target' => 'store'])
@endsection