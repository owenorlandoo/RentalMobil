@extends('layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white p-6 rounded-md shadow-md">
        <h1 class="text-3xl font-bold mb-4 text-center">Pesanan Kostumer</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">Mobil ID</th>
                        <th class="py-2 px-4">Nama Kostumer (KTP)</th>
                        <th class="py-2 px-4">Alamat KTP</th>
                        <th class="py-2 px-4">Nomor Telepon</th>
                        <th class="py-2 px-4">Delivery atau pick-up</th>
                        <th class="py-2 px-4">Alamat pengantaran jika memilih delivery</th>
                        <th class="py-2 px-4">Tanggal Mulai Booking</th>
                        <th class="py-2 px-4">Tanggal Berakhir Booking</th>
                        <th class="py-2 px-4">Total Pembayaran</th>
                        <th class="py-2 px-4">Bukti Transfer</th>
                        <th class="py-2 px-4">Status Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanans as $pesanan)
                        <tr>
                            <td class="py-2 px-4">{{ $pesanan->mobilID }}</td>
                            <td class="py-2 px-4">{{ $pesanan->nama }}</td>
                            <td class="py-2 px-4">{{ $pesanan->alamat }}</td>
                            <td class="py-2 px-4">{{ $pesanan->nomorTlp }}</td>
                            <td class="py-2 px-4">{{ $pesanan->antarAmbil }}</td>
                            <td class="py-2 px-4">{{ $pesanan->alamatPengantaran ?? 'N/A' }}</td>
                            <td class="py-2 px-4">{{ $pesanan->tanggalMulai }}</td>
                            <td class="py-2 px-4">{{ $pesanan->tanggalBerakhir }}</td>
                            <td class="py-2 px-4">Rp{{ number_format($pesanan->totalPembayaran, 0, ',', '.') }}</td>
                            <td class="py-2 px-4">
                                @if ($pesanan->buktiTransfer)
                                    <a href="{{ asset('storage/' . $pesanan->buktiTransfer) }}" target="_blank">View</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                @if ($pesanan->statusPesanan)
                                    <span class="text-green-500">Completed</span>
                                @else
                                    <span class="text-yellow-500">Pending</span>
                                @endif
                                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'owner')
                                    <form action="{{ route('pesanan_update_status', $pesanan->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <input type="hidden" name="statusPesanan" value="{{ $pesanan->statusPesanan ? 0 : 1 }}">
                                        <button type="submit"
                                            class="btn btn-sm {{ $pesanan->statusPesanan ? 'btn-danger' : 'btn-success' }}">
                                            {{ $pesanan->statusPesanan ? 'Set Pending' : 'Approve' }}
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>
@endsection