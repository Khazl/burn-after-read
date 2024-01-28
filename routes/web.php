<?php

use App\Models\Message;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    $message = new Message();
    $message->token = Str::random(16);
    $message->password = request()->password ? Hash::make(request()->password) : null;
    $message->content = Crypt::encrypt(request()->message);
    $message->expires_at = request()->expires ? now()->addHours(request()->expires) : null;
    $message->save();

    return redirect('/created/' . $message->token);
});

Route::get('/created/{token}', function (String $token) {
    return view('created', [
        'url' => env('APP_URL') . '/message/' . $token,
    ]);
});

Route::any('/message/{token}', function (String $token) {
    // Abort if not allowed method
    if (!request()->isMethod('post') && !request()->isMethod('get')) {
        abort(405);
    }

    // Abort if message does not exist
    $message = Message::where('token', $token)->first();
    if ($message === null) {
        abort(404);
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

    $content = Crypt::decrypt($message->content);
    $deleted = false;

    // Delete message if lifetime was set to 1 read
    if ($message->expires_at === null) {
        $message->delete();
        $deleted = true;
    }

    return view('message', [
        'message' => $content,
        'deleted' => $deleted,
    ]);
});
