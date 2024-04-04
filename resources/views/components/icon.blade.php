@props([
    'class' => null,
    'type' => 'information-circle',
    'solid' => false,
])

<span>
    @switch($type)
        @case('adjustments-horizontal')
            <x-icon.adjustments-horizontal class="{{ $class }}" solid="{{ $solid }}" />
        @break

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

        @case('clock')
            <x-icon.clock class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('cog')
            <x-icon.cog class="{{ $class }}" solid="{{ $solid }}" />
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

        @case('wifi')
            <x-icon.wifi class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('at-symbol')
            <x-icon.at-symbol class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('finger-print')
            <x-icon.finger-print class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('viewfinder-circle')
            <x-icon.viewfinder-circle class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('code-bracket-square')
            <x-icon.code-bracket-square class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('hashtag')
            <x-icon.hashtag class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('queue-list')
            <x-icon.queue-list class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('arrow-path')
            <x-icon.arrow-path class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('arrows-pointing-out')
            <x-icon.arrows-pointing-out class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('arrow-uturn-left')
            <x-icon.arrow-uturn-left class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('power')
            <x-icon.power class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('ellipsis-horizontal-circle')
            <x-icon.ellipsis-horizontal-circle class="{{ $class }}" solid="{{ $solid }}" />
        @break

        @case('check-badge')
            <x-icon.check-badge class="{{ $class }}" solid="{{ $solid }}" />
        @break
    @endswitch
</span>
