<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'image',
        'id_application',
        'id_user'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'id_application');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
