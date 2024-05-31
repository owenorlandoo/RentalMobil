
@extends('layouts.template')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded-md shadow-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Pesanan Kostumer</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4"></th>
                            <th class="py-2 px-4">Page Name</th>
                            <th class="py-2 px-4">Page Ihghggmage</th>
                            <th class="py-2 px-4">Contendferfrft</th>
                        </tr>
                    </thead>
                    <tbody>
{{--
                        @foreach ($pages as $page)

                            <tr>
                                <td class="py-2 px-4"><a href="/page/{{ $page->id }}"
                                        class="text-blue-500 hover:underline">{{ $page->page_name }}</a></td>
                                <td class="py-2 px-4">{{ $page->main_image }}</td>
                                <td class="py-2 px-4">{{ $page->content }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
