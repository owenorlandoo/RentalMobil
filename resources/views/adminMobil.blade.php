@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<div class="container mx-auto mt-8">
    <div class="bg-white p-6 rounded-md shadow-md">
        <h1 class="text-3xl font-bold mb-4 text-center">Unit Mobil</h1>

        <div class="col-sm-6">
            <a href="#createCar" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Car</span></a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        
                        <th class="py-2 px-4">Foto Mobil</th>
                        <th class="py-2 px-4">Plat Nomor</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Merk</th>
                        <th class="py-2 px-4">Model</th>
                        <th class="py-2 px-4">Tahun</th>
                        <th class="py-2 px-4">Warna</th>
                        <th class="py-2 px-4">kapasitas Penumpang</th>
                        <th class="py-2 px-4">Transmisi</th>
                        <th class="py-2 px-4">Mesin</th>
                        <th class="py-2 px-4">Harga Rental (per hari)</th>
                        <th class="py-2 px-4">Deskripsi tambahan</th>
                        <th class="py-2 px-4">Status Ketersediaan</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobils as $mobil)
                    <tr>
                        <td>
                            @if($mobil->gambarMobil)
                            <img class="img-fluid w-25" src="{{ asset('storage/' . $mobil->gambarMobil) }}" alt="{{ $mobil->nama }}" />

                            @else
                            <img class="img-fluid w-25" src="{{ asset('image/Not Available.jpeg') }}" alt="{{ $mobil->nama }}" />
                            @endif
                        </td>
                        <td class="py-2 px-4">{{ $mobil->platNomor }}</td>
                        <td class="py-2 px-4">{{ $mobil->nama }}</td>
                        <td class="py-2 px-4">{{ $mobil->merk }}</td>
                        <td class="py-2 px-4">{{ $mobil->model }}</td>
                        <td class="py-2 px-4">{{ $mobil->tahun }}</td>
                        <td class="py-2 px-4">{{ $mobil->warna }}</td>
                        <td class="py-2 px-4">{{ $mobil->kapasitasPenumpang }}</td>
                        <td class="py-2 px-4">{{ $mobil->transmission }}</td>
                        <td class="py-2 px-4">{{ $mobil->mesin }}</td>
                        <td class="py-2 px-4">{{ $mobil->hargaRental }}</td>
                        <td class="py-2 px-4">{{ $mobil->deskripsi }}</td>
                        <td class="py-2 px-4 {{ $mobil->statusKetersediaan ? 'text-green-500' : 'text-red-500' }}">
                            {{ $mobil->statusKetersediaan ? 'Available' : 'Unavailable' }}
                        </td>

                        
                        <td>
                            <div class="d-flex align-items-center">
                            <a href="{{ route('mobil_edit', ['mobil' => $mobil->id]) }}" class="edit">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <form action="{{ route('mobil_destroy', ['mobil' => $mobil->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="delete" data-toggle="modal" id="delete" name="delete">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal HTML -->
<div id="createCar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('mobil_store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Car</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gambarMobil" class="form-label">Upload Car Image</label>
                        <input class="form-control" type="file" name="gambarMobil" id="gambarMobil" accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
                        <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
                    </div>
                    <div class="form-group">
                        <label for="platNomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" name="platNomor" required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="merk" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="merk" required>
                    </div>
                    <div class="form-group">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" name="model" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" name="tahun" required>
                    </div>
                    <div class="form-group">
                        <label for="warna" class="form-label">Warna</label>
                        <input type="text" class="form-control" name="warna" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitasPenumpang" class="form-label">Kapasitas Penumpang</label>
                        <input type="number" class="form-control" name="kapasitasPenumpang" required>
                    </div>
                    <div class="form-group">
                        <label for="transmission" class="form-label">Transmisi</label>
                        <input type="text" class="form-control" name="transmission" required>
                    </div>
                    <div class="form-group">
                        <label for="mesin" class="form-label">Mesin</label>
                        <input type="text" class="form-control" name="mesin" required>
                    </div>
                    <div class="form-group">
                        <label for="hargaRental" class="form-label">Harga Rental (per hari)</label>
                        <input type="number" class="form-control" name="hargaRental" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Car Description</label>
                        <textarea class="form-control" name="deskripsi" required></textarea>
                    </div>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="statusKetersediaan" id="1" value="1">
                        <label class="form-check-label" for="1">
                            Available
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="statusKetersediaan" id="0" value="0">
                        <label class="form-check-label" for="0">
                            Not Available
                        </label>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

{{-- javascript for input image preview --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#gambarMobil');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
