<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
    	'pag_name', 
    	'pag_url', 
    	'pag_body'
    ];

    use HasFactory;
}
