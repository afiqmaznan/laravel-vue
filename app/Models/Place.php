<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    const TYPE_OFFBEAT = 'Offbeat';
    const TYPE_LUXE = 'Luxe';
    const TYPE_OFFTHEGRID = 'Off-the-grid';
    const TYPE_POOLS = 'Amazing Pools';
    const TYPE_BEACH = 'Beachfront';
    const TYPE_CABINS = 'Cabins';
    const TYPE_TINYHOMES = 'Tiny Homes';
    const TYPE_FARMS = 'Farms';

    public function getPriceAttribute($price){
        return "RM " . number_format($price,0,".",",") . "/night";
    }

    public function getImagesAttribute($images){
        return json_decode($images, true) ?? [];
    }
}
