@extends('layouts.niceadmin')

@section('content')
    <div class="pagetitle">
        <h1>Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
        </nav>
    </div>

    <form method="POST" action="{{ route('product.update', $rs->id)}}" class="row g-3">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Product</h5>

                <!-- Vertical Form -->
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Product Name :</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $rs->name }}">
                </div>
                <br>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Product Price :</label>
                    <input type="number" class="form-control" id="inputAddress" placeholder="10000" name="price" value="{{ $rs->price }}">
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Product Image :</label>
                    <input type="text" class="form-control" id="" name="image" value="{{ $rs->image }}">
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Hotel Id :</label>
                    <select name="hotel_id" id="type" class="form-select" aria-label="Default select example">
                        <option value="{{ $rs->hotel_id }}">Current Hotel [ {{ $rs->hotel_id }} - {{ $rs->hotel->name }} ]</option>
                        @foreach ($rsHotel as $rHotel)
                            <option value="{{ $rHotel->id }}">{{ $rHotel->id }} - {{ $rHotel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Product Type :</label>
                    <select name="product_type" id="type" class="form-select" aria-label="Default select example">
                        <option value="{{ $rs->product_type_id }}">Current Hotel [ {{ $rs->product_type_id }} - {{ $rs->type->name }} ]</option>
                        @foreach ($rsProductType as $rProductType)
                            <option value="{{ $rProductType->id }}">{{ $rProductType->id }} - {{ $rProductType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-12">
                    <label for="" class="form-label">Facility :</label>
                    @php
                        $facilityIds = $rs->facility->pluck('id')->toArray();
                    @endphp
                    @foreach ($rsFacility as $rFacility)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="listFacility[]"
                                value="{{ $rFacility->id }}" {{ in_array($rFacility->id, $facilityIds) ? 'checked' : '' }}>
                            <label class="form-check-label" for="gridCheck1">
                                {{ $rFacility->name }} - {{ $rFacility->id }}
                            </label>
                        </div>
                    @endforeach
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
