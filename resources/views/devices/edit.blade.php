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

    <form action="{{ route('devices.update', $device) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $device->name }}">
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Serial</label>
            <input type="text" class="form-control" name="serial" id="serial" value="{{ $device->serial }}">
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Model</label>
            <input type="text" class="form-control" name="model" id="model" value="{{ $device->model }}">
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="is_active" class="form-label">Is_active</label>
        </div>

        <div class="mb-3 mx-auto w-50">
            <input type="radio" name="is_active" id="is_active-1" @if ($device->is_active == \App\Models\Device::STATUS_ACTIVE ) checked @endif
                value="{{ \App\Models\Device::STATUS_ACTIVE }}">
            <label for="is_active" class="form-label">{{ \App\Models\Device::STATUS_ACTIVE  }}</label>

            <input type="radio" name="is_active" id="is_active-2" @if ($device->is_active == \App\Models\Device::STATUS_INACTIVE  ) checked @endif
                value="{{ \App\Models\Device::STATUS_INACTIVE }}">
            <label for="is_active" class="form-label">{{ \App\Models\Device::STATUS_INACTIVE }}</label>
        </div>

        <div class="mb-3 mx-auto w-50">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="img" id="img">
            <img src="{{ \Storage::url($device->img) }}" alt="" width="100px">
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('devices.index') }}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>


    </form>
@endsection
