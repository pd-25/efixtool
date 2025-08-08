document.addEventListener('DOMContentLoaded', () => {
    const schemaInput = document.getElementById('schemaInput');
    const urlInput = document.getElementById('urlInput');
    const validateSchemaBtn = document.getElementById('validateSchemaBtn');
    const clearSchemaBtn = document.getElementById('clearSchemaBtn');
    const analyzeUrlBtn = document.getElementById('analyzeUrlBtn');
    const validationResults = document.getElementById('validationResults');
    const resultsContent = document.getElementById('resultsContent');
    const loader = document.getElementById('loader');

    // Function to display results
    const displayResults = (data) => {
        validationResults.classList.remove('hidden');
        resultsContent.innerHTML = ''; // Clear previous results

        if (data.errors && data.errors.length > 0) {
            resultsContent.innerHTML += `<p class="text-red-600 font-semibold">Errors Found:</p>`;
            data.errors.forEach(error => {
                resultsContent.innerHTML += `<p class="text-red-600">- ${error}</p>`;
            });
        } else {
            resultsContent.innerHTML += `<p class="text-green-600 font-semibold">No errors found. Schema is valid!</p>`;
        }

        if (data.warnings && data.warnings.length > 0) {
            resultsContent.innerHTML += `<p class="text-yellow-600 font-semibold mt-4">Warnings:</p>`;
            data.warnings.forEach(warning => {
                resultsContent.innerHTML += `<p class="text-yellow-600">- ${warning}</p>`;
            });
        }

        if (data.extractedSchema) {
            resultsContent.innerHTML += `<p class="font-semibold mt-4">Extracted Schema:</p>`;
            resultsContent.innerHTML += `<pre class="bg-gray-100 p-3 rounded-lg text-sm overflow-auto"><code>${JSON.stringify(data.extractedSchema, null, 2)}</code></pre>`;
        }
    };

    // Validate Schema Button Click
    validateSchemaBtn.addEventListener('click', async () => {
        const schemaText = schemaInput.value.trim();
        if (!schemaText) {
            alert('Please paste schema markup to validate.');
            return;
        }

        loader.classList.remove('hidden');
        validationResults.classList.add('hidden');

        try {
            const response = await fetch('/api/validate-schema', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ schema: schemaText })
            });

            const data = await response.json();
            displayResults(data);
        } catch (error) {
            resultsContent.innerHTML = `<p class="text-red-600">An error occurred during validation: ${error.message}</p>`;
            validationResults.classList.remove('hidden');
        } finally {
            loader.classList.add('hidden');
        }
    });

    // Analyze URL Button Click
    analyzeUrlBtn.addEventListener('click', async () => {
        const url = urlInput.value.trim();
        if (!url) {
            alert('Please enter a URL to analyze.');
            return;
        }

        loader.classList.remove('hidden');
        validationResults.classList.add('hidden');

        try {
            const response = await fetch('/api/analyze-url', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ url: url })
            });

            const data = await response.json();
            displayResults(data);
        } catch (error) {
            resultsContent.innerHTML = `<p class="text-red-600">An error occurred during URL analysis: ${error.message}</p>`;
            validationResults.classList.remove('hidden');
        } finally {
            loader.classList.add('hidden');
        }
    });

    // Clear Button Click
    clearSchemaBtn.addEventListener('click', () => {
        schemaInput.value = '';
        urlInput.value = '';
        validationResults.classList.add('hidden');
        resultsContent.innerHTML = '';
    });
});
