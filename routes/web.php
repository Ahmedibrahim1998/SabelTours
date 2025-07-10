<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// routes To log in Dashboard

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

    //==============================================Dashboard==========================================
    Route::group(['namespace' => 'Admin'], function () {

        Route::resource('educations', 'EducationController');

        Route::resource('experiences', 'ExperienceController');
        Route::get('sort/{experience}/{type}', 'ExperienceController@sortExperience')->name('sort');

        Route::resource('otherJobs', 'OtherJobController');
        Route::get('sortOtherJobs/{otherJob}/{type}', 'OtherJobController@sortOtherJobs')->name('sortOtherJobs');

        Route::resource('universities', 'UniversityController');
        Route::get('sortUniversities/{university}/{type}', 'UniversityController@sortUniversity')->name('sortUniversity');

        Route::resource('trainings', 'TrainingController');
        Route::get('sortTraining/{training}/{type}',
            'TrainingController@sortTraining')->name('sortTraining');

        Route::resource('skills', 'SkillController');
        Route::get('sortSkill/{skill}/{type}', 'SkillController@sortSkill')->name('sortSkill');

        Route::resource('expertises', 'ExpertiseController');
        Route::get('sortExpertise/{expertise}/{type}', 'ExpertiseController@sortExpertise')->name('sortExpertise');

        Route::resource('says', 'SayController');
        Route::get('sortSays/{say}/{type}', 'SayController@sortSays')->name('sortSays');

        Route::resource('socialLinks', 'socialLinkController');

        Route::resource('faqs', 'InvestmentController');

        Route::resource('investmentPortfolios', 'InvestmentPortfolioController');
        Route::get('sortInvestmentPortfolio/{investmentPortfolio}/{type}',
            'InvestmentPortfolioController@sortInvestmentPortfolio')->name('sortInvestmentPortfolio');

        Route::resource('services', 'ServiceController');
        Route::get('sortService/{service}/{type}', 'ServiceController@sortService')->name('sortService');

        // Customer Support
        Route::resource('contacts', 'ContactController');

        // Update Profile
        Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
        Route::put('update', 'ProfileController@updateProfile')->name('update.profile');

        // Settings
        Route::resource('settings', 'SettingController');
        // sections

        Route::get('sortSections/{section}/{type}', 'SectionController@sortSection')->name('sortSection');
        Route::resource('sections', 'SectionController');
        Route::get('sections/changeStatusView/{id}', 'SectionController@changeStatusView')->name('changeStatusView');
        Route::get('sections/changeStatusUp/{id}', 'SectionController@changeStatusViewUp')->name('changeStatusViewUp');

        // User And Roles And Permissions
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
    });

});
