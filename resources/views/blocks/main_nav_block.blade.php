<nav id="{{ $id }}" class="main-nav navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-{{ $id }}" aria-controls="navbar-{{ $id }}" aria-expanded="false" aria-label="Переключатель навигации">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-{{ $id }}">
        <ul class="navbar-nav">
            @foreach($mainMenu as $menuItem)
                <li id="{{ $id.'-'.$menuItem['route'] }}" class="nav-item {{ $activeMainMenu == $menuItem['route'] ? 'active' : '' }}">
                    <a class="nav-link" {{ !$href && $menuItem['scroll'] ? 'data-scroll='.$menuItem['route'] : '' }} href="{{ !$href && $menuItem['scroll'] ? '/#' : ($href && $menuItem['scroll'] ? route('home',['slug' => $menuItem['route']]) :route('content',['slug' => $menuItem['route']])) }}">{{ $menuItem['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
