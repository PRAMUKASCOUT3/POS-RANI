<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'code',
        'phone',
        'points',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate kode barang otomatis
            $model->code = Members::generateKodeUser();
        });
    }

    public static function generateKodeUser()
    {
        // Ambil kode barang terakhir dari database dan extract nomor
        $lastKode = Members::max('code');
        $lastNumber = $lastKode ? intval(substr($lastKode, 2)) : 0; // Ambil angka setelah 'BR'

        // Tambahkan 1 ke nomor terakhir
        $newNumber = $lastNumber + 1;

        // Format angka baru menjadi 4 digit, misalnya '0001'
        $newKode = 'MB' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return $newKode;
    }

    /**
     * Get all of the transactions for the Members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
