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
            <form method="post" action="{{ env('APP_URL') }}/create">
                @csrf
                <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Message</label>
                <div class="mt-2">
                    <textarea rows="4" name="message" id="message" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                <div class="mt-4 flex gap-x-4">
                    <div class="w-1/2">
                        <div class="flex justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <span class="text-sm leading-6 text-gray-500" id="email-optional">Optional</span>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="password-optional">
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Lifetime</label>
                        <select id="location" name="location" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option selected>1 Read</option>
                            <option>1 Hour</option>
                            <option>24 Hours</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create
                    </button>
                </div>
            </form>

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
