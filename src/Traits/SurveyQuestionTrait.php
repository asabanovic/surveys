<?php

namespace Asabanovic\Surveys\Traits;

use Asabanovic\Surveys\Model\SurveyQuestion;
use Exception;

trait SurveyQuestionTrait 
{

	/**
	 * Retrieve all questions created by this user
	 * 
	 * @return Relation 
	 */
	public function questions()
	{
		return $this->morphMany('Asabanovic\Surveys\Model\SurveyQuestion', 'creator');
	}

	/**
	 * Associate the object with this question and recognize it as the owner
	 * 
	 * @param  SurveyQuestion $question 
	 * @return SurveyQuestion         
	 */
 	public function createQuestion(SurveyQuestion $question)
 	{
 		return $this->questions()->save($question);
 	}

}