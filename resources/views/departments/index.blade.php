@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Department</h1>
    </div>
    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}

                        <i class="fa-solid fa-xmark float-right" type="button" data-bs-dismiss="alert"
                            aria-label="Close"></i>

                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('departments.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="text" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Seacrh...">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-2">
                            Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($departments as $department)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-success"><i
                                            class="fa fa-edit fa-fw"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
