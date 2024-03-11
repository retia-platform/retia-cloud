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

        @case('arrow-right')
            <x-icon.arrow-right class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('arrow-trending-up')
            <x-icon.arrow-trending-up class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('bell')
            <x-icon.bell class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('bolt')
            <x-icon.bolt class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('chart-bar-square')
            <x-icon.chart-bar-square class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('check-circle')
            <x-icon.check-circle class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('chevron-down')
            <x-icon.chevron-down class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('chevron-left')
            <x-icon.chevron-left class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('chevron-up-down')
            <x-icon.chevron-up-down class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('computer-desktop')
            <x-icon.computer-desktop class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('device-phone-mobile')
            <x-icon.device-phone-mobile class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('chevron-right')
            <x-icon.chevron-right class="{{ $class }}" solid="{{ $solid }}" />
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

        @case('rectangle-stack')
            <x-icon.rectangle-stack class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('search')
            <x-icon.search class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('signal')
            <x-icon.signal class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('tag')
            <x-icon.tag class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('trash')
            <x-icon.trash class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('user-group')
            <x-icon.user-group class="{{ $class }}" solid="{{ $solid }}" />
        @break
    @endswitch
</span>
