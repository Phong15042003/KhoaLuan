@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bộ môn') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('bomon.create') }}" class="btn btn-primary mb-3">Create Bộ môn</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Bộ môn</th>
                                <th>Tên Bộ môn</th>
                                <th>Khoa</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bomons as $bomon)
                                <tr>
                                    <td>{{ $bomon->id }}</td>
                                    <td>{{ $bomon->MaBoMon }}</td>
                                    <td>{{ $bomon->TenBoMon }}</td>
                                    <td>{{ $bomon->khoa->TenKhoa }}</td>
                                    <td>
                                        <a href="{{ route('bomon.edit', $bomon->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('bomon.destroy', $bomon->id) }}" method="POST" style="display:inline-block;">
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