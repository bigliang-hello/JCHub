<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'type', 'option_b','option_c','option_d','option_a','answer','analysis','user_id','subject_id'
    ];

    public function papers()
    {
        return $this->belongsToMany('App\Models\Paper');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

}
