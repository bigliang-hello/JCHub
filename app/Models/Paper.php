<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'title','type_1_per_score','type_2_per_score','type_3_per_score','type_4_per_score','total_score','user_id','subject_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject')->withDefault();
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }
}
