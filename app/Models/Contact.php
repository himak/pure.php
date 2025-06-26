<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'kontakty';

    protected $fillable = [
        'name',
        'email'
    ];

    public $timestamps = false;
}
