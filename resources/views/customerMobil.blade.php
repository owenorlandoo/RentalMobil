@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>

                <th class="py-2 px-4">Foto Mobil</th>
                <th class="py-2 px-4">kapasitas Penumpang</th>
                <th class="py-2 px-4">Harga Rental (per hari)</th>
                <th class="py-2 px-4">Status Ketersediaan</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mobils as $mobil)
                <tr>
                    <td>
                        @if($mobil->gambarMobil)
                            <img class="img-fluid w-25" src="{{ asset('storage/' . $mobil->gambarMobil) }}"
                                alt="{{ $mobil->nama }}" />

                        @else
                            <img class="img-fluid w-25" src="{{ asset('image/Not Available.jpeg') }}"
                                alt="{{ $mobil->nama }}" />
                        @endif
                    </td>
                    <td class="py-2 px-4">{{ $mobil->kapasitasPenumpang }}</td>
                    <td class="py-2 px-4">{{ $mobil->hargaRental }}</td>
                    <td class="py-2 px-4 {{ $mobil->statusKetersediaan ? 'text-green-500' : 'text-red-500' }}">
                        {{ $mobil->statusKetersediaan ? 'Available' : 'Unavailable' }}
                    </td>


                    <td>
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href='{{ route('mobilDetail', ['id' => $mobil->id]) }}'">
                                See Details
                            </button>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection