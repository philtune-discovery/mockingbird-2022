<header class="m_header">
    <div>
        <a href="{{ route('welcome') }}">
            <x-logo class="logo"/>
        </a>
        <nav class="main_nav">
            <?php foreach ([
                ['Dashboard', 'dashboard', 'dashboard', 'dashboard'],
                ['Advertisers', 'clients.index', 'clients.*', 'advertisers'],
                ['Campaigns', 'campaigns.index', 'campaigns.*', 'campaigns'],
                ['Projects', 'projects.index', 'projects.*', 'projects'],
            ] as ['0'=>$title, '1'=>$routeName, '2'=>$pattern, '3'=>$class] ) : ?>
            <a class="main_nav-link t--<?= $class ?> <?= request()->routeIs($pattern) ? 'active' : '' ?>"
               href="<?= route($routeName) ?>">
                <span class="icon">@include('components.icon.'.$class)</span>
                <span><?= $title ?></span>
            </a>
            <?php endforeach ?>
        </nav>
    </div>
</header>
