<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SurveyQuestion extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve the object that created the question
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }
}
