@extends('layouts.niceadmin')
@section('content')
    <div class="pagetitle">
        <h1>Hotel Type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Hotel Type</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (@session('status'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('status') }}</div>
    @elseif (@session('statusEror'))
        <div class="alert alert-danger alert-dismissible fade show">{{ session('statusEror') }}</div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table hotel type</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">
                            <a href={{ route('HotelType.create') }}>
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
                            <td>
                                <a href="{{ route('HotelType.edit', $r->id) }}">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </a>
                                <form action="{{ route('HotelType.destroy', $r->id) }}" method="post"
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
