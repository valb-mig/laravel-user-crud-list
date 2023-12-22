@extends('layouts.main')
@section('title', 'Home')

@section('content')

    <head>
        {{-- Style --}}
        <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    </head>

    <div class="users-table">

        <div class="container">

            <div class="button-list d-flex gap-2">
                <a 
                    href="#" 
                    class="btn btn-success d-flex align-items-center justify-content-center gap-1" 
                    data-toggle="modal"
                    data-target="#addModal"
                >
                    <i class="fa fa-plus"></i>Add
                </a>
                <a 
                    href="#" 
                    class="btn btn-primary d-flex align-items-center justify-content-center gap-1" 
                    data-toggle="modal"
                    data-target="#filterModal"
                >
                    <i class="fa fa-filter"></i>Filter
                </a>
            </div>

            <div class="row m-0 mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Register Date</th>
                            <th scope="col">Last Update</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->user_name}}</th>
                                <td>{{$user->user_email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>

                                <td class="text-center">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            </ul>
        </nav>
    
    </div>

    {{-- Add Modal --}}

    @include('partials.modal', [
        'modalTitle' => 'Add User',
        'modalId'    => 'addModal',
        'modalBody'  => ''
    ])

    {{-- Filter Modal --}}

    @include('partials.modal', [
        'modalTitle' => 'Filter Users',
        'modalId'    => 'filterModal',
        'modalBody'  => ''
    ])

@endsection