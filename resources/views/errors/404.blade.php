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
            <div class="rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">404 - Not Found</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <div>a) You're looking for a message no longer exists</div>
                            <div>b) You're looking for a page never existed</div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="/" class="block mt-4 text-blue-500 underline">Create new message</a>

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
