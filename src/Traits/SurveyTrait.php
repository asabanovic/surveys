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
     * Get all of the survey pivots for this survey 
     */
    public function surveyPivot()
    {
        return $this->morphMany('Asabanovic\Surveys\Model\SurveyUser', 'user');
    }

    /**
     * Format the proper output
     * 
     * @return Collection 
     */
    public function mySurveys()
    {
    	return $this->surveyPivot->pluck('survey');
    }

    /**
     * User completes the survey
     * 
     * @param  Survey $survey 
     * @return boolean         
     */
    public function completeSurvey(Survey $survey)
    {
    	$survey_relation = $this->surveyPivot->where('survey_id', $survey->id)->first();
    	$survey_relation->completed = true;

    	return $survey_relation;
    }

    /**
     * User resets the survey
     * 
     * @param  Survey $survey 
     * @return boolean         
     */
    public function resetSurvey(Survey $survey)
    {
    	$survey_relation = $this->surveyPivot->where('survey_id', $survey->id)->first();
    	$survey_relation->completed = false;

    	return $survey_relation;
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