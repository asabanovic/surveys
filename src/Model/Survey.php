<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Asabanovic\Surveys\Model\SurveyQuestion;
use Asabanovic\Surveys\Model\SurveyAnswer;
use Asabanovic\Surveys\Model\SurveyDocument;
use Asabanovic\Surveys\Model\SurveyContact;

class Survey extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $fillable = ['uuid', 'title', 'description', 'creator_type', 'creator_id', 'updated_at', 'created_at'];

    /**
     * Retrieve all questions for this survey
     * 
     * @return Collection 
     */
    public function questions()
    {
    	return $this->belongsToMany('Asabanovic\Surveys\Model\SurveyQuestion', 'question_survey', 'survey_id', 'question_id')->withPivot('id');
    }

    /**
     * Define a relationship between the survey and an aswer
     * 
     * @return Relation 
     */
    public function answers()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyAnswer');
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
     * Retrieve all user pivots that are able to participate in the survey
     * 
     * @return Relation 
     */
    public function usersList()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyUser', 'survey_id')->with('user');
    }

    /**
     * Filter out the pivot table and return all the users that can open the survey
     * 
     * @return Collection
     */
    public function users()
    {
    	return $this->usersList->pluck('user');
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
     * Assign the question with this survey
     * 
     * @param array $questions
     */
    public function addQuestions($questions)
    {	
    	$questions = collect($questions);

    	// Reset all questions to update the order in the array as well
    	$this->questions()->sync([]);

    	return $this->questions()->sync($questions->pluck('id'));
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

    /**
     * Assign the contact with this survey
     * 
     * @param SurveyDocument $document 
     */
    public function addContact(SurveyContact $contact)
    {
    	return $this->contacts()->save($contact);
    }
}
