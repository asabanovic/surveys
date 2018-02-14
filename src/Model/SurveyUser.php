<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SurveyUser extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $fillable = ['survey_id', 'user_id', 'user_type', 'organizationp_id', 'organizationp_type', 'completed'];

    public $timestamps = false;

    /**
     * Get all of the owning user models.
     */
    public function user()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the owning organization models.
     */
    public function organization()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve a survey object from this pivot relation
     * 	
     * @return Relation 
     */
    public function survey()
    {
    	return $this->belongsTo('Asabanovic\Surveys\Model\Survey');
    }
}
