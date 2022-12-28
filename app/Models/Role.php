<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
