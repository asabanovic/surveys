<?php

namespace Asabanovic\Surveys\Traits;

use Asabanovic\Surveys\Model\SurveyAnswer;
use Exception;

trait SurveyAnswerTrait 
{

	/**
	 * Retrieve all answers created by this user
	 * 
	 * @return Relation 
	 */
	public function answers()
	{
		return $this->morphMany('Asabanovic\Surveys\Model\SurveyAnswer', 'creator');
	}

	/**
	 * Associate the object with this answer and recognize it as the owner
	 * 
	 * @param  SurveyAnswer $answer 
	 * @return SurveyAnswer         
	 */
 	public function writeAnswer(SurveyAnswer $answer)
 	{
 		return $this->answers()->save($answer);
 	}
}