@extends('layouts.layout')

@section('body')
    @include('notification.notification')

    <form class="category" action="{{ route('categories.update', ['category' => $category->id])}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update {{$category->categoryName}}</h4>
                            <p class="card-category">Life so good!!!</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Name</label>
                                            <input name="categoryName" id="categoryName" type="text" class="form-control form-control-user" placeholder="Category Name" value="{{$category->categoryName}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Description</label>
                                            <input type="text" name="description" id="description" class="form-control form-control-user" placeholder="Category Description" value="{{$category->description}}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons">save</i>
                                    SAVE
                                </button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
