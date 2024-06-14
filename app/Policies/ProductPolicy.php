<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy {
    // public function edit(User $user, Product $product): bool {
    //     return $user->id === $product->user_id;
    // }

    public function edit(User $user, Product $product): Response {
        return $user->id === $product->user_id ? Response::allow() : Response::denyAsNotFound();
    }
}
