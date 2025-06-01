<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'images',
        'sizes',
        'colors',
        'category_id',
        'subcategory_id',
        'is_featured',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'images' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function cartItems()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }



    // Scopes (useful queries)
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    // Helper methods
    public function getMainImageAttribute()
    {
        return $this->images[0] ?? '/images/placeholder.jpg';
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    public function isOnSale()
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }
    // In app/Models/Product.php, add this method:

    public function getImageUrl($index = 0)
    {
        if (!$this->images || !isset($this->images[$index])) {
            return 'https://via.placeholder.com/400x400/cccccc/666666?text=' . urlencode($this->name);
        }

        $imagePath = $this->images[$index];
        $fullPath = public_path($imagePath);

        if (file_exists($fullPath)) {
            return asset($imagePath);
        }

        return 'https://via.placeholder.com/400x400/cccccc/666666?text=' . urlencode($this->name);
    }
}
