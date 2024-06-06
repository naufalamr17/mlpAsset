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

    <script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
    <style>
        #interactive {
            width: 100%;
            height: 400px;
            overflow: hidden;
            position: relative;
        }

        #interactive video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #result {
            margin-top: 20px;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
                        <x-primary-button id="openModalButton" class="button-with-icon">
                            <i class="fas fa-camera"></i>
                        </x-primary-button>

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div id="interactive" class="viewport"></div>
                                <div id="result"></div>
                            </div>
                        </div>
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
                                @if($inv->acquisition_value == 0)
                                <td>-</td>
                                @else
                                <td>{{ $inv->acquisition_value }}</td>
                                @endif
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

                if (this.value.length >= 13) {
                    setTimeout(() => {
                        this.select(); // Seleksi seluruh teks di dalam kotak pencarian
                    }, 2000);
                }
            });
        });
    </script>

    <script>
        document.getElementById('openModalButton').addEventListener('click', function() {
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
            startScanner();
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            var modal = document.getElementById('myModal');
            modal.style.display = "none";
            Quagga.stop();
        });

        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
                Quagga.stop();
            }
        };

        function startScanner() {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#interactive'), // Target the div element, not the video directly
                    constraints: {
                        facingMode: "environment" // Ensure back camera is used
                    }
                },
                decoder: {
                    readers: [
                        "code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "code_39_vin_reader",
                        "codabar_reader", "upc_reader", "upc_e_reader", "i2of5_reader"
                    ]
                }
            }, function(err) {
                if (err) {
                    console.error(err);
                    return;
                }
                console.log("Initialization finished. Ready to start");
                Quagga.start();
            });

            Quagga.onDetected(function(result) {
                if (result.codeResult) {
                    var code = result.codeResult.code;
                    document.getElementById('result').innerText = 'Barcode detected: ' + code;

                    // Set the code in the search box
                    var searchBox = document.getElementById('searchbox');
                    searchBox.value = code;

                    // Search the table
                    var table = $('#inventoryTable').DataTable();
                    table.search(code).draw();

                    // Close the modal
                    var modal = document.getElementById('myModal');
                    modal.style.display = "none";
                    Quagga.stop();
                }
            });
        }
    </script>

</x-app-layout>