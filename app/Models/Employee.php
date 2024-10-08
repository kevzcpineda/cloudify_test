<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','gender'];

    public function serviceRecords()
    {
        return $this->hasOne(ServiceRecord::class)->latestOfMany();
    }

     public function latestServiceRecord()
    {
        return $this->hasOne(ServiceRecord::class)->latestOfMany();
    }
}
