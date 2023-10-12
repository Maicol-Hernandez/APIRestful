<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected const PRODCUT_AVAILABLE = 'available';
    protected const PRODCUT_UNAVAILABLE = 'Unavailable';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    public function isAvailable(): bool
    {
        return $this->status == self::PRODCUT_AVAILABLE;
    }
}
