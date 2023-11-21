@php
if ($href) {
    if ($menuItem['slug'] == 'home') $link = route('home');
    else $link = $menuItem['href'] ? route('content',['slug' => $menuItem['slug']]) : route('home',['slug' => $menuItem['slug']]);
} else $link = '#';
@endphp
<li id="{{ $id.'-'.$menuItem['slug'] }}" class="nav-item{{ $activeMainMenu == $menuItem['slug'] ? ' active' : '').(isset($addClass) && $addClass ? ' '.$addClass : '' }}">
    <a class="nav-link" data-scroll="{{ $menuItem['slug'] }}" href="{{ $link }}">{{ $menuItem['name'] }}</a>
</li>
