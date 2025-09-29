<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    use HasFactory;
    // Optional: Laravel will auto-map to 'videos' table
    protected $table = 'videos';

    // Primary key (default is 'id')
    protected $primaryKey = 'id';

    // Timestamps are enabled by default
    public $timestamps = true;

    // ✅ Mass assignable fields
    protected $fillable = [
        'title',
        'filename',
        'size',
        'author'
    ];

    // 🧠 Casts for clean data handling
    protected $casts = [
        'size' => 'integer',
    ];

    // 🎩 Accessor: Human-readable size (e.g., "12.5 MB")
    public function getSizeReadableAttribute()
    {
        return $this->size
            ? round($this->size / 1048576, 2) . ' MB'
            : 'Unknown';
    }

    // 🧼 Mutator: Clean filename input
    public function setFilenameAttribute($value)
    {
        $this->attributes['filename'] = strtolower(trim($value));
    }


}
