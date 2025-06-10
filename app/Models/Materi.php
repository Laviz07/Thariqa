<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Materi extends Model
{
    protected $fillable = [
        'judul',
        'user_id',
        'img',
        'slug',
    ];

    public function materi_contents()
    {
        return $this->hasMany(materi_content::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::updating(function ($materi) {
            // Cek apakah img diganti
            if ($materi->isDirty('img')) {
                $original = $materi->getOriginal('img');
                if ($original && Storage::disk('public')->exists($original)) {
                    Storage::disk('public')->delete($original);
                }
            }
        });

        static::deleting(function ($materi) {
            // Hapus file img saat materi dihapus
            if ($materi->img && Storage::disk('public')->exists($materi->img)) {
                Storage::disk('public')->delete($materi->img);
            }
        });
    }
}
