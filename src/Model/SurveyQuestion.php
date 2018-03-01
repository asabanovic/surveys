<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Nicolaslopezj\Searchable\SearchableTrait;
use Asabanovic\Surveys\Model\SurveyAnswer;

class SurveyQuestion extends Eloquent
{

	use SearchableTrait;

	/**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'survey_questions.question' => 10,
        ],
       
    ];


    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $fillable = ['question', 'header', 'reference', 'required', 'creator_type', 'creator_id', 'type', 'options', 'order', 'updated_at', 'created_at' ];

    /**
     * Retrieve the object that created the question
     * 
     * @return Relation 
     */
    public function creator()
    {
        return $this->morphTo();
    }

    /**
     * Retrieve all answers to this question
     * 
     * @return Collection 
     */
    public function answers()
    {
    	return $this->hasMany('Asabanovic\Surveys\Model\SurveyAnswer', 'question_id');
    }

    /**
     * Answer this question
     * 
     * @param SurveyAnswer $answer 
     */
    public function addAnswer(SurveyAnswer $answer)
    {
    	return $this->answers()->save($answer);
    }
}
