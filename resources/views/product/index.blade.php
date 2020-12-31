@extends('layouts.layout')

@section('body')
    @include('notification.notification')

        @include('product.table_products')
@endsection
