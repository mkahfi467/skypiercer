@extends('layouts.niceadmin')

@section('content')
    <div class="pagetitle">
        <h1>Hotel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hotel.index') }}">Hotel</a></li>
                <li class="breadcrumb-item active">Edit Hotel</li>
            </ol>
        </nav>
    </div>

    <form method="POST" action="{{ route('hotel.update', $rs->id) }}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Hotel</h5>

                <!-- Vertical Form -->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Hotel Name :</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $rs->name }}">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Hotel Address :</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{ $rs->address }}">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="" class="form-label">Hotel Phone Number :</label>
                        <input type="number" class="form-control" id="" placeholder="012345678910" name="phone" value="{{ $rs->phone }}">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Hotel Email :</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ $rs->email }}">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="" class="form-label">Hotel Type :</label>
                        <select name="type" id="type" class="form-select" aria-label="Default select example">
                            <option value="{{ $rs->hotel_type_id }}">Current Hotel Type [ {{ $rs->type->id }} - {{ $rs->type->name }} ]</option>
                            @foreach ($rsHotelType as $r)
                                <option value="{{ $r->id }}">{{ $r->id }} - {{ $r->name }}</option>
                            @endforeach
                        </select>
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
