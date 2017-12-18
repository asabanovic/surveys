<?php

namespace Asabanovic\Surveys;

use Illuminate\Support\ServiceProvider;

class SurveyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
       
        $loader->alias('Survey', 'Facades\Asabanovic\Surveys\Model\Survey');
        $loader->alias('SurveyQuestion', 'Facades\Asabanovic\Surveys\Model\SurveyQuestion');
        $loader->alias('SurveyAnswer', 'Facades\Asabanovic\Surveys\Model\SurveyAnswer');
        $loader->alias('SurveyDocument', 'Facades\Asabanovic\Surveys\Model\SurveyDocument');
        $loader->alias('SurveyContact', 'Facades\Asabanovic\Surveys\Model\SurveyContact');
    }
}
