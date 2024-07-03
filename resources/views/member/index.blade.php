@extends('layouts.niceadmin')
@section('content')
    <div class="pagetitle">
        <h1>Member</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Member</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table Member</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name pembeli</th>
                        <th scope="col">Email</th>
                        <th scope="col">Point</th>
                        <th scope="col">
                            {{-- <a href={{ route('user.create') }}>
                                <button class="btn btn-primary btn-sm">Tambah</button>
                            </a> --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs as $r)
                        @if ($r->role == 'pembeli')
                            <tr>
                                <th scope="row">{{ $r->id }}</th>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->email }}</td>
                                <td>
                                    {{ $r->point }}
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $r->id) }}">
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                    </a>

                                    <form action="{{ route('user.destroy', $r->id) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure to delete {{ $r->id }} - {{ $r->name }} ?');">
                                    </form>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
