<?php

namespace App\Models;

use App\Models\Scopes\SimpleSoftDletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    //protected $fillable = ['first_name','last_name','email','phone','address','company_id'];
    
    protected $guarded = [];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
