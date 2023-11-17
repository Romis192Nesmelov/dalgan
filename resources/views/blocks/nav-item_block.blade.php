@php
if ($href) {
    if ($menuItem['slug'] == 'home') $link = 'home';
    else $link = $menuItem['href'] ? route('content',['slug' => $menuItem['slug']]) : route('home',['slug' => $menuItem['slug']]);
} else $link = $menuItem['href'] ? route('content',['slug' => $menuItem['slug']]) : '#';
@endphp
<li id="{{ $id.'-'.$menuItem['slug'] }}" class="nav-item{{ ($activeMainMenu == $menuItem ? ' active' : '').(isset($addClass) && $addClass ? ' '.$addClass : '') }}">
    <a class="nav-link" {{ !$href && !$menuItem['href'] ? 'data-scroll='.$menuItem['slug'] : '' }} href="{{ $link }}">{{ $menuItem['name'] }}</a>
</li>
