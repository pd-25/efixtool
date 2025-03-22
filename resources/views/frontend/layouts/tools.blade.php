@extends('frontend.layouts.main')
@section('content')

 <div class="flex min-h-screen">
    <!-- Sidebar: My Tools -->
   
    @include('frontend.layouts.partials.toolsSidebar')
    <!-- Main Content Area -->
    <section class="flex-1 py-6 px-6">
      @yield('toolsContent')
    </section>
</div>





@endsection

   
