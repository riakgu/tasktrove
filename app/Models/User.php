<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Menetapkan nama tabel yang terkait dengan model ini
    protected $table = "users";

    // Menetapkan kunci utama untuk model ini
    protected $primaryKey = "user_id";

    // Menentukan field yang bisa diisi melalui mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Mendefinisikan hubungan 'hasMany' dengan model Task.
     *
     * @return HasMany Hubungan antara User dan Task
     */
    public function tasks(): HasMany
    {
        // Mengembalikan instance hubungan yang menunjukkan bahwa User dapat memiliki banyak Task
        return $this->hasMany(Task::class, 'user_id', 'user_id');
    }

}

