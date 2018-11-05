<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'type', 'option_b','option_c','option_d','option_a','answer','analysis','user_id','subject_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

}
