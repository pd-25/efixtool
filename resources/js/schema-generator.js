document.addEventListener('DOMContentLoaded', () => {
    const schemaTypeSelect = document.getElementById('schemaType');
    const schemaForm = document.getElementById('schemaForm');
    const generateSchemaBtn = document.getElementById('generateSchemaBtn');
    const copySchemaBtn = document.getElementById('copySchemaBtn');
    const clearSchemaBtn = document.getElementById('clearSchemaBtn');
    const schemaOutput = document.getElementById('schemaOutput');

    const commonFields = [
        { id: 'name', label: 'Name:', type: 'text', required: true },
        { id: 'url', label: 'URL:', type: 'url', required: true },
        { id: 'description', label: 'Description:', type: 'textarea', required: false },
    ];

    const schemaSpecificFields = {
        Article: [
            { id: 'mainEntityOfPage', label: 'Main Entity Of Page URL:', type: 'url', required: false },
            { id: 'headline', label: 'Headline:', type: 'text', required: true },
            { id: 'image', label: 'Image URL:', type: 'url', required: false },
            { id: 'author', label: 'Author Name:', type: 'text', required: false },
            { id: 'publisher', label: 'Publisher Name:', type: 'text', required: false },
            { id: 'publisherLogo', label: 'Publisher Logo URL:', type: 'url', required: false },
            { id: 'datePublished', label: 'Date Published:', type: 'date', required: true },
            { id: 'dateModified', label: 'Date Modified:', type: 'date', required: false },
            { id: 'articleBody', label: 'Article Body:', type: 'textarea', required: false },
            { id: 'keywords', label: 'Keywords (comma-separated):', type: 'text', required: false },
        ],
        WebPage: [
            { id: 'breadcrumb', label: 'Breadcrumb (e.g., Home > Category > Page):', type: 'text', required: false },
            { id: 'mainContentOfPage', label: 'Main Content Of Page URL:', type: 'url', required: false },
            { id: 'lastReviewed', label: 'Last Reviewed Date:', type: 'date', required: false },
            { id: 'datePublished', label: 'Date Published:', type: 'date', required: false },
            { id: 'dateModified', label: 'Date Modified:', type: 'date', required: false },
            { id: 'about', label: 'About (Topic):', type: 'text', required: false },
            { id: 'primaryImageOfPage', label: 'Primary Image Of Page URL:', type: 'url', required: false },
        ],
        FAQPage: [
            { id: 'faqs', label: 'FAQs (Question::Answer, one per line):', type: 'textarea', required: true },
        ],
        Person: [
            { id: 'alternateName', label: 'Alternate Name:', type: 'text', required: false },
            { id: 'image', label: 'Image URL:', type: 'url', required: false },
            { id: 'sameAs', label: 'Same As (URL, comma-separated):', type: 'text', required: false },
            { id: 'jobTitle', label: 'Job Title:', type: 'text', required: false },
            { id: 'worksFor', label: 'Works For (Organization Name):', type: 'text', required: false },
            { id: 'affiliation', label: 'Affiliation (Organization Name):', type: 'text', required: false },
            { id: 'birthDate', label: 'Birth Date:', type: 'date', required: false },
            { id: 'address', label: 'Address:', type: 'text', required: false },
            { id: 'email', label: 'Email:', type: 'email', required: false },
            { id: 'telephone', label: 'Telephone:', type: 'tel', required: false },
        ],
        Organization: [
            { id: 'alternateName', label: 'Alternate Name:', type: 'text', required: false },
            { id: 'logo', label: 'Logo URL:', type: 'url', required: false },
            { id: 'sameAs', label: 'Same As (URL, comma-separated):', type: 'text', required: false },
            { id: 'contactPointTelephone', label: 'Contact Telephone:', type: 'tel', required: false },
            { id: 'contactPointType', label: 'Contact Type:', type: 'text', required: false },
            { id: 'contactPointEmail', label: 'Contact Email:', type: 'email', required: false },
            { id: 'address', label: 'Address:', type: 'text', required: false },
            { id: 'foundingDate', label: 'Founding Date:', type: 'date', required: false },
            { id: 'founder', label: 'Founder Name:', type: 'text', required: false },
        ],
        LocalBusiness: [
            { id: 'image', label: 'Image URL:', type: 'url', required: false },
            { id: 'telephone', label: 'Telephone:', type: 'tel', required: false },
            { id: 'address', label: 'Address:', type: 'text', required: true },
            { id: 'geo', label: 'Geo (Latitude,Longitude):', type: 'text', required: false },
            { id: 'openingHours', label: 'Opening Hours (e.g., Mo-Fr 09:00-17:00):', type: 'text', required: false },
            { id: 'priceRange', label: 'Price Range:', type: 'text', required: false },
            { id: 'sameAs', label: 'Same As (URL, comma-separated):', type: 'text', required: false },
            { id: 'menu', label: 'Menu URL:', type: 'url', required: false },
            { id: 'servesCuisine', label: 'Serves Cuisine (e.g., Italian, Mexican):', type: 'text', required: false },
        ],
        Product: [
            { id: 'image', label: 'Image URL:', type: 'url', required: false },
            { id: 'sku', label: 'SKU:', type: 'text', required: false },
            { id: 'brand', label: 'Brand:', type: 'text', required: true },
            { id: 'category', label: 'Category:', type: 'text', required: false },
            { id: 'gtin8', label: 'GTIN8:', type: 'text', required: false },
            { id: 'gtin13', label: 'GTIN13:', type: 'text', required: false },
            { id: 'gtin14', label: 'GTIN14:', type: 'text', required: false },
            { id: 'mpn', label: 'MPN:', type: 'text', required: false },
            { id: 'offersPrice', label: 'Offer Price:', type: 'number', required: true },
            { id: 'offersPriceCurrency', label: 'Offer Currency (e.g., USD):', type: 'text', required: true },
            { id: 'offersAvailability', label: 'Offer Availability (e.g., InStock):', type: 'select', options: ['InStock', 'OutOfStock', 'PreOrder', 'Discontinued', 'LimitedAvailability', 'OnlineOnly', 'SoldOut'], required: true },
            { id: 'offersUrl', label: 'Offer URL:', type: 'url', required: false },
            { id: 'itemCondition', label: 'Item Condition (e.g., NewCondition):', type: 'select', options: ['NewCondition', 'UsedCondition', 'DamagedCondition', 'RefurbishedCondition'], required: false },
        ],
        Event: [
            { id: 'image', label: 'Image URL:', type: 'url', required: false },
            { id: 'startDate', label: 'Start Date:', type: 'datetime-local', required: true },
            { id: 'endDate', label: 'End Date:', type: 'datetime-local', required: false },
            { id: 'eventStatus', label: 'Event Status (e.g., EventScheduled):', type: 'select', options: ['EventScheduled', 'EventCancelled', 'EventPostponed', 'EventRescheduled'], required: true },
            { id: 'eventAttendanceMode', label: 'Event Attendance Mode (e.g., OnlineEventAttendanceMode):', type: 'select', options: ['OnlineEventAttendanceMode', 'OfflineEventAttendanceMode', 'MixedEventAttendanceMode'], required: false },
            { id: 'locationName', label: 'Location Name:', type: 'text', required: true },
            { id: 'locationAddress', label: 'Location Address:', type: 'text', required: true },
            { id: 'organizer', label: 'Organizer Name:', type: 'text', required: false },
            { id: 'offersPrice', label: 'Offer Price:', type: 'number', required: false },
            { id: 'offersPriceCurrency', label: 'Offer Currency (e.g., USD):', type: 'text', required: false },
            { id: 'offersAvailability', label: 'Offer Availability (e.g., InStock):', type: 'select', options: ['InStock', 'OutOfStock', 'PreOrder'], required: false },
        ],
        Recipe: [
            { id: 'image', label: 'Image URL:', type: 'url', required: false },
            { id: 'author', label: 'Author Name:', type: 'text', required: false },
            { id: 'prepTime', label: 'Prep Time (e.g., PT20M):', type: 'text', required: false },
            { id: 'cookTime', label: 'Cook Time (e.g., PT30M):', type: 'text', required: false },
            { id: 'totalTime', label: 'Total Time (e.g., PT50M):', type: 'text', required: true },
            { id: 'recipeYield', label: 'Recipe Yield:', type: 'text', required: false },
            { id: 'recipeCategory', label: 'Recipe Category (e.g., Dessert):', type: 'text', required: false },
            { id: 'recipeCuisine', label: 'Recipe Cuisine (e.g., Italian):', type: 'text', required: false },
            { id: 'keywords', label: 'Keywords (comma-separated):', type: 'text', required: false },
            { id: 'recipeIngredient', label: 'Ingredients (one per line):', type: 'textarea', required: true },
            { id: 'recipeInstructions', label: 'Instructions (one step per line):', type: 'textarea', required: true },
            { id: 'nutritionCalories', label: 'Nutrition Calories:', type: 'text', required: false },
        ],
        BreadcrumbList: [
            { id: 'itemListElement', label: 'Breadcrumb Items (Position::Name::URL, one per line):', type: 'textarea', required: true },
        ],
        Review: [
            { id: 'itemReviewedName', label: 'Item Reviewed Name:', type: 'text', required: true },
            { id: 'reviewRating', label: 'Review Rating (1-5):', type: 'number', min: 1, max: 5, required: true },
            { id: 'reviewBody', label: 'Review Body:', type: 'textarea', required: false },
            { id: 'authorName', label: 'Author Name:', type: 'text', required: true },
            { id: 'datePublished', label: 'Date Published:', type: 'date', required: true },
        ],
        Service: [
            { id: 'serviceType', label: 'Service Type:', type: 'text', required: true },
            { id: 'areaServed', label: 'Area Served (e.g., "New York", "Worldwide"):', type: 'text', required: false },
            { id: 'providerName', label: 'Provider Name:', type: 'text', required: true },
            { id: 'providerUrl', label: 'Provider URL:', type: 'url', required: false },
        ],
    };

    function renderFormFields(schemaType) {
        const dynamicFieldsContainer = document.querySelector('#schemaForm .grid');
        // Clear previous dynamic fields, but keep common fields
        Array.from(dynamicFieldsContainer.children).forEach(child => {
            if (!['nameField', 'urlField', 'descriptionField', 'schemaTypeField'].includes(child.id)) {
                child.remove();
            }
        });

        const fieldsToRender = schemaSpecificFields[schemaType] || [];

        fieldsToRender.forEach(field => {
            const div = document.createElement('div');
            div.id = `${field.id}Field`;
            const label = document.createElement('label');
            label.htmlFor = field.id;
            label.className = 'block text-sm font-medium text-gray-700';
            label.textContent = field.label;
            if (field.required) {
                label.textContent += ' *';
            }

            let inputElement;
            if (field.type === 'textarea') {
                inputElement = document.createElement('textarea');
                inputElement.rows = 3;
            } else if (field.type === 'select') {
                inputElement = document.createElement('select');
                field.options.forEach(optionValue => {
                    const option = document.createElement('option');
                    option.value = optionValue;
                    option.textContent = optionValue.replace(/([A-Z])/g, ' $1').trim(); // Make it more readable
                    inputElement.appendChild(option);
                });
            } else {
                inputElement = document.createElement('input');
                inputElement.type = field.type;
                if (field.type === 'number') {
                    if (field.min !== undefined) inputElement.min = field.min;
                    if (field.max !== undefined) inputElement.max = field.max;
                }
            }
            inputElement.id = field.id;
            inputElement.className = 'mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500';
            if (field.required) {
                inputElement.required = true;
            }

            div.appendChild(label);
            div.appendChild(inputElement);
            dynamicFieldsContainer.appendChild(div);
        });
    }

    function generateSchema() {
        const schemaType = schemaTypeSelect.value;
        const schema = {
            "@context": "https://schema.org",
            "@type": schemaType,
        };

        const allFields = [...commonFields, ...(schemaSpecificFields[schemaType] || [])];

        let isValid = true;
        allFields.forEach(field => {
            const inputElement = document.getElementById(field.id);
            if (inputElement) {
                let value = inputElement.value.trim();

                if (field.required && !value) {
                    isValid = false;
                    inputElement.classList.add('border-red-500');
                    inputElement.placeholder = 'This field is required!';
                    return;
                } else {
                    inputElement.classList.remove('border-red-500');
                    inputElement.placeholder = '';
                }

                if (value) {
                    if (field.id === 'ingredients' || field.id === 'instructions' || field.id === 'recipeIngredient' || field.id === 'recipeInstructions') {
                        schema[field.id] = value.split('\n').filter(line => line.trim() !== '');
                    } else if (field.id === 'faqs') {
                        schema.mainEntity = value.split('\n').filter(line => line.trim() !== '').map(faq => {
                            const parts = faq.split('::');
                            if (parts.length === 2) {
                                return {
                                    "@type": "Question",
                                    "name": parts[0].trim(),
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": parts[1].trim()
                                    }
                                };
                            }
                            return null;
                        }).filter(item => item !== null);
                    } else if (field.id === 'itemListElement') {
                        schema.itemListElement = value.split('\n').filter(line => line.trim() !== '').map((item, index) => {
                            const parts = item.split('::');
                            if (parts.length === 3) {
                                return {
                                    "@type": "ListItem",
                                    "position": parseInt(parts[0].trim()),
                                    "name": parts[1].trim(),
                                    "item": parts[2].trim()
                                };
                            }
                            return null;
                        }).filter(item => item !== null);
                    } else if (field.id === 'aggregateRating' || field.id === 'reviewCount' || field.id === 'offersPrice' || field.id === 'ticketPrice' || field.id === 'reviewRating') {
                        schema[field.id] = parseFloat(value);
                    } else if (field.id === 'datePublished' || field.id === 'dateModified' || field.id === 'startDate' || field.id === 'endDate' || field.id === 'foundingDate' || field.id === 'birthDate' || field.id === 'lastReviewed') {
                        schema[field.id] = new Date(value).toISOString();
                    } else if (field.id === 'image' || field.id === 'publisherLogo' || field.id === 'logo' || field.id === 'providerUrl' || field.id === 'mainEntityOfPage' || field.id === 'mainContentOfPage' || field.id === 'primaryImageOfPage' || field.id === 'menu') {
                        schema[field.id] = { "@type": "ImageObject", "url": value };
                        if (field.id === 'mainEntityOfPage' || field.id === 'mainContentOfPage' || field.id === 'menu') {
                            schema[field.id] = value; // These are URLs, not ImageObjects
                        }
                    } else if (field.id === 'author') {
                        schema.author = { "@type": "Person", "name": value };
                    } else if (field.id === 'publisher') {
                        schema.publisher = { "@type": "Organization", "name": value };
                    } else if (field.id === 'locationName' || field.id === 'locationAddress') {
                        if (!schema.location) schema.location = { "@type": "Place" };
                        if (field.id === 'locationName') schema.location.name = value;
                        if (field.id === 'locationAddress') schema.location.address = { "@type": "PostalAddress", "streetAddress": value };
                    } else if (field.id === 'performer') {
                        schema.performer = { "@type": "Person", "name": value };
                    } else if (field.id === 'contactPointTelephone' || field.id === 'contactPointEmail' || field.id === 'contactPointType') {
                        if (!schema.contactPoint) schema.contactPoint = { "@type": "ContactPoint" };
                        if (field.id === 'contactPointTelephone') schema.contactPoint.telephone = value;
                        if (field.id === 'contactPointEmail') schema.contactPoint.email = value;
                        if (field.id === 'contactPointType') schema.contactPoint.contactType = value;
                    } else if (field.id === 'itemReviewedName') {
                        schema.itemReviewed = { "@type": "Thing", "name": value };
                    } else if (field.id === 'authorName') {
                        schema.author = { "@type": "Person", "name": value };
                    } else if (field.id === 'offersAvailability') {
                        if (!schema.offers) schema.offers = { "@type": "Offer" };
                        schema.offers.availability = `https://schema.org/${value}`;
                    } else if (field.id === 'offersPrice' || field.id === 'offersPriceCurrency' || field.id === 'offersUrl' || field.id === 'itemCondition') {
                        if (!schema.offers) schema.offers = { "@type": "Offer" };
                        if (field.id === 'offersPrice') schema.offers.price = parseFloat(value);
                        if (field.id === 'offersPriceCurrency') schema.offers.priceCurrency = value;
                        if (field.id === 'offersUrl') schema.offers.url = value;
                        if (field.id === 'itemCondition') schema.offers.itemCondition = `https://schema.org/${value}`;
                    } else if (field.id === 'nutritionCalories') {
                        if (!schema.nutrition) schema.nutrition = { "@type": "NutritionInformation" };
                        schema.nutrition.calories = value;
                    } else if (field.id === 'providerName' || field.id === 'providerUrl') {
                        if (!schema.provider) schema.provider = { "@type": "Organization" };
                        if (field.id === 'providerName') schema.provider.name = value;
                        if (field.id === 'providerUrl') schema.provider.url = value;
                    } else if (field.id === 'geo') {
                        const coords = value.split(',').map(c => parseFloat(c.trim()));
                        if (coords.length === 2 && !isNaN(coords[0]) && !isNaN(coords[1])) {
                            schema.geo = { "@type": "GeoCoordinates", "latitude": coords[0], "longitude": coords[1] };
                        }
                    } else if (field.id === 'sameAs' || field.id === 'keywords') {
                        schema[field.id] = value.split(',').map(item => item.trim()).filter(item => item !== '');
                    } else if (field.id === 'worksFor' || field.id === 'affiliation' || field.id === 'organizer' || field.id === 'founder') {
                        schema[field.id] = { "@type": "Organization", "name": value };
                    } else if (field.id === 'eventAttendanceMode') {
                        schema[field.id] = `https://schema.org/${value}`;
                    } else if (field.id === 'eventStatus') {
                        schema[field.id] = `https://schema.org/${value}`;
                    } else {
                        schema[field.id] = value;
                    }
                }
            }
        });

        if (isValid) {
            schemaOutput.value = JSON.stringify(schema, null, 2);
        } else {
            schemaOutput.value = 'Please fill in all required fields.';
        }
    }

    function copySchema() {
        schemaOutput.select();
        document.execCommand('copy');
        alert('Schema copied to clipboard!');
    }

    function clearForm() {
        const allInputs = schemaForm.querySelectorAll('input, textarea, select');
        allInputs.forEach(input => {
            input.value = '';
            input.classList.remove('border-red-500');
            input.placeholder = '';
        });
        schemaOutput.value = '';
        renderFormFields(schemaTypeSelect.value); // Re-render to reset dynamic fields
    }

    schemaTypeSelect.addEventListener('change', (event) => {
        renderFormFields(event.target.value);
    });

    generateSchemaBtn.addEventListener('click', generateSchema);
    copySchemaBtn.addEventListener('click', copySchema);
    clearSchemaBtn.addEventListener('click', clearForm);

    // Initial render
    renderFormFields(schemaTypeSelect.value);
});
