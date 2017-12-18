<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Asabanovic\Surveys\Model\SurveyQuestion;
use Asabanovic\Surveys\Model\SurveyAnswer;
use Asabanovic\Surveys\Model\SurveyDocument;

class Survey extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];

    /**
     * Retrieve all comments for this event
     * 
     * @return Collection 
     */
    public function questions()
    {
    	return $this->belongsToMany('Asabanovic\Surveys\Model\SurveyQuestions', 'question_survey');
    }

    /**
     * Define a relationship between the survey and an aswer
     * 
     * @return Relation 
     */
    public function answers()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyAnswers');
    }

    /**
     * Define a relationship between the survey and a contact
     * 
     * @return Relation 
     */
    public function contacts()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyContact');
    }

    /**
     * Define a relationship between the survey and a document
     * 
     * @return Relation 
     */
    public function documents()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyDocument');
    }

    /**
     * Retrieve the object who created the survey (Possibily a user)
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * Delete the survey from the database
     * 
     * @return Boolean 
     */
    public function delete()
    {
    	return $this->forceDelete();
    }

    /**
     * Assign the question with this survey
     * 
     * @param SurveyQuestion $question 
     */
    public function addQuestion(SurveyQuestion $question)
    {
    	return $this->questions()->save($question);
    }

    /**
     * Assign the answer with this survey
     * 
     * @param SurveyAnswer $answer 
     */
    public function addAnswer(SurveyAnswer $answer)
    {
    	return $this->answers()->save($answer);
    }

    /**
     * Assign the document with this survey
     * 
     * @param SurveyDocument $document 
     */
    public function addDocument(SurveyDocument $document)
    {
    	return $this->documents()->save($document);
    }
}
