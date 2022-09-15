<?php

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_kota';

    protected $fillable = ['kota_id', 'nama', 'propinsi'];

    public function getRouteKeyName()
    {
        return 'kota_id';
    }
}
