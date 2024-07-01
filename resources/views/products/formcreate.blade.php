@extends('layouts.niceadmin')

@section('content')
    <div class="pagetitle">
        <h1>Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                <li class="breadcrumb-item active">Create New Product</li>
            </ol>
        </nav>
    </div>

    <form method="POST" action="{{ route('product.store') }}" class="row g-3">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form New Product</h5>

                <!-- Vertical Form -->
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Product Name :</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name">
                </div>
                <br>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Product Price :</label>
                    <input type="number" class="form-control" id="inputAddress" placeholder="10000" name="price">
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Product Image :</label>
                    <input type="text" class="form-control" id="" name="image">
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Hotel Id :</label>
                    <select name="hotel_id" id="type" class="form-select" aria-label="Default select example">
                        @foreach ($rsHotel as $rHotel)
                            <option value="{{ $rHotel->id }}">{{ $rHotel->id }} - {{ $rHotel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Product Type :</label>
                    <select name="product_type" id="type" class="form-select" aria-label="Default select example">
                        @foreach ($rsProductType as $rProductType)
                            <option value="{{ $rProductType->id }}">{{ $rProductType->id }} - {{ $rProductType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Facility :</label>
                    @foreach ($rsFacility as $rFacility)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="listFacility[]" value="{{ $rFacility->id }}">
                            <label class="form-check-label" for="gridCheck1">
                                {{ $rFacility->name }} - {{ $rFacility->id }}
                            </label>
                        </div>
                    @endforeach ()
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </div>
    </form>
@endsection
