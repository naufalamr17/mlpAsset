<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Asset Management') }}
        </h2>
    </x-slot>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Custom CSS to make the DataTable smaller -->
    <style>
        #inventoryTable_wrapper .dataTables_length,
        #inventoryTable_wrapper .dataTables_filter,
        #inventoryTable_wrapper .dataTables_info,
        #inventoryTable_wrapper .dataTables_paginate {
            font-size: 0.75rem;
        }

        #inventoryTable {
            font-size: 0.75rem;
        }

        #inventoryTable th,
        #inventoryTable td {
            padding: 4px 8px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br>
                    @endif

                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div><br>
                    @endif
                    <div class="flex justify-between mb-4">
                        <input type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="searchbox" id="searchbox" placeholder="Search..." autofocus>
                        <!-- Ubah tombol menjadi input dengan tipe file -->
                        <!-- <input type="file" id="fileInput" accept="image/*" style="display: none;">
                        <label for="fileInput" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:bg-gray-300">
                            Scan Barcode
                        </label> -->
                        <a href="{{ route('add_inventory') }}">
                            <x-primary-button class="items-center justify-center text-white font-bold py-2 px-4 rounded">
                                {{ __('Add Asset') }}
                            </x-primary-button>
                        </a>
                    </div>
                    <table id="inventoryTable" class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-2">{{ __('Kode Asset') }}</th>
                                <th class="px-4 py-2">{{ __('Kode Asset Lama') }}</th>
                                <th class="px-4 py-2">{{ __('Kategori Asset') }}</th>
                                <th class="px-4 py-2">{{ __('Asset Position') }}</th>
                                <th class="px-4 py-2">{{ __('Jenis') }}</th>
                                <th class="px-4 py-2">{{ __('Description') }}</th>
                                <th class="px-4 py-2">{{ __('Serial') }}</th>
                                <th class="px-4 py-2">{{ __('Tanggal Perolehan') }}</th>
                                <th class="px-4 py-2">{{ __('Nilai Perolehan') }}</th>
                                <th class="px-4 py-2">{{ __('Location') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('User') }}</th>
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventory as $inv)
                            <tr class="border-b border-gray-200 text-center text-xs">
                                <td>{{ $inv->asset_code }}</td>
                                <td>{{ $inv->old_asset_code }}</td>
                                <td>{{ $inv->asset_category }}</td>
                                <td>{{ $inv->asset_position_dept }}</td>
                                <td>{{ $inv->asset_type }}</td>
                                <td>{{ $inv->description }}</td>
                                <td>{{ $inv->serial_number }}</td>
                                <td>{{ $inv->acquisition_date }}</td>
                                <td>{{ $inv->acquisition_value }}</td>
                                <td>{{ $inv->location }}</td>
                                <td>{{ $inv->status }}</td>
                                @if(isset($inv->user))
                                <td>{{ $inv->user }}</td>
                                @else
                                <td>-</td>
                                @endif
                                <td>
                                    <div class="flex items-center justify-center">
                                        <div class="bg-indigo-100 rounded-lg p-2">
                                            <a href="{{ route('edit_inventory', ['id' => $inv->id]) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="mx-2"></div>
                                        <form action="{{ route('destroy_inventory', ['id' => $inv->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this asset?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt"></i>
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
    </div>

    <!-- <script src="https://unpkg.com/@zxing/library@latest"></script> -->
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            var table = $('#inventoryTable').DataTable({
                "pageLength": 50,
                "columnDefs": [{
                        "orderable": true,
                        "targets": 7
                    }, // Enable ordering on the 8th column (index 7)
                    {
                        "orderable": false,
                        "targets": '_all'
                    } // Disable ordering on all other columns
                ],
                "dom": '<"top">rt<"bottom"ip><"clear">',
            });

            // Add the search functionality
            $('#searchbox').on('keyup', function() {
                table.search(this.value).draw();

                if (this.value.trim() !== '') {
                    setTimeout(() => {
                        this.select(); // Seleksi seluruh teks di dalam kotak pencarian
                    }, 2000);
                }
            });
        });
    </script>

    <!-- <script>
        // Tambahkan event listener untuk input file
        document.getElementById('fileInput').addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                // Membaca file sebagai URL
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    // Buat objek barcode scanner
                    var barcodeScanner = new ZXing.BrowserBarcodeReader();

                    // Memindai barcode dari gambar yang dipilih
                    barcodeScanner.decodeFromImageUrl(e.target.result).then(result => {
                        // Isi nilai barcode ke dalam kotak pencarian
                        document.getElementById('searchbox').value = result.text;
                    }).catch(error => {
                        console.error('Error decoding barcode: ', error);
                        alert('Error decoding barcode. Please try again.');
                    });
                };
            }
        });
    </script> -->

</x-app-layout>