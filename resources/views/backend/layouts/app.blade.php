    <!-- Header -->
    @include('backend.includes.header')

    <!-- Sidebar -->
    @include('backend.includes.sidebar')


        <!-- Main content block -->
        @yield('content')
        <!-- / Main content block -->


    <!-- Footer block -->
    @include('backend.includes.footer')
