<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zh_views_values_variants extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'view_var_id',
        'view_category_id',
        'var_variant',
        'status',
    ];
}
