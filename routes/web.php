<?php

use App\Models\MyContact;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create/user', function () {
    //    User::create([
    //        'name' => 'Shahi',
    //        'email' => 'shahi@gmail.com',
    //        'password' => Hash::make('password'),
    //        'phone' => '01746799842'
    //    ]);
    //
    //    User::create([
    //        'name' => 'Afruz',
    //        'email' => 'afruz@gmail.com',
    //        'password' => Hash::make('password'),
    //        'phone' => '01712591218'
    //    ]);
    //
    //
    //    User::create([
    //        'name' => 'Rabeya',
    //        'email' => 'rabeya@gmail.com',
    //        'password' => Hash::make('password'),
    //        'phone' => '01732432901'
    //    ]);

    return User::all();
});

Route::get('/contact/sync', function () {
    $myContactList = [
        '01712591218',
        '01732432901',
        '01684202038',
        '01770050509',
        '01764754903',
    ];

    $userAccountList = User::whereIn('phone', $myContactList)->select('id')->get();

    $user = User::find(1);
    $user->contact()->sync($userAccountList);

    return MyContact::all();
});

Route::get('/my-contact', function () {
    $user = User::find(1)->with('contact')->first();
    return $user;
});
