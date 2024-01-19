@extends('layouts.app')

@section('title', 'Home Product')

@section('contents')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">List Product</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Kode Produk</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($product as $rs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rs->teks }}</td>
                    <td>{{ $rs->harga }}</td>
                    <td>{{ $rs->kode_product }}</td>
                    <td>{{ $rs->deskripsi }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('products.show', $rs->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                            <a href="{{ route('products.edit', $rs->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
