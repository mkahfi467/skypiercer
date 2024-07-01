@extends('layouts.niceadmin')

@section('content')
    <div class="pagetitle">
        <h1>Hotel Type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('HotelType.index') }}">Hotel Type</a></li>
                <li class="breadcrumb-item active">Create New Hotel Type</li>
            </ol>
        </nav>
    </div>

    <form method="POST" action="{{ route('HotelType.store') }}">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Hotel Type</h5>

                <!-- Vertical Form -->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Hotel Type Name :</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name">
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