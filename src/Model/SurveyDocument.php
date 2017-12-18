<?php

namespace Asabanovic\Surveys\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SurveyDocument extends Eloquent
{
    /**
	 * Allow all fields to be mass-assigned
	 * @var array
	 */
    protected $guarded = ['id'];
}
