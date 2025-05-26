<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'brand_id',
        'description',
        'pq_no',
        'pq_date',
        'pi_no',
        'pi_date',
        'ap_value',
        'ap_date',
        'ci_no',
        'ci_date',
        'bl_no',
        'bl_date',
        'bp_value',
        'bp_date',
        'eta',
        'remarks',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pq_date' => 'date',
        'pi_date' => 'date',
        'ap_value' => 'decimal:2',
        'ap_date' => 'date',
        'ci_date' => 'date',
        'bl_date' => 'date',
        'bp_value' => 'decimal:2',
        'bp_date' => 'date',
        'eta' => 'date',
    ];

    /**
     * Get the vendor that owns the order.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Get the brand that owns the order.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
