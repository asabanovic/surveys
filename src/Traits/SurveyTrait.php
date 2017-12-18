<?php

namespace Asabanovic\Surveys\Traits;

use Asabanovic\Surveys\Model\Survey;
use Asabanovic\Surveys\Traits\SurveyQuestionTrait;
use Asabanovic\Surveys\Traits\SurveyAnswerTrait;
use Exception;

trait SurveyTrait 
{
	use SurveyQuestionTrait;
	use SurveyAnswerTrait;
	
	/**
	 * Retrieve all surveys created by this user
	 * 
	 * @return Relation 
	 */
	public function surveys()
	{
		return $this->morphMany('Asabanovic\Surveys\Model\Survey', 'creator');
	}

	/**
	 * Associate the object with this survey and recognize it as the owner
	 * 
	 * @param  Survey $survey 
	 * @return Survey         
	 */
 	public function createSurvey(Survey $survey)
 	{
 		return $this->surveys()->save($survey);
 	}
}