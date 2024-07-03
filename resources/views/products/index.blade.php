@extends('layouts.niceadmin')
@section('content')
    <div class="pagetitle">
        <h1>Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table Product</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Product Type</th>
                        <th scope="col">Facility</th>
                        <th scope="col">
                            <a href={{ route('product.create') }}>
                                <button class="btn btn-primary btn-sm">Tambah</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs as $r)
                        <tr>
                            <th scope="row">{{ $r->id }}</th>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->price }}</td>
                            <td>
                                <img src="{{ $r->image }}" alt="" style="width: 150px; height: 150px;">
                            </td>
                            <td>{{ $r->hotel->name }}</td>
                            <td>{{ $r->type->name }}</td>
                            <td style="width: 150px">
                                @foreach ($r->facility as $facility)
                                    - {{ $facility->name }} <br>
                                    {{-- {{ $facility->name }}@if (!$loop->last)
                                        ,
                                    @endif --}}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $r->id) }}">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </a>
                                <form action="{{ route('product.destroy', $r->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure to delete {{ $r->id }} - {{ $r->name }} ?');">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
