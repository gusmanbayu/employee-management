@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">City</h1>
    </div>
    <div class="row">
        <div class="card mx-auto" style="width: 100%;">
            <div class="card-header">{{ __('Create City') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('cities.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="state_id" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                        <div class="col-md-6">
                            <select class="form-select form-control" name="state_id" aria-label="Default select example">
                                <option selected>.:: Select State ::.</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
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
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('City Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Input Your City Name" required
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
