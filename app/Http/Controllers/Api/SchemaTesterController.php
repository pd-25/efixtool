<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SchemaTesterController extends Controller
{
    public function validateSchema(Request $request)
    {
        $schema = $request->input('schema');
        $errors = [];
        $warnings = [];
        $extractedSchema = null;

        // Basic JSON validation
        json_decode($schema);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $errors[] = 'Invalid JSON format: ' . json_last_error_msg();
        } else {
            $extractedSchema = json_decode($schema, true);
            // Further schema validation logic would go here (e.g., against Schema.org types)
            // For now, we'll just assume valid JSON is a good start.
        }

        return response()->json([
            'errors' => $errors,
            'warnings' => $warnings,
            'extractedSchema' => $extractedSchema,
        ]);
    }

    public function analyzeUrl(Request $request)
    {
        $url = $request->input('url');
        $errors = [];
        $warnings = [];
        $extractedSchema = null;

        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $html = $response->body();

                // Simple regex to find JSON-LD script tags
                preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $html, $matches);

                if (!empty($matches[1])) {
                    foreach ($matches[1] as $jsonLd) {
                        $decodedJson = json_decode($jsonLd, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $extractedSchema = $decodedJson;
                            // For simplicity, we'll take the first valid JSON-LD found
                            break; 
                        } else {
                            $warnings[] = 'Found JSON-LD script tag with invalid JSON: ' . json_last_error_msg();
                        }
                    }
                } else {
                    $warnings[] = 'No JSON-LD structured data found on the page.';
                }

                if (!$extractedSchema && empty($errors)) {
                    $errors[] = 'Could not extract valid structured data from the URL.';
                }
            } else {
                $errors[] = 'Failed to fetch URL. HTTP Status: ' . $response->status();
            }

        } catch (\Exception $e) {
            $errors[] = 'An exception occurred: ' . $e->getMessage();
        }

        return response()->json([
            'errors' => $errors,
            'warnings' => $warnings,
            'extractedSchema' => $extractedSchema,
        ]);
    }
}
