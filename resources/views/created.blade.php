<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <script>
            function copyClipboard() {
                const copyText = document.getElementById("url");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);

                document.querySelector('#copied').classList.remove('hidden');
            }
        </script>

        <title>Burn after read</title>
    </head>
    <body class="antialiased">
        <div class="mx-auto w-full max-w-md mt-8">
            <label for="url" class="block text-sm font-medium leading-6 text-gray-900">URL</label>
            <div class="mt-2">
                <input value="{{ $url }}" type="text" name="url" id="url" class="disabled:bg-gray-50 disabled:text-gray-500 disabled:ring-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="url">
            </div>
            <div class="mt-4 flex items-center">
                <button onclick="copyClipboard()" type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Copy
                </button>
                <div class="ml-4 text-green-600 hidden" id="copied">
                    Copied!
                </div>
            </div>

            @component('components.footer')@endcomponent
        </div>
    </body>
</html>
