@props([
    'class' => null,
    'title' => null,
    'description' => null,
])

<div role="alert" class="rounded border-s-4 border-gray-500 bg-gray-50 p-4 {{ $class }}">
    <div class="flex items-center gap-2 text-gray-800">
        <x-icon type="information-circle" class="w-5 h-5" />
        <strong class="block font-medium"> {{ $title }} </strong>
    </div>
    <p class="mt-2 text-sm text-gray-700"> {!! $description !!} </p>
</div>
