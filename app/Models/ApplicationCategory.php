<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationCategory extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->HasMany(Application::class, 'id_category');
    }
}
