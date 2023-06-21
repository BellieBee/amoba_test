<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPlan extends Model
{
    use HasFactory;

    protected $table = 'user_plans';

    protected $fillable = [
        'currency_id',
        'next_user_plan_id',
        'start_timestamp',
        'end_timestamp',
        'renewal_timestamp',
        'renewal_price',
        'requires_invoice',
        'status',
        'financiation',
        'status_financiation',
        'language_id',
        'nif',
        'business_name',
        'pending_payment',
        'date_max_payment',
        'proxim_start_timestamp',
        'proxim_end_timestamp',
        'proxim_renewal_timestamp',
        'proxim_renewal_price',
        'credits_return',
        'cancel_employee',
        'force_renovation',
        'date_canceled',
        'amount_confirm_canceled',
        'credit_confirm_canceled',
        'company_id',
        'cost_center_id'
    ];

    public function currency() : BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function language() : BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function costCenter() : BelongsTo
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function reservation() : HasMany
    {
        return $this->hasMany(Reservation::class, 'user_plan_id', 'id');
    }
}
