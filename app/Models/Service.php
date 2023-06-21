<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'external_id',
        'external_budget_id',
        'external_route_id',
        'track_id',
        'name',
        'notes',
        'timestamp',
        'arrival_address',
        'arrival_timestamp',
        'depature_address',
        'depature_timestamp',
        'capacity',
        'confirmed_pax_count',
        'reported_departure_timestamp',
        'reported_departure_kms',
        'reported_arrival_kms',
        'reported_vehicle_plate_number',
        'status',
        'status_info',
        'reprocess_status',
        'return',
        'synchronized_downstream',
        'synchronized_upstream',
        'province_id',
        'sale_tickets_drivers',
        'notes_drivers',
        'itinerary_drivers',
        'cost_of_externalized'
    ];

    public function track() : BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    public function province() : BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
