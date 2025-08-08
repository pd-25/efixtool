@extends('frontend.layouts.tools')
@section('pagetitle', 'Schema Tester Tool')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
        <div class="relative flex flex-col sm:flex-row gap-4 mb-6">
            <input id="urlInput" class="w-full md:w-5/6 p-2 border border-gray-300 rounded-lg " placeholder="Enter URL to analyze (optional)">
            <button id="analyzeUrlBtn" class="lg:w-1/6 w-full bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center space-x-2 justify-center">Analyze URL</button>
        </div>
        <div class=" flex flex-col md:flex-row gap-4 mb-6">
            <div class="relative w-full">
                <textarea id="schemaInput" rows="15" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y" placeholder="Paste your Schema.org JSON-LD or Microdata here..."></textarea>
                <div id="loader" class="hidden absolute inset-0 flex items-center justify-center bg-gray-200 bg-opacity-50 rounded-lg">
                    <i class="fas fa-fan fa-spin text-yellow-400 text-2xl"></i>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mb-6">
            <button id="validateSchemaBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2 justify-center">
                <i class="fas fa-check-circle"></i><span>Validate Schema</span>
            </button>
            <button id="clearSchemaBtn" class="bg-gray-200 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200 flex items-center space-x-2 justify-center">
                <i class="fas fa-trash"></i><span>Clear</span>
            </button>
        </div>
        <div id="validationResults" class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200 hidden">
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Validation Results:</h3>
            <div id="resultsContent" class="text-gray-700">
                <!-- Results will be displayed here -->
            </div>
        </div>
    </div>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Why This Tool Exists</h2>
        <p class="text-gray-700 leading-relaxed">The Schema Tester tool helps webmasters and SEO professionals validate their Schema.org structured data. Accurate structured data is crucial for search engines to understand your content, leading to better visibility and rich snippets in search results. This tool aims to simplify the validation process by identifying errors and providing actionable insights.</p>
    </section>

    <section class="mb-12">
        <button class="accordion-button w-full bg-gray-800 text-white p-4 rounded-t-lg text-left text-xl font-semibold">How to Use the Schema Tester Tool</button>
        <div class="accordion-content max-h-0 bg-white rounded-b-lg p-6">
            <ul class="list-disc list-inside text-gray-700">
                <li>Paste your Schema.org JSON-LD or Microdata directly into the text area.</li>
                <li>Alternatively, enter a URL to fetch and analyze the structured data on that page.</li>
                <li>Click "Validate Schema" to see instant validation results, including any errors or warnings.</li>
            </ul>
        </div>
    </section>

    <section class="mb-12">
        <button class="accordion-button w-full bg-gray-800 text-white p-4 rounded-t-lg text-left text-xl font-semibold">Key Features</button>
        <div class="accordion-content max-h-0 bg-white rounded-b-lg p-6">
            <ol class="list-decimal list-inside text-gray-700">
                <li>**Schema Validation:** Checks your structured data against Schema.org guidelines.</li>
                <li>**Error Identification:** Pinpoints specific errors and warnings in your markup.</li>
                <li>**URL Analysis:** Fetches and validates structured data directly from a given URL.</li>
                <li>**User-Friendly Interface:** Simple and intuitive design for quick validation.</li>
            </ol>
        </div>
    </section>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Who Can Benefit?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">SEO Professionals</h3>
                <p class="text-gray-700">Ensure structured data is correctly implemented for optimal search engine performance.</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Web Developers</h3>
                <p class="text-gray-700">Verify the accuracy of Schema.org markup during website development.</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Content Creators</h3>
                <p class="text-gray-700">Confirm their content is properly marked up for rich snippets.</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Digital Marketers</h3>
                <p class="text-gray-700">Improve online visibility and click-through rates through valid structured data.</p>
            </div>
        </div>
    </section>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Why Schema Validation Matters</h2>
        <p class="text-gray-700 leading-relaxed">Valid Schema.org structured data is essential for:</p>
        <ul class="list-disc list-inside text-gray-700 mt-2">
            <li>**Enhanced Search Presence:** Qualify for rich snippets, carousels, and other enhanced search features.</li>
            <li>**Improved Understanding:** Help search engines better understand the context and meaning of your content.</li>
            <li>**Higher Click-Through Rates:** Rich snippets often lead to increased visibility and higher CTRs.</li>
            <li>**Future-Proofing:** Stay compliant with evolving search engine guidelines.</li>
        </ul>
    </section>
</div>
@endsection
