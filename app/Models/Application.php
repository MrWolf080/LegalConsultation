<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'question',
        'image',
        'id_category',
        'id_client',
        'id_lawyer',
        'status'
    ];
    public function client()
    {
        return $this->belongsTo(User::class, 'id_client');
    }
    public function lawyer()
    {
        return $this->belongsTo(User::class, 'id_lawyer');
    }
    public function category()
    {
        return $this->belongsTo(ApplicationCategory::class, 'id_category');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'id_application');
    }
}
