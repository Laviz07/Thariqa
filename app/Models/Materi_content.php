<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi_content extends Model
{
    protected $table = 'materi_contents';

    protected $fillable = [
        'materi_id',
        'subjudul',
        'isi',
    ];

    public function materi()
    {
        return $this->belongsTo(materi::class);
    }
}
