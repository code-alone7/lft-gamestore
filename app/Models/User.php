<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all genres that was uploaded by this user.
     *
     * @return HasMany
     */
    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class, 'uploader_id');
    }

    /**
     * Get all games that was uploaded by this user.
     *
     * @return HasMany
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'uploader_id');
    }

    /**
     * Get all articles that was uploaded by this user.
     * 
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'uploader_id');
    }

    /**
     * Get all orders of this user.
     * 
     * @return HasMany 
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Get current order of this user.
     *
     * @return Order|static|null
     */
    public function currentOrder(): Order|static|null
    {
        return $this->orders()->unpaid()->first();
    }

    /**
     * Create current order of this user.
     * If current order already exist it will be returned by this method.
     *
     * @return Order|static|null
     */
    public function currentOrderCreate(): Order|static|null
    {
        return $this->orders()->unpaid()->firstOrCreate();
    }

    /**
     * Check if current order exist.
     * 
     * @return bool
     */
    public function hasCurrentOrder()
    {
        return (bool) $this->orders()->unpaid()->first();
    }

    /**
     * Delete current order of this user.
     * 
     * @return void
     */
    public function deleteCurrentOrder(): void
    {
        $order = $this->currentOrder();

        if ($order) {
            $order->delete();
        }
    }
}
