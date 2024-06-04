<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('mlpasset.input');
    }

    public function store(Request $request)
    {
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
        ]);

        // Mendefinisikan PIC Dept berdasarkan acquisition_value
        if ($request->acquisition_value > 2500000) {
            $pic_dept = 'FAT & GA';
            $id1 = 'FG';
        } else {
            $pic_dept = 'GA';
            $id1 = 'GA';
        }

        // Menentukan id3 berdasarkan asset_category
        if ($request->asset_category == 'Kendaraan') {
            $id3 = '002';
        } elseif ($request->asset_category == 'Peralatan') {
            $id3 = '06';
        } else {
            $id3 = '07';
        }

        // Mengambil nilai iterasi terakhir dari database untuk memastikan urutan 4 digit
        $lastAsset = Inventory::orderBy('id', 'desc')->first();
        $iteration = $lastAsset ? $lastAsset->id + 1 : 1; // Jika tidak ada data, mulai dari 1
        $iteration = str_pad($iteration, 4, '0', STR_PAD_LEFT); // Memastikan 4 digit dengan padding

        // dd($lastAsset);

        // Menggabungkan ID sesuai format yang diinginkan
        $id = $id1 . ' 01-' . $id3 . '-' . $iteration;

        // Menambahkan ID dan PIC Dept ke dalam $validatedData
        $validatedData['pic_dept'] = $pic_dept;
        $validatedData['id'] = $id;

        // Simpan data aset ke dalam database
        $asset = Inventory::create($validatedData);

        // dd($validatedData);


        // Simpan data aset ke dalam database
        $asset = Inventory::create($validatedData);

        return redirect()->back()->with('success', 'Inventory created successfully.');
    }
}
