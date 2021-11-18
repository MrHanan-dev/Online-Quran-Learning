<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tutor\TutorController;
use App\Http\Controllers\Tutor\TutorResetPasswordController;
use App\Http\Controllers\Learner\LearnerController;
use App\Http\Controllers\Learner\LearnerResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LearningMaterialController;
use App\Http\Controllers\DemoClassInvitationController;
use App\Http\Controllers\enrollmentInvitationsController;
use App\Http\Controllers\EnrolledLearnersController;
use App\Http\Controllers\UploadRecieptController;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('learner')->name('learner.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function()
    {
          Route::view('/register','learner.authentication.register')->name('register');
          Route::post('/create',[LearnerController::class,'create'])->name('create');

          Route::view('/login','learner.authentication.login')->name('login');
          Route::post('/check',[LearnerController::class,'check'])->name('check');

          Route::get('/forget-password', [LearnerResetPasswordController::class, 'showForgetPasswordForm']);
          Route::post('/forget-password', [LearnerResetPasswordController::class, 'submitForgetPasswordForm']);
          Route::get('/reset-password/{token}', [LearnerResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
          Route::post('/reset-password', [LearnerResetPasswordController::class, 'submitResetPasswordForm']);
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function()
    {

          Route::view('/home','learner.dashboard.home')->name('home');
          Route::post('/logout',[LearnerController::class,'logout'])->name('logout');

          Route::get('/editProfile/{id}',[LearnerController::class,'editProfile']);
          Route::get('/viewProfile/{id}',[LearnerController::class,'viewProfile']);
          Route::put('/updateProfilePhoto/{id}', [LearnerController::class,'updateProfilePhoto']);
          Route::put('/updatePersonalInfo/{id}', [LearnerController::class,'updatePersonalInfo']);
          Route::put('/updatePassword/{id}', [LearnerController::class,'updatePassword']);


          Route::get('/findTutor',[LearnerController::class,'findTutor']);
          Route::get('/viewTutor/{id}',[LearnerController::class,'showTutor']);
          Route::get('/viewCourse/{id}',[LearnerController::class,'viewCourse']);
          Route::post('/bookDemoClass',[DemoClassInvitationController::class,'add']);
          Route::post('/enrollCourse',[enrollmentInvitationsController::class,'add']);

          Route::get('/myCourses',[LearnerController :: class , 'myCourses']);
          Route::get('/viewEnrolledCourse/{id}',[LearnerController :: class , 'viewEnrolledCourse']);
          Route::get('/viewEnrolledLearningMaterial/{id}',[LearningMaterialController :: class , 'viewForLearner']);
          Route::get('/downloadMaterial/{id}',[LearningMaterialController :: class , 'download']);

          Route::delete('/leaveCourse/{id}',[LearnerController :: class , 'leaveCourse']);

          Route::post('/UploadReciept',[UploadRecieptController :: class , 'UploadReciept']);
          Route::get('/paymentHistory',[UploadRecieptController :: class , 'paymentHistory']);
          Route::get('/viewPaymentHistory',[UploadRecieptController :: class , 'viewPaymentHistory']);
          Route::get('/viewReciept/{id}',[UploadRecieptController :: class , 'viewReciept']);


    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function()
    {
          Route::view('/login','admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function()
    {
      Route::get('/home',[AdminController::class,'total'])->name('home');
       Route::get('/tutor',[AdminController::class,'tutors']);
       Route::get('/tutor/view/{id}',[AdminController::class,'showTutor']);
       Route::delete('/tutor/delete/{id}',[AdminController::class,'destroy']);
       Route::get('/learner',[AdminController::class,'learners']);
       Route::get('/learner/view/{id}',[AdminController::class,'showLearner']);
       Route::delete('/learner/delete/{id}',[AdminController::class,'destroyLearner']);
       Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::prefix('tutor')->name('tutor.')->group(function(){

       Route::middleware(['guest:tutor','PreventBackHistory'])->group(function()
       {
            Route::view('/register','tutor.authentication.register')->name('register');
            Route::post('/create',[TutorController::class,'create'])->name('create');

            Route::view('/login','tutor.authentication.login')->name('login');
            Route::post('/check',[TutorController::class,'check'])->name('check');

            Route::get('/forget-password', [TutorResetPasswordController::class, 'showForgetPasswordForm']);
            Route::post('/forget-password', [TutorResetPasswordController::class, 'submitForgetPasswordForm']);
            Route::get('/reset-password/{token}', [TutorResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
            Route::post('/reset-password', [TutorResetPasswordController::class, 'submitResetPasswordForm']);
       });

       Route::middleware(['auth:tutor','PreventBackHistory'])->group(function()
       {
            Route::view('/home','tutor.dashboard.index')->name('home');
            Route::post('/logout',[TutorController::class,'logout'])->name('logout');

            Route::get('/viewProfile/{id}',[TutorController::class,'viewProfile']);
            Route::get('/editProfile/{id}',[TutorController::class,'editProfile']);
            Route::put('/updateProfilePhoto/{id}', [TutorController::class,'updateProfilePhoto']);
            Route::put('/updatePersonalInfo/{id}', [TutorController::class,'updatePersonalInfo']);
            Route::put('/updatePassword/{id}', [TutorController::class,'updatePassword']);


            Route::get('/findLearner',[TutorController::class,'findLearner']);
            Route::get('/learner/{id}',[TutorController::class,'showLearner']);


            Route::view('/addCourse','tutor.dashboard.addCourse');
            Route::post('/addCourse', [CourseController::class,'addCourse']);

            Route::get('/showCourses',[CourseController::class,'showCourses']);

            Route::get('/viewCourse/{id}',[CourseController::class,'viewCourse']);

            Route::get('/editCourse/{id}',[CourseController::class,'edit']);
            Route::put('/updateCourse/{id}',[CourseController::class,'update']);

            Route::delete('/deleteCourse/{id}',[CourseController::class,'destroy']);

            Route::post('/fileUpload/{id}',[LearningMaterialController::class,'store']);
            Route::get('/view/{id}',[LearningMaterialController::class,'view']);
            Route::get('/download/{file}',[LearningMaterialController::class,'download']);
            Route::get('/delete/{id}',[LearningMaterialController::class,'destroy']);



            Route::get('/demoClassInvitations',[DemoClassInvitationController::class,'pendingDemoClassRequests']);
            Route::get('/approve/{id}',[DemoClassInvitationController::class,'approve']);
            Route::get('/reject/{id}',[DemoClassInvitationController::class,'reject']);

            Route::get('/enrollmentInvitations',[enrollmentInvitationsController::class,'enrollmentRequests']);
            Route::get('/approveEnrollment/{id}',[enrollmentInvitationsController::class,'approve']);
            Route::get('/rejectEnrollment/{id}',[enrollmentInvitationsController::class,'reject']);

            Route::get('/myStudents',[EnrolledLearnersController::class,'show']);
            Route::get('/viewMyStudent/{id}',[EnrolledLearnersController::class,'view']);
            Route::get('/removeMyStudent/{id}',[EnrolledLearnersController::class,'destroy']);

            Route::get('/paymentLearnerHistory',[UploadRecieptController::class,'paymentLearnerHistory']);
            Route::get('/viewLearnerpayment/{id}',[UploadRecieptController::class,'viewLearnerpayment']);



       });
});









//Search Routes
Route::get('/Hifz',[SearchController::class,'Hifz']);
Route::get('/Tajweed',[SearchController::class,'Tajweed']);
Route::get('/Recitation',[SearchController::class,'Recitation']);
Route::get('/Translation',[SearchController::class,'Translation']);
Route::get('/searchResult/tutor/{id}',[SearchController::class,'showTutor']);

Route::get('/findTutor',[SearchController::class,'findTutor']);
Route::get('/findLearner',[SearchController::class,'findLearner']);
Route::get('/searchResult/learner/{id}',[SearchController::class,'showLearner']);
