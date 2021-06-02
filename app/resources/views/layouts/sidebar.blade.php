<nav id="sidebar">
    <div class="sidebar-header">
        <h5>{{ Auth::user()->first_name }}</h5>
        <h6>{{ Auth::user()->email }}</h6>
    </div>

    <ul class="list-unstyled components">
        <li>
            <x-nav-link class="link" :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('laporan')" :active="request()->routeIs('laporan')">
                {{ __('Laporan') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('transpage')" :active="request()->routeIs('transpage')">
                {{ __('Transpage') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('backup')" :active="request()->routeIs('backup')">
                {{ __('Download Data') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('biodata')" :active="request()->routeIs('biodata')">
                {{ __('Biodata') }}
            </x-nav-link>
        </li>
    </ul>
</nav>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>