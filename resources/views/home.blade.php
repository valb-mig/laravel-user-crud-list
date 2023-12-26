@extends('layouts.main')
@section('title', 'Home')

@section('content')

    {{-- Scripts --}}
    <script src="{{ asset('js/edit.js') }}"></script>

    <head>
        {{-- Style --}}
        <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    </head>

    @if(session('success'))
        <div class="alert alert-info position-absolute fixed-top" role="alert">
            <button type="button" class="close btn btn-default" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{ session('success') }}
        </div>
    @endif

    <div class="users-table">

        <div class="container">

            <div class="button-list d-flex gap-2">
                <a 
                    href="/#" 
                    class="btn btn-success d-flex align-items-center justify-content-center gap-1" 
                    data-toggle="modal"
                    data-target="#addModal"
                >
                    <i class="fa fa-plus"></i>Add
                </a>
                <a 
                    href="/#" 
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
                                    <a 
                                        class="edit-user btn btn-primary" 
                                        href="/#" 
                                        data-toggle="modal" 
                                        data-target="#editModal" 
                                        data-user-id="{{ $user->user_id }}"
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger" href="/remove/{{$user->user_id}}">
                                        <i class="fa fa-close"></i>
                                    </a>
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

    {{-- Edit Modal --}}

    @include('partials.modal', [
        'modalTitle'  => 'Edit User',
        'modalId'     => 'editModal',
        'formAction'  => '#',
        'formMethod'  => 'post',
        'modalInputs' => [
            [
                'id'    => 'edit-form-name',
                'type'  => 'text',
                'label' => 'Name',
                'name'  => 'form_name',
                'placeholder' => 'Enter name',
            ],
            [
                'id'    => 'edit-form-email',
                'type'  => 'email',
                'label' => 'Email',
                'name'  => 'form_email',
                'placeholder' => 'Enter email',
            ]
        ]
    ])

    {{-- Add Modal --}}

    @include('partials.modal', [
        'modalTitle'  => 'Add User',
        'modalId'     => 'addModal',
        'formAction'  => '/',
        'formMethod'  => 'post',
        'modalInputs' => [
            [
                'type'  => 'text',
                'label' => 'Name',
                'name'  => 'form_name',
                'placeholder' => 'Enter name'
            ],
            [
                'type'  => 'email',
                'label' => 'Email',
                'name'  => 'form_email',
                'placeholder' => 'Enter email'
            ]
        ]
    ])

    {{-- Filter Modal --}}

    @include('partials.modal', [
        'modalTitle'  => 'Filter Users',
        'modalId'     => 'filterModal',
        'formAction'  => '/',
        'formMethod'  => 'get',
        'modalInputs' => [

        ]
    ])

@endsection