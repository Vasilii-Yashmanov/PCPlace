<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Модель пользователя.
 *
 * @property int $id Идентификатор пользователя
 * @property string $name Имя пользователя
 * @property string $email Email пользователя
 * @property string $password Хэш пароля пользователя
 * @property \Carbon\Carbon|null $email_verified_at Дата и время подтверждения email
 * @property string|null $remember_token Токен для запоминания пользователя
 * @property \Carbon\Carbon $created_at Дата и время создания
 * @property \Carbon\Carbon $updated_at Дата и время обновления
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Атрибуты, которые должны быть скрыты при сериализации.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Атрибуты, которые должны быть приведены к определенным типам.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
