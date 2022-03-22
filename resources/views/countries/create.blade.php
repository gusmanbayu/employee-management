@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Country</h1>
    </div>
    <div class="row">
        <div class="card mx-auto" style="width: 100%;">
            <div class="card-header">{{ __('Create Country') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('countries.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="country_code"
                            class="col-md-4 col-form-label text-md-end">{{ __('Country Code') }}</label>

                        <div class="col-md-6">
                            <input id="country_code" type="text"
                                class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                value="{{ old('country_code') }}" placeholder="Input Your Country Code" required
                                autocomplete="username" autofocus>

                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Country Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('first_name') }}" placeholder="Input Your Country Name" required
                                autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                            <button type="reset" class="btn btn-danger">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
