<?php

namespace Modules\FormBuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class FormStructure extends Model
{
    protected $fillable = [];

    public function values()
    {
        return $this->hasMany('Modules\FormBuilder\Entities\Value');
    }
}
