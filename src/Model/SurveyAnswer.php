<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Roundtables\Helper;

class SurveyAnswer extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve the object that wrote the question
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * Define a relationship between the answer and a survey
     * 
     * @return Relation 
     */
    public function survey()
    {
    	return $this->hasOne('Asabanovic\Surveys\Model\Survey');
    }

    /**
     * Define a relationship between the answer and a question
     * 
     * @return Relation 
     */
    public function question()
    {
    	return $this->hasOne('Asabanovic\Surveys\Model\SurveyQuestion');
    }

    public function getAnswerAttribute($value)
    {
        return Helper::isJson($value) ? json_decode($value) : $value;
    }

    public function setGroup(Eloquent $group)
    {
        return $this->fill([
            'group_id' => $group ? $group->id : NULL,
            'group_type' => $group ? get_class($group) : NULL,
        ])->save();
    }
}
