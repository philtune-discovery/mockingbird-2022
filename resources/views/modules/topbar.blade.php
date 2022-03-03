<section class="m_topbar">
    <label for="search" class="search_label"></label>
    <div>

        <form class="c__search_form" method="GET" action="">
            <label for="search" class="offscreen">Search</label>
            <input id="search" type="search" class="text" value="{{old('search')}}" placeholder="Search"/>
        </form>

    </div>
    <div>

        <a class="c_avatar" href="/" data-text="{{auth()->user()->getInitials()}}"></a>

    </div>
</section>
