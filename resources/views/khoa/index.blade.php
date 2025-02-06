@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Khoa') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('khoa.create') }}" class="btn btn-primary mb-3">Create Khoa</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ma Khoa</th>
                                <th>Ten Khoa</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khoas as $khoa)
                                <tr>
                                    <td>{{ $khoa->id }}</td>
                                    <td>{{ $khoa->MaKhoa }}</td>
                                    <td>{{ $khoa->TenKhoa }}</td>
                                    <td>
                                        <a href="{{ route('khoa.edit', $khoa->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('khoa.destroy', $khoa->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection