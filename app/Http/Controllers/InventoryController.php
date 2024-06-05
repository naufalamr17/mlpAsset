<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = inventory::all();
        // dd($inventory);
        return view('mlpasset.list', compact('inventory'));
    }

    public function addinventory()
    {
        return view('mlpasset.input');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'old_asset_code' => 'required|string',
            'location' => 'required|string',
            'asset_category' => 'required|string',
            'asset_position_dept' => 'required|string',
            'asset_type' => 'required|string',
            'description' => 'required|string',
            'serial_number' => 'required|string',
            'acquisition_date' => 'required|date',
            'disposal_date' => 'nullable|date',
            'useful_life' => 'nullable|integer',
            'acquisition_value' => 'nullable|numeric',
            'hand_over_date' => 'nullable|date',
            'user' => 'nullable|string',
            'dept' => 'nullable|string',
        ]);

        // Mendefinisikan PIC Dept berdasarkan acquisition_value
        if ($request->acquisition_value > 2500000) {
            $pic_dept = 'FAT & GA';
            $id1 = 'FG';
        } else {
            $pic_dept = 'GA';
            $id1 = 'GA';
        }

        if ($request->location == 'Head Office') {
            $id2 = '01';
        } else if ($request->location == 'Office Kendari') {
            $id2 = '02';
        } else if ($request->location == 'Site Molore') {
            $id2 = '03';
        }

        // Menentukan id3 berdasarkan asset_category
        if ($request->asset_category == 'Kendaraan') {
            $id3 = '002';
        } elseif ($request->asset_category == 'Mesin') {
            $id3 = '02';
        } elseif ($request->asset_category == 'Alat Berat') {
            $id3 = '03';
        } elseif ($request->asset_category == 'Alat Lab') {
            $id3 = '04';
        } elseif ($request->asset_category == 'Alat Preparasi') {
            $id3 = '05';
        } elseif ($request->asset_category == 'Peralatan') {
            $id3 = '06';
        } else {
            $id3 = '07'; // Default code if no matching category is found
        }

        // if ($request->asset_type == 'LV') {
        //     $id4 = '001';
        // } elseif ($request->asset_type == 'Mobil Tangki') {
        //     $id4 = '002';
        // } elseif ($request->asset_type == 'Dump Truck') {
        //     $id4 = '003';
        // } elseif ($request->asset_type == 'Elf') {
        //     $id4 = '004';
        // } elseif ($request->asset_type == 'Mobil Operasional') {
        //     $id4 = '005';
        // } elseif ($request->asset_type == 'Motor Operasional') {
        //     $id4 = '006';
        // } elseif ($request->asset_type == 'Speed Boat') {
        //     $id4 = '007';
        // } elseif ($request->asset_type == 'Genset') {
        //     $id4 = '008';
        // } elseif ($request->asset_type == 'Compressor') {
        //     $id4 = '009';
        // } elseif ($request->asset_type == 'Crusher Big') {
        //     $id4 = '010';
        // } elseif ($request->asset_type == 'Excavator') {
        //     $id4 = '011';
        // } elseif ($request->asset_type == 'Ramp Door') {
        //     $id4 = '012';
        // } elseif ($request->asset_type == 'Oven') {
        //     $id4 = '013';
        // } elseif ($request->asset_type == 'Jaw Crusher') {
        //     $id4 = '014';
        // } elseif ($request->asset_type == 'Pul Vulizer') {
        //     $id4 = '015';
        // } elseif ($request->asset_type == 'Mixer Type C') {
        //     $id4 = '016';
        // } elseif ($request->asset_type == 'Top Grinder') {
        //     $id4 = '017';
        // } elseif ($request->asset_type == 'Roll Crusher') {
        //     $id4 = '018';
        // } elseif ($request->asset_type == 'Sieve Shaker Mesin') {
        //     $id4 = '019';
        // } elseif ($request->asset_type == 'Epsilon') {
        //     $id4 = '020';
        // } elseif ($request->asset_type == 'Mesin Press') {
        //     $id4 = '021';
        // } elseif ($request->asset_type == 'Laptop/PC') {
        //     $id4 = '022';
        // } elseif ($request->asset_type == 'Printer/Scanner') {
        //     $id4 = '023';
        // } elseif ($request->asset_type == 'UPS') {
        //     $id4 = '024';
        // } elseif ($request->asset_type == 'GPS') {
        //     $id4 = '025';
        // } elseif ($request->asset_type == 'Alat Komunikasi') {
        //     $id4 = '026';
        // } elseif ($request->asset_type == 'Perangkat Jaringan') {
        //     $id4 = '027';
        // } elseif ($request->asset_type == 'Brankas') {
        //     $id4 = '028';
        // } elseif ($request->asset_type == 'Alat Kesehatan') {
        //     $id4 = '029';
        // } elseif ($request->asset_type == 'Meja') {
        //     $id4 = '030';
        // } elseif ($request->asset_type == 'Kursi') {
        //     $id4 = '031';
        // } elseif ($request->asset_type == 'Lemari') {
        //     $id4 = '032';
        // } elseif ($request->asset_type == 'Elektronik') {
        //     $id4 = '033';
        // } elseif ($request->asset_type == 'Tempat Tidur') {
        //     $id4 = '034';
        // } else {
        //     $id4 = '050'; // Default code if no matching asset type is found
        // }

        // Mengambil nilai iterasi terakhir dari database untuk memastikan urutan 4 digit
        $lastAsset = Inventory::orderBy('id', 'desc')->first();
        $iteration = $lastAsset ? $lastAsset->id + 1 : 1; // Jika tidak ada data, mulai dari 1
        $iteration = str_pad($iteration, 4, '0', STR_PAD_LEFT); // Memastikan 4 digit dengan padding

        $id = $id1 . ' ' . $id2 . '-' . $id3;

        $ids = inventory::where('asset_code', 'LIKE', "%$id%")->get();

        if ($ids != null) {
            $dataCount = 0;

            foreach ($ids as $inventory) {
                $dataCount++;
            }
            $iteration = str_pad($dataCount + 1, 4, '0', STR_PAD_LEFT);
            // dd($iteration);
            $id = $id1 . ' ' . $id2 . '-' . $id3 . '-' . $iteration;
        } else {
            $id = $id1 . ' ' . $id2 . '-' . $id3 . '-' . $iteration;
        }

        // Menambahkan ID dan PIC Dept ke dalam $validatedData
        $validatedData['pic_dept'] = $pic_dept;
        $validatedData['asset_code'] = $id;

        // Simpan data aset ke dalam database
        $asset = Inventory::create($validatedData);

        return redirect()->route('inventory')->with('success', 'Inventory created successfully.');
    }

    public function destroy($id)
    {
        $inventory = inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->back()->with('success', 'Inventory deleted successfully.');
    }
}
