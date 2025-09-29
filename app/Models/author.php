<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class author extends Model{
    use HasFactory;

    protected $table = 'author';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // ✅ Add all your custom fields here
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'joined_at',
    ];

}
