<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Request;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function users (): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reservations');
    }

    public function reservations (): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * @note 「getXxxxAttribute」という形式のメソッドを追加すれば、これがgetアクセサとして機能するようになっています。
     * @return VacancyLevel
     */
    public function getVacancyLevelAttribute (): VacancyLevel
    {
        return new VacancyLevel($this->remainingCount());
    }

    private function remainingCount(): int
    {
        return $this->capacity - $this->reservations()->count();
    }
}
