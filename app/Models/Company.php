<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
    //for referance

    /* protected $table="app_companies";
    protected $primaryKey="_id"; */

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
