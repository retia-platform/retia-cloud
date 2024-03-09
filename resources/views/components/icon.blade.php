@props([
    'class' => null,
    'type' => 'information-circle',
    'solid' => false,
])

<span>
    @switch($type)
        @case('arrow-long-right')
            <x-icon.arrow-long-right class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('arrow-trending-up')
            <x-icon.arrow-trending-up class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('bell')
            <x-icon.bell class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('document-text')
            <x-icon.document-text class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('exclamation-triangle')
            <x-icon.exclamation-triangle class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('eye')
            <x-icon.eye class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('information-circle')
            <x-icon.information-circle class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('signal')
            <x-icon.signal class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('user-group')
            <x-icon.user-group class="{{ $class }}" solid="{{ $solid }}" />
        @break
    @endswitch
</span>
