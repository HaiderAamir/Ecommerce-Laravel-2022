<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // public function products(): BelongsTo
    // {
    //     return $this->hasone(Product::class, 'product_id', 'product_id');
    // }

    /**
     * Get the user associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function products(): BelongsToMany
    // {
    //     return $this->belongsToMany(Product::class, 'product_id', 'product_id');
    // }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function product1() {
        return $this->belongsTo(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'customer_id', 'id');
    // }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'customer_id', 'id');
    // }
}
