<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель элемента заказа.
 *
 * @property int $id Идентификатор элемента заказа
 * @property int $order_id Идентификатор заказа, к которому принадлежит элемент
 * @property int $product_id Идентификатор товара, привязанного к элементу заказа
 * @property float $price Цена элемента заказа
 * @property \Carbon\Carbon $created_at Дата и время создания
 * @property \Carbon\Carbon $updated_at Дата и время обновления
 * @property-read \App\Models\Order $order Заказ, к которому принадлежит элемент
 * @property-read \App\Models\Product $product Товар, привязанный к элементу заказа
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class OrderItem extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'price'];

    /**
     * Определение связи с моделью Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

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
