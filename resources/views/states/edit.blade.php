@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">State</h1>
    </div>
    <div class="row">
        <div class="card mx-auto" style="width: 100%;">
            <div class="card-header">{{ __('Update State') }}
                <form action="{{ route('states.destroy', $state->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="float-right btn btn-danger" title="Delete {{ $state->name }}"><i
                            class="fa fa-trash fa-fw"></i></button>
                </form>
                <a href="{{ route('states.index') }}" class="btn btn-primary float-right mx-2">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('states.update', $state->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                        <div class="col-md-6">
                            <select class="form-select form-control" name="country_id" aria-label="Default select example">
                                <option selected>.:: Select Country ::.</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $country->id == $state->country_id ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('State Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $state->name) }}" required>

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
                                {{ __('Update') }}
                            </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
