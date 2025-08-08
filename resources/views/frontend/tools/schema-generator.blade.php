@extends('frontend.layouts.tools')
@section('pagetitle', 'Schema Generator Tool')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <div class="relative w-full">
                <textarea id="schemaOutput" rows="15" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y" placeholder="Generated Schema.org JSON-LD will appear here..." readonly></textarea>
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mb-6">
            <button id="generateSchemaBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2 justify-center">
                <i class="fas fa-cogs"></i><span>Generate Schema</span>
            </button>
            <button id="copySchemaBtn" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200 flex items-center space-x-2 justify-center">
                <i class="fas fa-copy"></i><span>Copy Schema</span>
            </button>
            <button id="clearSchemaBtn" class="bg-gray-200 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200 flex items-center space-x-2 justify-center">
                <i class="fas fa-trash"></i><span>Clear</span>
            </button>
        </div>
        <div id="schemaForm" class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Schema Details:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div id="schemaTypeField">
                    <label for="schemaType" class="block text-sm font-medium text-gray-700">Schema Type:</label>
                    <select id="schemaType" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="Article">Article</option>
                        <option value="LocalBusiness">Local Business</option>
                        <option value="Product">Product</option>
                        <option value="Recipe">Recipe</option>
                        <option value="Event">Event</option>
                        <option value="FAQPage">FAQ Page</option>
                        <option value="Organization">Organization</option>
                        <option value="Person">Person</option>
                        <option value="Review">Review</option>
                        <option value="Service">Service</option>
                        <option value="WebPage">Web Page</option>
                        <option value="BreadcrumbList">Breadcrumb List</option>
                    </select>
                </div>
                <div id="nameField">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div id="urlField">
                    <label for="url" class="block text-sm font-medium text-gray-700">URL:</label>
                    <input type="url" id="url" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div id="descriptionField">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                    <textarea id="description" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 resize-y"></textarea>
                </div>
                <!-- Dynamic fields will be added here based on schema type -->
            </div>
        </div>
    </div>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Why This Tool Exists</h2>
        <p class="text-gray-700 leading-relaxed">The Schema Generator tool helps you create valid Schema.org JSON-LD markup for various content types. Structured data is essential for improving your website's visibility in search engine results by enabling rich snippets and enhanced listings. This tool simplifies the process of generating accurate and compliant schema markup without needing to write code manually.</p>
    </section>

    <section class="mb-12">
        <button class="accordion-button w-full bg-gray-800 text-white p-4 rounded-t-lg text-left text-xl font-semibold">How to Use the Schema Generator Tool</button>
        <div class="accordion-content max-h-0 bg-white rounded-b-lg p-6">
            <ul class="list-disc list-inside text-gray-700">
                <li>Select the desired Schema Type from the dropdown menu.</li>
                <li>Fill in the relevant details in the form fields that appear.</li>
                <li>Click "Generate Schema" to see the JSON-LD output.</li>
                <li>Click "Copy Schema" to copy the generated code to your clipboard.</li>
            </ul>
        </div>
    </section>

    <section class="mb-12">
        <button class="accordion-button w-full bg-gray-800 text-white p-4 rounded-t-lg text-left text-xl font-semibold">Key Features</button>
        <div class="accordion-content max-h-0 bg-white rounded-b-lg p-6">
            <ol class="list-decimal list-inside text-gray-700">
                <li>**Multiple Schema Types:** Generate markup for Articles, Products, Local Businesses, and more.</li>
                <li>**Dynamic Form Fields:** Input fields adapt based on the selected schema type.</li>
                <li>**JSON-LD Output:** Produces clean and valid JSON-LD structured data.</li>
                <li>**Easy Copy:** One-click copy functionality for quick implementation.</li>
            </ol>
        </div>
    </section>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Who Can Benefit?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">SEO Professionals</h3>
                <p class="text-gray-700">Quickly generate structured data to enhance search engine visibility.</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Web Developers</h3>
                <p class="text-gray-700">Streamline the process of adding Schema.org markup to websites.</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Content Creators</h3>
                <p class="text-gray-700">Ensure their content is properly marked up for rich snippets and better understanding by search engines.</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Digital Marketers</h3>
                <p class="text-gray-700">Improve online presence and drive more organic traffic through accurate structured data.</p>
            </div>
        </div>
    </section>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Why Schema Generation Matters</h2>
        <p class="text-gray-700 leading-relaxed">Generating valid Schema.org structured data is crucial for:</p>
        <ul class="list-disc list-inside text-gray-700 mt-2">
            <li>**Enhanced Search Presence:** Qualify for rich snippets, carousels, and other enhanced search features.</li>
            <li>**Improved Understanding:** Help search engines better understand the context and meaning of your content.</li>
            <li>**Higher Click-Through Rates:** Rich snippets often lead to increased visibility and higher CTRs.</li>
            <li>**Future-Proofing:** Stay compliant with evolving search engine guidelines.</li>
        </ul>
    </section>
</div>
@endsection
