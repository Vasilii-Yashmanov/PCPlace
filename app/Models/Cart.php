<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель корзины.
 *
 * @property int $id Идентификатор корзины
 * @property int $product_id Идентификатор продукта
 * @property int $quantity Количество продукта
 * @property \Carbon\Carbon $created_at Дата и время создания
 * @property \Carbon\Carbon $updated_at Дата и время обновления
 * @property-read \App\Models\Product $product Связанная модель продукта
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
    ];

    /**
     * Определение связи с моделью Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
