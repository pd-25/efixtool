@extends('frontend.layouts.tools')
@section('pagetitle', 'XML Sitemap Generator')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
        <div class="relative flex flex-col sm:flex-row gap-4 mb-6">
            <input id="urlInput" class="w-full p-2 border border-gray-300 rounded-lg " placeholder="Enter Website URL (e.g., https://example.com)">
            <button id="generateSitemapBtn" class="lg:w-1/6 w-full bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center space-x-2 justify-center">Generate Sitemap</button>
        </div>
        <div id="loader" class="hidden text-center my-4">
            <i class="fas fa-spinner fa-spin text-4xl text-blue-600"></i>
            <p class="mt-2 text-gray-600">Generating sitemap... this may take a few minutes.</p>
        </div>
        <div id="sitemapResult" class="hidden">
            <h3 class="text-xl font-semibold mb-4">Generated Sitemap</h3>
            <textarea id="sitemapOutput" rows="15" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y" readonly></textarea>
            <button id="copySitemapBtn" class="mt-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2">
                <i class="fas fa-copy"></i><span>Copy Sitemap</span>
            </button>
        </div>
    </div>
</div>
@endsection
