<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

// index page
Route::get('/',function(){
	return view('management.1');
});


Route::get('/admin',function(){
	return view('management.alogin');
})->name('alogin');



Route::get('/manthan',function(){
 return view('management.mayank');
})->name('manthan');

Route::get('/jeet',function(){
 return view('management.jeet');
})->name('jeet');

Route::get('/profile',function(){
	return view('management.profile');
})->name('profile');




// Login Routes
Route::post('login','LoginController@Login')->name('login');
Route::post('hrLogin','LoginController@hrLogin')->name('hrLogin');
Route::get('logout','LoginController@logout')->name('logout');




// hr Routes
Route::group(['middleware'=>'hr'],function(){

Route::get('/AddCandidate',function(){
	return view('hr.AddCandidate');
})->name('AddCandidate');

Route::get('hrdashboard','hrController@hrdashboard')->name('hrdashboard');

Route::post('AddInter','hrController@AddInter')->name('AddInter');
Route::get('CandidateList','hrController@CandidateList')->name('CandidateList');
Route::post('interEdit/{id}','hrController@interEdit')->name('interEdit');

Route::get('AdInt','hrController@AdInt')->name('AdInt');
Route::get('CandiEdit/{id}','hrController@CandiEdit')->name('CandiEdit');
Route::get('DelInter/{id}','hrController@DelInter')->name('DelInter');
Route::get('intersedit/{id}','hrController@intersedit')->name('intersedit');

Route::post('AddTechno','hrController@AddTechno')->name('AddTechno');
Route::get('TechnoList','hrController@TechnoList')->name('TechnoList');
Route::get('DelTech/{id}','hrController@DelTech')->name('DelTech');

Route::get('AllInterviewer','hrController@AllInterviewer')->name('AllInterviewer');

Route::post('candidates','hrController@candidets')->name('candidetes');
});

// Admin Routes
Route::group(['middleware'=>'admin'],function(){

Route::get('/candidateedit',function(){
	return view('admin.candidateedit');
});

Route::get('/AddHr',function(){
	return view('admin.AddHr');
})->name('AddHr');


Route::get('/admindashboard','AdminController@admindashboard')->name('admindashboard');

 Route::post('CreateHr','AdminController@CreateHr')->name('CreatHr');
 Route::get('HrList','EditController@create')->name('HrList');
 Route::get('hredit','EditController@edit')->name('hredit');
 Route::post('HREDIT1/{id}','AdminController@HREDIT1')->name('HREDIT1');
 Route::get('DeleteHr/{id}','AdminController@DeleteHr')->name('DeleteHr');


 Route::post('AddTech','AdminController@AddTech')->name('AddTech');
 Route::get('Tech','AdminController@Tech')->name('Tech');
 Route::get('DeleteTech/{id}','AdminController@DeleteTech')->name('DeleteTech');
 

 Route::get('AddNewInter','AdminController@AddNewInter')->name('AddNewInter');
 Route::post('AddInterviewer','AdminController@AddInterviewer')->name('AddInterviewer');
 Route::get('Candidate','AdminController@Candidate')->name('Candidate');
 Route::get('DeleteInter/{id}','AdminController@DeleteInter')->name('DeleteInter');
 Route::post('CandidateEdit/{id}','AdminController@CandidateEdit')->name('CandidateEdit');
 Route::get('CandidateEditList/{id}','AdminController@CandidateEditList')->name('CandidateEditList');

 Route::get('hr-report','ReportController@hrreport')->name('hrreport');
 Route::get('candidate-report','ReportController@candidatereport')->name('candidatereport');


});

Route::resource('Edit','EditController');



// search controller
Route::get('tech','SearchController@tech1')->name('tech1');

Route::post('hr-report','ReportController@searchname')->name('searchname');	
Route::get('search','SearchController@search')->name('search');
Route::post('candidate-report','ReportController@searchdate')->name('searchdate');
Route::post('tech','SearchController@tech')->name('tech');






Route::get('faltu','FaltuController@index')->name('faltu');
Route::get('serverSide', 'FaltuController@serverside')->name('serverSide');
Route::get('second','FaltuController@second')->name('second');

Route::get('example','FaltuController@ajaxData')->name('example');
Route::get('getallData','FaltuController@loadallData')->name('getalldata');
Route::post('export', 'FaltuController@export')->name('export');


Route::get('downloadExcel/{type}', 'FaltuController@export');

// Delete
Route::delete('cat/{id}','FaltuController@delete')->name('cat');
//  Insert
Route::post('save','FaltuController@save')->name('save');
//  Single Category

Route::get('fetchsingle','FaltuController@single_category')->name('fetchsingle');
Route::post('updatesingle','FaltuController@update')->name('update');


    Route::get('/queue','EmailController@index')->name('email.index');
    Route::post('/email','EmailController@store')->name('email.store');


 
Route::get('checkout','CheckoutController@checkout');
Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');


// Route::group(['middleware' => 'auth'], function() {
Route::get('/home',function(){
    return view('management.1');
})->name('home');

    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');

    //Routes for create Plan
    Route::get('create/plan', 'SubscriptionController@createPlan')->name('create.plan');
    Route::post('store/plan', 'SubscriptionController@storePlan')->name('store.plan');
// });

        Route::get('mail','AdminMailController@viewmail')->name('viewmail');
    Route::post('sendmail','AdminMailController@sendmail')->name('sendmail');