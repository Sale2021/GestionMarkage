<?php

namespace App\Models;

use App\Helper\DateFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tuteur extends Model
{
    use DateFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'contact'];

    /**
     * Get all of the students for the Tuteur
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
