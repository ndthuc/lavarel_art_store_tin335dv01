@extends('layouts.layout')

@section('body')
    @include('notification.notification')

    <form class="category" action="{{ route('categories.store')}}" method="POST" >
    @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create a new Category</h4>
                            <p class="card-category">Life so good!!!</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Name</label>
                                            <input name="categoryName" id="categoryName" type="text" class="form-control form-control-user" placeholder="Category Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Description</label>
                                            <input type="text" name="description" id="description" class="form-control form-control-user" placeholder="Category Description">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="material-icons">create</i>
                                    CREATE</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </form>

@endsection
