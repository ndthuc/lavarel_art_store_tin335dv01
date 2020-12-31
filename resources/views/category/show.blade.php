@extends('layouts.layout')

@section('body')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{$category->categoryName}}</h4>
                        <p class="card-category">Life so good!!!</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">ID</label>
                                        <p class="form-text">{{$category->id}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <p class="form-text">{{$category->categoryName}}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <p class="form-text">{{$category->description}}</p>
                                    </div>
                                </div>

                            </div>

                            <a class="btn btn-default" href="/categories/{{$category->id}}/edit">
                                <i class="material-icons">update</i>
                                UPDATE</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
