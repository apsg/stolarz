<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{
    /**
     * @var array<string, string>
     */
    private const CATEGORIES = [
        'kuchnie' => 'Kuchnie',
        'meble' => 'Meble',
        'schody' => 'Schody',
        'drzwi' => 'Drzwi',
        'inne' => 'Inne',
    ];

    /**
     * @var array<int, string>
     */
    private const ALLOWED_EXTENSIONS = ['webp', 'jpg', 'jpeg', 'png'];

    public function show(string $slug): Response
    {
        abort_unless(array_key_exists($slug, self::CATEGORIES), 404);

        return Inertia::render('Gallery/Show', [
            'category' => [
                'slug' => $slug,
                'title' => self::CATEGORIES[$slug],
            ],
            'categories' => self::CATEGORIES,
            'images' => $this->listImages($slug),
        ]);
    }

    /**
     * @return array<int, array{url: string, filename: string}>
     */
    private function listImages(string $slug): array
    {
        $directory = public_path("gallery/{$slug}");

        if (! is_dir($directory)) {
            return [];
        }

        $filenames = array_values(array_filter(
            scandir($directory) ?: [],
            function (string $filename) use ($directory): bool {
                if ($filename === '.' || $filename === '..') {
                    return false;
                }
                if (! is_file("{$directory}/{$filename}")) {
                    return false;
                }
                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                return in_array($extension, self::ALLOWED_EXTENSIONS, true);
            }
        ));

        natcasesort($filenames);

        return array_values(array_map(
            fn (string $filename): array => [
                'url' => "/gallery/{$slug}/{$filename}",
                'filename' => $filename,
            ],
            $filenames
        ));
    }
}
