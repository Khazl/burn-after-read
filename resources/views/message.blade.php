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

            @component('components.footer')@endcomponent
        </div>
    </body>
</html>
