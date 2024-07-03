@extends('layouts.niceadmin')
@section('content')
    <div class="pagetitle">
        <h1>Transaction</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Transaction</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table Transaction</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name pembeli</th>
                        <th scope="col">Total</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price/Product</th>
                        <th scope="col">Sub-Total</th>
                        <th scope="col">
                            {{-- <a href={{ route('transaction.create') }}>
                                <button class="btn btn-primary btn-sm">Tambah</button>
                            </a> --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs as $r)
                        <tr>
                            <th scope="row">{{ $r->id }}</th>
                            <td>{{ $r->user->name }}</td>
                            <td>Rp. {{ $r->total }}</td>
                            <td>
                                @foreach ($r->product as $p)
                                    - {{ $p->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($r->product as $p)
                                    ({{ $p->pivot->quantity }})
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($r->product as $p)
                                    Rp. {{ $p->pivot->price }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($r->product as $p)
                                    Rp. {{ $p->pivot->price * $p->pivot->quantity }} <br>
                                @endforeach
                            </td>
                            <td>
                                {{-- <a href="{{ route('transaction.edit', $r->id) }}">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </a> --}}
                                <form action="{{ route('transaction.destroy', $r->id) }}" method="post"
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
