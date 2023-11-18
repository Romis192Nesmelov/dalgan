@php
if ($href) {
    if ($menuItem['slug'] == 'home') $link = route('home');
    else $link = route('content',['slug' => $menuItem['slug']]);
} else $link = '#';
@endphp
<li id="{{ $id.'-'.$menuItem['slug'] }}" class="nav-item{{ ($activeMainMenu == $menuItem ? ' active' : '').(isset($addClass) && $addClass ? ' '.$addClass : '') }}">
    <a class="nav-link" {{ !$href ? 'data-scroll='.$menuItem['slug'] : '' }} href="{{ $link }}">{{ $menuItem['name'] }}</a>
</li>
