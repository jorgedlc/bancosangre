    
    @include('partials.header')
    @include('partials.loader')
    @include('partials.search')
    @include('partials.nav-bar')
    @include('partials.side-bar')

    <!-- PAGE CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
                @yield('content')

            </div>
        </div>
    </section>
    <!-- PAGE CONTENT -->
    
    @include('partials.scripts')
</body>
</html>