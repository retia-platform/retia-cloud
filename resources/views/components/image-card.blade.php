@props([
    'class' => null,
    'image' => null,
    'headline' => null,
    'title' => null,
    'description' => null,
])

<article class="relative overflow-hidden rounded-lg shadow-xl transition {{ $class }}">
    <img alt="" src="{{ $image }}" class="absolute inset-0 h-full w-full object-cover" />
    <div class="relative bg-gradient-to-t from-gray-900/100 to-gray-800/25 pt-32">
        <div class="p-4 sm:p-6">
            <time datetime="2022-10-10" class="block text-xs text-white/90"> {{ $headline }} </time>
            <h3 class="mt-0.5 text-lg text-white"> {{ $title }} </h3>
            <p class="mt-2 line-clamp-3 text-sm/relaxed text-white/95"> {{ $description }} </p>
        </div>
    </div>
</article>
