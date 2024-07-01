@extends('layouts.niceadmin')

@section('content')
    <div class="pagetitle">
        <h1>Hotel Type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hotel_types.index') }}">Hotel Type</a></li>
                <li class="breadcrumb-item active">Edit Hotel Type</li>
            </ol>
        </nav>
    </div>

    <form method="POST" action="{{ route('hotel_types.update', $rs->id) }}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Hotel Type</h5>

                <!-- Vertical Form -->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Hotel Type Name :</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $rs->name }}">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </form>
@endsection
