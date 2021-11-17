<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * @package App\Models
 * @version November 6, 2021, 1:01 am UTC
 *
 * @property string $product_name
 * @property string $brandname
 * @property string $description
 * @property number $pricing
 * @property integer $stock
 */
class Product extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_name',
        'brandname',
        'description',
        'pricing',
        'stock'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_name' => 'string',
        'brandname' => 'string',
        'description' => 'string',
        'pricing' => 'decimal:2',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_name' => 'nullable|string|max:50',
        'brandname' => 'nullable|string|max:50',
        'description' => 'required|string|max:200',
        'pricing' => 'nullable|numeric',
        'stock' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function order() {
        return $this->hasMany(\App\Models\Order::class, 'product_id');
    }
}
