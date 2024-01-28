<?php

use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    return view('home');
});

Route::post('/create', function () {
    // TODO: Create a new message and redirect with token

    $token = 1234;
    return redirect('/created/' . $token);
});

Route::get('/created/{token}', function (String $token) {
    return view('created', [
        'url' => env('APP_URL') . '/message/' . $token,
    ]);
});

Route::any('/message/{token}', function (String $token) {
    // TODO: Get message from token
    $message = (object) ['password' => Hash::make('secret')]; // password required
    // $message = (object) ['password' => null]; // password not required

    // Abort if not allowed method
    if (!request()->isMethod('post') && !request()->isMethod('get')) {
        abort(405);
    }

    // Ask for password if message is password protected and request is GET
    if ($message->password && request()->isMethod('get')) {
        return view('password', [
            'invalid' => false,
        ]);
    }

    // Show error if password is not provided or invalid and request is POST
    if (
        request()->isMethod('post') &&
        (
            !request()->password ||
            !Hash::check(request()->password, $message->password)
        )
    ) {
        return view('password', [
            'invalid' => true,
        ]);
    }

    // TODO: Determine if message is deleted
    return view('message', [
        'message' => 'Lorem Ipsum dolor sit amet ...',
        'deleted' => false,
    ]);
});
