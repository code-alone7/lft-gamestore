<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'order_status_id'
    ];


    /**
     * Get user who made this order.
     * 
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get status of this order.
     * 
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
    
    /**
     * Scope a query to only include order of certain status.
     *
     * @param  Builder $query
     * @param  string $status
     * @return Builder
     */
    public function scopeOfStatus(Builder $query, string $status): Builder
    {
        return $query->whereRelation('status', 'title', $status);
    }

    /**
     * Scope a query to only include unpaid orders.
     * 
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeUnpaid(Builder $query): Builder
    {
        return $query->ofStatus(config('orders.status_unpaid'));
    }

    /**
     * Scope a query to only include paid orders.
     * 
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePaid(Builder $query): Builder
    {
        return $query->ofStatus('order_statuses', 'title', config('orders.status_paid'));
    }
    
    /**
     * Set status of this order.
     *
     * @param  string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->assosiate(OrderStatus::query()->where('title', $status)->first());
    }
}
