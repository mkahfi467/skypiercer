@extends('layouts.niceadmin')
@section('content')
    <div class="pagetitle">
        <h1>Hotel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Hotel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table hotel</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Hotel Type</th>
                        <th scope="col">
                            <a href={{ route('hotel.create') }}>
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
                            <td>{{ $r->address }}</td>
                            <td>{{ $r->phone }}</td>
                            <td>{{ $r->email }}</td>
                            <td>{{ number_format($r->rating, 1) }}</td>
                            <td>{{ $r->hotel_type_id }}</td>
                            <td>
                                <a href="{{ route('hotel.edit', $r->id) }}">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </a>
                                <form action="{{ route('hotel.destroy', $r->id) }}" method="post"
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
