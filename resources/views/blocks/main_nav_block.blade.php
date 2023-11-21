<nav id="{{ $id }}" class="main-nav navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-{{ $id }}" aria-controls="navbar-{{ $id }}" aria-expanded="false" aria-label="Переключатель навигации">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-{{ $id }}">
        <ul class="navbar-nav">
            @foreach($mainMenu as $menuItem)
                @include('blocks.nav-item_block',[
                    'href' => $href,
                    'menuItem' => $menuItem,
                    'menuName' => $menuItem,
                    'firstLoop' => $loop->first
                ])
            @endforeach
        </ul>
    </div>
</nav>
