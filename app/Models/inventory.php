<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'old_asset_code',
        'pic_dept',
        'location',
        'asset_category',
        'asset_position_dept',
        'asset_type',
        'description',
        'serial_number',
        'acquisition_date',
        'disposal_date',
        'useful_life',
        'acquisition_value',
        'status',
    ];
}
