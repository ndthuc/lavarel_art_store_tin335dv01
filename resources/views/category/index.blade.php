@extends('layouts.layout')

@section('body')
    @include('notification.notification')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <div class="float-left"><span style="font-size: large" class="nav-tabs-title">Categories</span></div>
                                <div class="float-right">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link bg-success" href="/categories/create">
                                                <i class="material-icons">add</i> ADD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Actions
                                </th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category->id}}
                                        </td>
                                        <td>
                                            {{$category->categoryName}}
                                        </td>
                                        <td>
                                            {{$category->description}}
                                        </td>
                                        <td>
                                            <a href="/categories/{{$category->id}}" class="btn btn-success">
                                                <i class="material-icons">visibility</i>
                                                PRODUCTS</a>
                                            <a href="/categories/{{$category->id}}/edit" class="btn btn-primary">
                                                <i class="material-icons">update</i>
                                                UPDATE</a>
                                            <form action = "{{route('categories.destroy', $category->id)}}" method = "POST">
                                                @csrf
                                                @method('DELETE')
                                                <button TYPE="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?' +
                                                 'If you delete this category, the products belong to it ll be delete too.')">
                                                    <i class="material-icons">delete</i>
                                                    DELETE
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
