<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('index');


Route::middleware('auth', 'verified')->group(function () {
    /* Single Post(Post details) */
    Route::get('posts/show/{post}', [PostController::class, 'show'])->name('show.post');
    /* View Edit Profile Form */
    Route::get('/profile/user', [ProfileController::class, 'editUser'])->name('profile.user.edit');
    /* Update Profile  */
    Route::patch('/profile/update/{id}', [ProfileController::class, 'updateUser'])->name('profile.update');
    /* View Change Password Form */
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('password.change');
    /* Update Password */
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/profile/delete', [ProfileController::class, 'deleteProfile'])->name('profile.delete');
});

Route::middleware('auth', 'role:company', 'verified')->group(function () {
    /* Single Post only for Company */
    Route::get('posts/create', [PostController::class, 'create'])->name('create.post');
    /* Store Post */
    Route::post('posts/store', [PostController::class, 'store'])->name('store.post');
    /* View All Your Posts as a Company */
    Route::get('posts/company-posts', [PostController::class, 'viewCompanyPosts'])->name('view.company.posts');
    /* Edit a Post */
    Route::get('posts/edit/{post}', [PostController::class, 'edit'])->name('edit.company.post');
    /* Store Edited Post */
    Route::post('posts/update/{post}', [PostController::class, 'update'])->name('update.post');
    /* Delete a Post */
    Route::get('posts/delete/{post}', [PostController::class, 'destroy'])->name('delete.post');
    /* View Form for Company Profile */
    Route::get('/profile/company', [ProfileController::class, 'editCompany'])->name('profile.company.edit');
    /* Update Company Profile */
    Route::put('/profile/company', [ProfileController::class, 'updateCompany'])->name('profile.company.update');
});


// Admin Routes
Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/dashboard/posts', [AdminController::class, 'showPosts'])->name('all.posts');
    Route::get('/dashboard/applicants', [AdminController::class, 'showApplicants'])->name('all.applicants');
    Route::get('/dashboard/companies', [AdminController::class, 'showCompanies'])->name('all.companies');
    Route::get('/dashboard/block/{user}', [AdminController::class, 'blockUser'])->name('block.user');
    Route::get('/dashboard/delete/{user}', [AdminController::class, 'deleteUser'])->name('delete.user');
});



require __DIR__ . '/auth.php';
