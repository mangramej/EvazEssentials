<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

	protected $fillable = [
		'name',
		'price',
		'description',
	];

	public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

	public function previewImages()
    {
        return $this->hasOne(ProductImage::class)->latestOfMany();
    }

	public function upload(array $images) {
		foreach($images as $image) {
			$this->images()->create([
				'product_id' => $this->id,
				'path' => $image->store('products')
			]);
		}
	}
}
