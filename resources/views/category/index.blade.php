@extends('layouts.layout')
@section('nav-icon', 'category')

@section('nav-brand', 'Categories')
@section('body')
    @include('notification.notification')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h4 class="card-title">Categories</h4>
                                        <p class="card-category">Categories Managements</p>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <a class="btn btn-success btn-just-icon" href="/categories/create">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th class="text-center">
                                    #
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Description
                                </th>
                                <th class="text-right">
                                    Actions
                                </th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">
                                            {{$category->id}}
                                        </td>
                                        <td>
                                            {{$category->categoryName}}
                                        </td>
                                        <td>
                                            {{$category->description}}
                                        </td>
                                        <td class="td-actions text-right form-inline justify-content-end">
                                            <a href="/categories/{{$category->id}}" class="btn btn-success btn-just-icon">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="/categories/{{$category->id}}/edit" class="btn btn-primary btn-just-icon">
                                                <i class="material-icons">update</i>
                                            </a>
                                            <form action = "{{route('categories.destroy', $category->id)}}" method = "POST">
                                                @csrf
                                                @method('DELETE')
                                                <button TYPE="submit" class="btn btn-danger btn-just-icon" onclick="return confirm('Are you sure want to delete?' +
                                                 'If you delete this category, the products belong to it ll be delete too.')">
                                                    <i class="material-icons">delete</i>
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
    {{$categories->links()}}
@endsection
