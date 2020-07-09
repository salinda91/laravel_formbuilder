<?php

namespace Modules\FormBuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $fillable = ['form_id','form_structure_id','name','value','status','created_at'];
    protected $table= "value_data";

}
