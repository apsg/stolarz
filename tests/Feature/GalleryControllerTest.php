<?php

use Inertia\Testing\AssertableInertia as Assert;

test('valid gallery slug renders the Gallery/Show page', function () {
    $response = $this->get(route('gallery.show', ['slug' => 'kuchnie']));

    $response->assertOk();
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Gallery/Show')
        ->where('category.slug', 'kuchnie')
        ->where('category.title', 'Kuchnie')
        ->has('categories', 5)
        ->has('images')
    );
});

test('invalid gallery slug returns 404', function () {
    $this->get('/galeria/nie-istnieje')->assertNotFound();
});

test('images list matches files present on disk', function () {
    $directory = public_path('gallery/kuchnie');

    if (! is_dir($directory)) {
        $this->markTestSkipped('Gallery directory for kuchnie does not exist.');
    }

    $expectedCount = count(array_filter(
        scandir($directory) ?: [],
        fn (string $f) => in_array(
            strtolower(pathinfo($f, PATHINFO_EXTENSION)),
            ['webp', 'jpg', 'jpeg', 'png'],
            true,
        ),
    ));

    $response = $this->get(route('gallery.show', ['slug' => 'kuchnie']));

    $response->assertInertia(fn (Assert $page) => $page
        ->has('images', $expectedCount)
    );
});

test('each category slug resolves successfully', function (string $slug) {
    $this->get(route('gallery.show', ['slug' => $slug]))->assertOk();
})->with(['kuchnie', 'meble', 'schody', 'drzwi', 'inne']);
