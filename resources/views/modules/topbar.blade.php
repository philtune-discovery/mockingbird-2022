<?php
$user = auth()->user();
?>
<section class="m_topbar">
    <label for="search" class="search_label"></label>
    <div>

        <form class="c__search_form" method="GET" action="">
            <label for="search" class="offscreen">Search</label>
            <input id="search" type="search" class="text" value="{{old('search')}}" placeholder="Search" autofocus/>
        </form>

    </div>
    <div>

        <a class="c_avatar u_tooltip" href="/"><?= $user->getInitials() ?><span class="u_tooltip-text"><?= $user->name?> is<br/>logged in</span></a>

    </div>
</section>
