@extends('layouts.template')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@php
    use App\Enums\AntarAmbilType;
@endphp


<form action="{{ route('pesanan_store', ['mobilId' => $mobil->id]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama">Nama (sesuai KTP)</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group col-md-6">
            <label for="alamat">Alamat (sesuai KTP)</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
    </div>
    <div class="form-group">
        <label for="nomorTlp">Nomor Telepon</label>
        <input type="text" class="form-control" id="nomorTlp" name="nomorTlp" required>
    </div>
    <div class="form-group">
        <label for="antarAmbil">Antar atau Ambil</label>
        <select id="antarAmbil" class="form-control" name="antarAmbil" required>
            <option selected disabled>Choose...</option>
            @foreach(AntarAmbilType::cases() as $type)
                <option value="{{ $type->value }}">{{ ucfirst(str_replace('_', ' ', $type->value)) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" id="alamatPengantaran" style="display:none;">
        <label for="alamatPengantaran">Alamat Pengantaran (dikenakan biaya sebesar Rp20)</label>
        <input type="text" class="form-control" id="alamatPengantaran" name="alamatPengantaran"
            placeholder="Masukkan alamat pengantaran">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tanggalMulai">Tanggal Mulai Booking</label>
            <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tanggalBerakhir">Tanggal Berakhir Booking</label>
            <input type="date" class="form-control" id="tanggalBerakhir" name="tanggalBerakhir" required>
        </div>

        <div class="form-group">
            <label for="totalPembayaran">Total Pembayaran</label>
            <input type="text" class="form-control" id="totalPembayaran" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="buktiTransfer" class="form-label">Upload Bukti Transfer</label>
        <input class="form-control" type="file" name="buktiTransfer" id="buktiTransfer"
            accept="image/jpg, image/png, image/jpeg" onchange="previewImage()" required>
        <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
    </div>

    <!-- untuk kalkulasi total pembayaran -->
    <input type="hidden" id="mobilID" name="mobilID" value="{{ $mobil->id }}">
    <input type="hidden" id="hargaRental" value="{{ $mobil->hargaRental }}">

    <input type="submit" class="btn btn-success" value="Submit">
    <input type="button" class="btn btn-default"
        onclick="window.location='{{ route('mobilDetail', ['id' => $mobil->id]) }}'" value="Cancel">
</form>


{{-- javascript for input image preview --}}
<script>
    function previewImage() {
        const image = document.querySelector('#buktiTransfer');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
{{-- javascript for antar ambil option --}}
<script>
    document.getElementById('antarAmbil').addEventListener('change', function () {
        var selectedOption = this.value;
        var alamatPengantaran = document.getElementById('alamatPengantaran');

        if (selectedOption === '{{ AntarAmbilType::DIANTAR->value }}') {
            alamatPengantaran.style.display = 'block';
        } else {
            alamatPengantaran.style.display = 'none';
        }
    });

    function calculateTotalPayment() {
        var tanggalMulai = document.getElementById('tanggalMulai').value;
        var tanggalBerakhir = document.getElementById('tanggalBerakhir').value;
        var hargaRental = document.getElementById('hargaRental').value;

        if (tanggalMulai && tanggalBerakhir && hargaRental) {
            var startDate = new Date(tanggalMulai);
            var endDate = new Date(tanggalBerakhir);
            var timeDifference = endDate - startDate;
            var dayDifference = timeDifference / (1000 * 3600 * 24) + 1;

            if (dayDifference > 0) {
                var totalPembayaran = dayDifference * hargaRental;

                // Cek apakah pengiriman dipilih
                var antarAmbil = document.getElementById('antarAmbil').value;
                if (antarAmbil === '{{ AntarAmbilType::DIANTAR->value }}') {
                    // Tambah biaya pengiriman jika pengiriman dipilih
                    totalPembayaran += 20; // Ganti 20 dengan biaya pengiriman yang sesuai
                }

                document.getElementById('totalPembayaran').value = totalPembayaran;
            } else {
                document.getElementById('totalPembayaran').value = 'Invalid Dates';
            }
        }
    }


    document.getElementById('tanggalMulai').addEventListener('change', calculateTotalPayment);
    document.getElementById('tanggalBerakhir').addEventListener('change', calculateTotalPayment);
</script>

@endsection