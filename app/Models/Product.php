<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(ProductObserver::class)]

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'slug',
        'image',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
