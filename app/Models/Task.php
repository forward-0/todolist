<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;
    protected $keyType='string';
    protected $primaryKey='id';
    public $incrementing=false;

    public static function boot()  {
        parent ::boot();
        static::creating(function ($model)  {
            $model->id = Str::uuid();
        });
    }






    protected $fillable = [
        'name','status'
    ];
}
