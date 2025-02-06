@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ngành học') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('nganhhoc.create') }}" class="btn btn-primary mb-3">Create Ngành học</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Ngành</th>
                                <th>Tên Ngành</th>
                                <th>Bộ Môn</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nganhhocs as $nganhhoc)
                                <tr>
                                    <td>{{ $nganhhoc->id }}</td>
                                    <td>{{ $nganhhoc->MaNganh }}</td>
                                    <td>{{ $nganhhoc->TenNganh }}</td>
                                    <td>{{ $nganhhoc->bomon->TenBoMon }}</td>
                                    <td>
                                        <a href="{{ route('nganhhoc.edit', $nganhhoc->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('nganhhoc.destroy', $nganhhoc->id) }}" method="POST" style="display:inline-block;">
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