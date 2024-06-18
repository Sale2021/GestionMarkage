<?php

namespace App\Models;

use App\Helper\DateFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Student extends Model
{
    use DateFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'contact', 'birthday', 'matricule', 'tuteur_id', 'payment'];

    /**
     * Get the tuteur that owns the Student
     */
    public function tuteur(): BelongsTo
    {
        return $this->belongsTo(Tuteur::class);
    }

    /**
     * Get all of the payments for the Student
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function getPaymentFormatAttribute(): string
    {
        return Carbon::parse($this->payment)->format('d/m/Y');
    }
}
