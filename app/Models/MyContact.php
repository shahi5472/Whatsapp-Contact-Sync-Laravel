<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyContact extends Model
{
    use HasFactory;

    protected $table = 'my_contacts';

    protected $fillable = ['user_id', 'contact_id'];
}
