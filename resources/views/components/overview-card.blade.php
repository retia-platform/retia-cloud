@props([
    'class' => null,
    'headline' => null,
    'title' => null,
    'description' => null,
])

<article class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow rounded-lg {{ $class }}">
    <span class="block text-xs font-medium"> {{ $headline }} </span>
    <h3 class="mt-0.5 text-lg font-medium"> {{ $title }} </h3>
    <p class="mt-2 line-clamp-3 text-sm text-gray-600 dark:text-gray-400"> {{ $description }} </p>
</article>
