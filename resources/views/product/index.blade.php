@extends('layouts.layout')

@section('body')
    @include('notification.notification')

    <div class="container-fluid">
        @include('product.table_products')
    </div>
@endsection
