<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const RESERVABLE_COUNT = 5;

    /**
     * @return BelongsToMany
     * @var mixed|string
     */
    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'reservations');
    }

    /**
     * @param int $remainingCount
     * @param int|null $reservationCount
     * @return bool
     */
    public function canReserve(int $remainingCount, int $reservationCount = null): bool
    {
        $plan = $this->plan;

        //レッスン空きなし regular,gold共に不可
        if ($remainingCount === 0) {
            return false;
        }
        //gold レッスン空きあり
        if ($plan === 'gold') {
            return true;
        }
        //regular 残機ありORなし
        return $reservationCount < self::RESERVABLE_COUNT;
    }
}
