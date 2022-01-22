<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use Sluggable;

    const ADMIN = 'administrator';

    /**
     * The fields to generate and store the slug.
     *
     * @var array
     */
    protected array $sluggable = ['build_from' => 'name'];
}
