@extends('layouts.master')

@section('content')
    <a href="{{ route('devices.create') }}" class="btn btn-success">Add New</a>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Serial</th>
            <th>Model</th>
            <th>Is_active</th>
            <th>Image</th>
            <th>Action</th>
        </thead>

        @foreach ($data as $item)
            <tbody>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->serial }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->is_active }}</td>
                <td>
                    <img src="{{ \Storage::url($item->img) }}" alt="" width="100px">
                </td>
                <td>
                    <a href="{{ route('devices.edit', $item) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('devices.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"
                        onclick="return confirm('You are sure you want to delete it?')">Delete</button>
                    </form>
                </td>
            </tbody>
        @endforeach
    </table>

    {{ $data->links() }}
@endsection
