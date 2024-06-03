<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /* Relación uno a muchos (inversa) */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /* Query Scope */
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('first_name', 'LIKE', "%" . $search . "%")
                ->orWhere('last_name', 'LIKE', "%" . $search . "%")
                ->orWhere('city', 'LIKE', "%" . $search . "%")
                ->orWhere('phone', 'LIKE', "%" . $search . "%")
                ->orWhereHas('organization', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%" . $search . "%");
                });
        });
    }
}
