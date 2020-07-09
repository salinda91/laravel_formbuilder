<?php

namespace Modules\FormBuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['user_id','name','description','created_at'];

    public function form_structure()
    {
        return $this->hasMany('Modules\FormBuilder\Entities\FormStructure');
    }
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
