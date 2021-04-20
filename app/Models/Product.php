<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'buyer'
    ];

    public function getBuyerAttribute () {
        $user = User::whereId($this->buyer_id)->first();
        if ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'fb_id' => $user->fb_id
            ];
        }
        return [
            'id' => null,
            'name' => null,
            'fb_id' => null
        ];
    }
}
