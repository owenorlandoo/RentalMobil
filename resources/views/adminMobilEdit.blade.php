@extends('layouts.template')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<div>
        <div class="container" style="padding: 100px;">
            <form method="POST" action="{{ route('mobil_update', $mobilEdit) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="gambarMobil" class="form-label">Update Car Image</label>
                    <input class="form-control" type="file" name="gambarMobil" id="gambarMobil"
                        accept="image/jpg, image/png, image/jpeg" onchange="previewImage()" value="{{$mobilEdit->gambarMobil}}" >
                    @if($mobilEdit->gambarMobil)
                        <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview"
                            src="{{ asset('storage/' . $mobilEdit->gambarMobil) }}" alt="{{$mobilEdit->nama}}">
                    <!-- Menampilkan gambar yang sudah ada -->
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview">
                    @endif
                </div>
                <div class="form-group">
                    <label label for="platNomor" class="form-label">Plat Nomor</label>
                    <input type="text" class="form-control" name="platNomor" value="{{ $mobilEdit->platNomor }}">
                </div>
                <div class="form-group">
                    <label label for="nama" class="form-label">Nama Mobil</label>
                    <input type="text" class="form-control" name="nama" value="{{ $mobilEdit->nama }}">
                </div>
                <div class="form-group">
                    <label label for="merk" class="form-label">Merk</label>
                    <input type="text" class="form-control" name="merk" value="{{ $mobilEdit->merk }}">
                </div>
                <div class="form-group">
                    <label label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" name="model" value="{{ $mobilEdit->model }}">
                </div>
                <div class="form-group">
                    <label label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" name="tahun" value="{{ $mobilEdit->tahun }}">
                </div>
                <div class="form-group">
                    <label label for="warna" class="form-label">Warna</label>
                    <input type="text" class="form-control" name="warna" value="{{ $mobilEdit->warna }}">
                </div>
                <div class="form-group">
                    <label label for="kapasitasPenumpang" class="form-label">Kapasitas Penumpang</label>
                    <input type="number" class="form-control" name="kapasitasPenumpang" value="{{ $mobilEdit->kapasitasPenumpang }}">
                </div>
                <div class="form-group">
                    <label label for="transmission" class="form-label">Transmisi</label>
                    <input type="text" class="form-control" name="transmission" value="{{ $mobilEdit->transmission }}">
                </div>
                <div class="form-group">
                    <label label for="mesin" class="form-label">Mesin</label>
                    <input type="text" class="form-control" name="mesin" value="{{ $mobilEdit->mesin }}">
                </div>
                <div class="form-group">
                    <label label for="hargaRental" class="form-label">Harga Rental (per hari)</label>
                    <input type="number" class="form-control" name="hargaRental" value="{{ $mobilEdit->hargaRental }}">
                </div>
                <div class="form-group">
                    <label label for="deskripsi" class="form-label">Car Description</label>
                    <textarea class="form-control" name="deskripsi">{{ $mobilEdit->deskripsi }}</textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="statusKetersediaan" id="Available" value="1" {{ $mobilEdit->statusKetersediaan == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="Available">
                        Available
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="statusKetersediaan" id="Unavailable" value="0" {{ $mobilEdit->statusKetersediaan == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="Unavailable">
                        Not Available
                    </label>
                </div>


                
                <input type="button" class="btn btn-default" onclick="window.location='{{ route('adminMobil') }}'"
                    value="Cancel">
                <button type="submit" class="btn btn-success" value="Save">Save</button>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk fungsi previewImage -->
    <!-- JavaScript untuk fungsi previewImage -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Set initial image preview
        previewImage();
    });

    function previewImage() {
        const image = document.querySelector('#gambarMobil');
        const imgPreview = document.querySelector('#img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();

        // Check if there's a file selected
        if (image.files.length > 0) {
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        // If no file selected, keep the existing image preview
    }
</script>

@endsection