<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Burn after read</title>
    </head>
    <body class="antialiased">
        <div class="mx-auto w-full max-w-md mt-8">
            <div class="block text-sm font-medium leading-6 text-gray-900">
                Message
            </div>
            <div class="overflow-hidden rounded-lg bg-white shadow mt-2">
                <div class="px-4 py-5 sm:p-6">
                    {{ $message }}
                </div>
            </div>
            @if($deleted)
                <p class="mt-4 text-sm text-gray-500">
                    This message has been deleted.
                </p>
            @endif

            <p class="mt-16 text-sm text-gray-500 border-t pt-4">
                We focus on the highest, battle proof security standards.<br>
                Messages are transmitted and stored in encrypted form. After the set lifetime, they are irrevocably deleted.<br>
                <br>
                No trackers, no ads, no scripts from external service providers, no financial interest.<br>
                This application is minimalistic and pure.<br>
                <br>
                The code of this application is <a href="#" class="text-blue-500 underline">open source</a>. Verify it yourself or host it directly on your own server.
            </p>
        </div>
    </body>
</html>
