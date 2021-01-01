@extends('layouts.layout')

@section('nav-icon', 'list')
@section('nav-brand', 'Products')

@section('body')
    @include('notification.notification')

        @include('product.table_products')
@endsection
