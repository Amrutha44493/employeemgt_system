<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
protected $fillable = [
                'department_id',
                'name', 
                'email', 
                'phone',
                'dob',
                'gender',
                'address',
                'photo',
];
protected $casts = ['dob' => 'date'];
public function department()
{
 return $this->belongsTo(Department::class);
}
public function getAgeAttribute()
{
    return $this->dob->age;
}
}
