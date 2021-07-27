<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productcategories extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('Productcategories', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Productcategories', 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
