@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<div class="row">
    <div class="col-xl-4">
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Gambar Mobil </div>
            <div class="d-flex align-items-center">
                <div class="py-2 px-4 {{ $mobilDetail->statusKetersediaan ? 'text-green-500' : 'bg-danger' }}">
                    {{ $mobilDetail->statusKetersediaan ? 'Available' : 'Unavailable' }}
                </div>
                
            </div>
            <div class="card-body text-center">
                @if($mobilDetail->gambarMobil)
                    <img class="img-account-profile rounded-circle mb-2"
                        src="{{ asset('storage/' . $mobilDetail->gambarMobil) }}" alt="{{ $mobilDetail->nama }}">
                @else
                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('image/Not Available.jpeg') }}"
                        alt="{{ $mobilDetail->nama }}" />
                @endif
                <!-- nama mobil -->
                <div class="small font-italic text-muted mb-4">{{ $mobilDetail->nama }}</div>
                <div class="d-flex align-items-center mb-4">
                    <div class="medium font-italic text-muted">
                        Kapasitas Penumpang:
                    </div>
                    <div class="ml-2 p-1 bg-success text-white rounded">{{ $mobilDetail->kapasitasPenumpang }}</div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <div class="medium font-italic text-muted">
                        Harga Rental (per hari):
                    </div>
                    <div class="ml-2 p-1 bg-info text-white rounded">Rp{{ $mobilDetail->hargaRental }}</div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card mb-4">
            <div class="card-header">Mobil Details</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="small mb-1" for="inputUsername">Plat Nomor Mobil</label>
                    <p class="mb-4">{{ $mobilDetail->platNomor }}</p>
                </div>
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Merk Mobil</label>
                        <p class="mb-4">{{ $mobilDetail->merk }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Model Mobil</label>
                        <p class="mb-4">{{ $mobilDetail->model }}</p>
                    </div>
                </div>
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Tahun Mobil</label>
                        <p class="mb-4">{{ $mobilDetail->tahun }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Warna Mobil</label>
                        <p class="mb-4">{{ $mobilDetail->warna }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="small mb-1" for="inputEmailAddress">Deskripsi Mobil (minus-plus nya)</label>
                    <div>{{ $mobilDetail->deskripsi }}</div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Transmisi Mobil</label>
                        <p class="mb-4">{{ $mobilDetail->transmission }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Mesin Mobil</label>
                        <p class="mb-4">{{ $mobilDetail->mesin }}</p>
                    </div>
                </div>
                @if($mobilDetail->statusKetersediaan)
                    <button class="btn btn-primary" type="button">Book Now</button>
                @else
                    <button class="btn btn-danger" type="button" disabled>Unavailable</button>
                @endif
                <input type="button" class="btn btn-default" onclick="window.location='{{ route('customerMobil') }}'"
                    value="Cancel">

            </div>
        </div>
    </div>
</div>

@endsection