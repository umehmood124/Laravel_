<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    use HasFactory;
    public $attributes =[
        'active_user'=> 1
    ];


    public function getActiveUserAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions(){
        return[
            1 => 'Active',
            0 => 'Inactive',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
