<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
      'id' => 'string'
    ];

    protected $fillable = [
      'name',
      'description',
      'state',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function state(): Attribute
    {
      return new Attribute(
        get: fn ($value) =>  ["inactivo", "activo"][$value],
      );
    }
}
