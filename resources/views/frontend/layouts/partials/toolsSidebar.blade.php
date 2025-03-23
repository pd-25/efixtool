<!-- Sidebar -->
<aside class="sidebar w-60 bg-white shadow-lg p-6 lg:block transition-all duration-300" id="sidebar">
    <ul class="space-y-4">
        @hasSection('pagetitle')
        <li class="flex items-center space-x-3">
            <a href="{{route('tools.home')}}" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200">
                <i class="fas fa-home text-xl"></i>
                <span class="txt"> Home</span>
            </a>
            <button class="hamburger hidden lg:block  top-4 left-4 z-50 p-2 flex items-center gap-2" aria-label="Toggle menu">
                <i class="hidden fas fa-bars text-2xl mobile-icon"></i>
                <i class="fas fa-lock-open text-xl desktop-icon"></i>
            </button>
        </li>
        <li>
            <a href="{{ route('tools.character-count') }}" 
               class="flex items-center space-x-3 transition duration-200 
               {{ request()->routeIs('tools.character-count')  ? 'active-menu text-indigo-600' : 'text-gray-600 hover:text-blue-600' }}">
                <i class="fas fa-text-width text-xl"></i>
                <span class="txt">Character Counter</span>
            </a>
        </li>
        
        <li>
            <a href="{{ route('tools.qr-generator') }}" 
               class="flex items-center space-x-3 transition duration-200  
               {{ request()->routeIs('tools.qr-generator') ? 'active-menu text-indigo-600' : 'text-gray-600 hover:text-blue-600' }}">
                <i class="fas fa-qrcode text-xl"></i>
                <span class="txt">QR Code Generator</span>
            </a>
        </li>
        
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-link text-xl"></i><span class="txt"> URL Shortener</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-image text-xl"></i><span class="txt"> Favicon Generator</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-sticky-note text-xl"></i><span class="txt"> Notebook</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-code text-xl"></i><span class="txt"> Schema Tester</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-tachometer-alt text-xl"></i><span class="txt"> Speed Test</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-search text-xl"></i><span class="txt"> Website Audit</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-sitemap text-xl"></i><span class="txt"> XML Sitemap</span></a></li>
        <li><a href="#" class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition duration-200"><i class="fas fa-robot text-xl"></i><span class="txt"> Robots.txt</span></a></li>
        @else
        @include('frontend.layouts.partials.headerMenu')
        @endif
    </ul>
</aside>


