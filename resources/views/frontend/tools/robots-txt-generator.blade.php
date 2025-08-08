@extends('frontend.layouts.tools')
@section('pagetitle', 'Robots.txt Generator')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Robots.txt Generator</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Default Settings</h3>
                <div class="space-y-4">
                    <div>
                        <label for="default-access" class="block text-sm font-medium text-gray-700">All Robots are</label>
                        <select id="default-access" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="allow">Allowed</option>
                            <option value="disallow">Refused</option>
                        </select>
                    </div>
                    <div>
                        <label for="crawl-delay" class="block text-sm font-medium text-gray-700">Crawl-delay</label>
                        <input type="number" id="crawl-delay" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="1" placeholder="e.g., 10 seconds">
                    </div>
                    <div>
                        <label for="sitemap" class="block text-sm font-medium text-gray-700">Sitemap</label>
                        <input type="url" id="sitemap" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="https://example.com/sitemap.xml">
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Restricted Directories</h3>
                <div id="restricted-dirs" class="space-y-2">
                    <div class="flex items-center gap-2">
                        <input type="text" class="block w-full p-2 border border-gray-300 rounded-md shadow-sm" placeholder="/directory/">
                        <button class="text-red-500 hover:text-red-700 remove-dir">&times;</button>
                    </div>
                </div>
                <button id="add-dir" class="mt-2 text-blue-600 hover:text-blue-800">+ Add Directory</button>
            </div>
        </div>
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-2">Generated Robots.txt</h3>
            <textarea id="robots-output" rows="10" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y" readonly></textarea>
        </div>
        <div class="mt-4">
            <button id="copy-btn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2">
                <i class="fas fa-copy"></i><span>Copy to Clipboard</span>
            </button>
        </div>
    </div>
</div>
@endsection
