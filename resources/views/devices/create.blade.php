@extends('layouts.master')

@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('devices.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Serial</label>
            <input type="text" class="form-control" name="serial" id="serial">
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Model</label>
            <input type="text" class="form-control" name="model" id="model">
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="is_active" class="form-label">Is_active</label>
        </div>

        <div class="mb-3 mx-auto w-50">
            <input type="radio" name="is_active" id="is_active-1" value="{{ \App\Models\Device::STATUS_ACTIVE  }}">
            <label for="is_active" class="form-label">{{ \App\Models\Device::STATUS_ACTIVE  }}</label>

            <input type="radio" name="is_active" id="is_active-2" value="{{ \App\Models\Device::STATUS_INACTIVE  }}">
            <label for="is_active" class="form-label">{{ \App\Models\Device::STATUS_INACTIVE  }}</label>
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="img" id="img">
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('devices.index') }}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        

    </form>
@endsection
