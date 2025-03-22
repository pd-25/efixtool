<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.partials.head')
<body class="bg-white text-gray-900 font-sans">
@include('frontend.layouts.partials.header')

@hasSection('pagetitle')

@else
<div class="lg:hidden md:hidden">
@include('frontend.layouts.partials.toolsSidebar')
</div>
@endif
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
@include('frontend.layouts.partials.footer')
</body>
</html>