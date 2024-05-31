
@extends('layouts.template')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded-md shadow-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Unit Mobil</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4"></th>
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
                        </tr>
                    </thead>
                    <tbody>
{{--
                        @foreach ($mobils as $mobil)

                            <tr>
                                <!-- <td class="py-2 px-4"><a href="/page/{{ $page->id }}"
                                        class="text-blue-500 hover:underline">{{ $page->page_name }}</a></td> -->
                                <td><img class="img-fluid w-25"
                                        src="{{ asset('storage/' . $banner->banner_pict) }}" /></td>
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
                                <!-- untuk boolean -->
                                <td class="py-2 px-4">{{ $mobil->statusKetersediaan }}</td> 

                                <td>
                                            <div class="d-flex align-items-center">
                                                {{-- <a href="{{ route('banner_edit', $banner) }}">
                                                    <button class="btn btn-info" id="edit" name="edit">Edit</button>
                                                </a> --}}
                                                <a href="{{ route('banner_edit', $banner) }}" class="edit">
                                                    <i class="material-icons" data-toggle="tooltip"
                                                        title="Edit">&#xE254;</i>
                                                </a>
                                                <form action="{{ route('banner_destroy', $banner) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="delete" data-toggle="modal" id="delete"
                                                        name="delete">
                                                        <i class="material-icons" data-toggle="tooltip"
                                                            title="Delete">&#xE872;</i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
