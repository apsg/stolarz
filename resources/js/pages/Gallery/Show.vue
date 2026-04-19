<script setup lang="ts">
import { computed, ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import TimberHeader from '@/components/landing/TimberHeader.vue';
import TimberFooter from '@/components/landing/TimberFooter.vue';
import GalleryLightbox from '@/components/gallery/GalleryLightbox.vue';
import { show as galleryShow } from '@/routes/gallery';
import { home } from '@/routes';

interface GalleryImage {
    url: string;
    filename: string;
}

interface Category {
    slug: string;
    title: string;
}

const props = defineProps<{
    category: Category;
    categories: Record<string, string>;
    images: GalleryImage[];
}>();

const categoryList = computed(() =>
    Object.entries(props.categories).map(([slug, title]) => ({ slug, title })),
);

const lightboxOpen = ref(false);
const lightboxIndex = ref(0);

function openLightbox(index: number): void {
    lightboxIndex.value = index;
    lightboxOpen.value = true;
}

function closeLightbox(): void {
    lightboxOpen.value = false;
}
</script>

<template>
    <Head :title="`Galeria ${category.title} — Stolarz Piotr Jędrzejewski`">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="anonymous"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="font-timber bg-timber-cream text-timber-charcoal">
        <TimberHeader />

        <section class="bg-timber-forest pt-32 pb-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <nav
                    class="mb-6 flex items-center gap-2 text-xs tracking-widest text-white/60 uppercase"
                    aria-label="Breadcrumb"
                >
                    <Link
                        :href="home().url"
                        class="transition-colors hover:text-timber-orange"
                    >
                        Start
                    </Link>
                    <span>/</span>
                    <span class="text-white/40">Galeria</span>
                    <span>/</span>
                    <span class="text-white">{{ category.title }}</span>
                </nav>
                <p
                    class="mb-3 text-sm font-medium tracking-wider text-white/60 uppercase"
                >
                    Nasze realizacje
                </p>
                <h1
                    class="font-timber text-4xl font-bold text-white uppercase lg:text-6xl"
                >
                    {{ category.title }}
                </h1>

                <div class="mt-10 flex flex-wrap gap-2">
                    <Link
                        v-for="item in categoryList"
                        :key="item.slug"
                        :href="galleryShow({ slug: item.slug }).url"
                        class="rounded-full px-5 py-2 text-xs font-medium tracking-widest uppercase transition-colors"
                        :class="
                            item.slug === category.slug
                                ? 'bg-timber-orange text-white'
                                : 'bg-white/10 text-white/80 hover:bg-white/20 hover:text-white'
                        "
                    >
                        {{ item.title }}
                    </Link>
                </div>
            </div>
        </section>

        <section class="bg-timber-cream py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    v-if="images.length === 0"
                    class="rounded-xl border border-dashed border-timber-charcoal/20 py-24 text-center"
                >
                    <p
                        class="text-sm tracking-widest text-timber-charcoal/60 uppercase"
                    >
                        Galeria w przygotowaniu
                    </p>
                    <p class="mt-2 text-timber-charcoal/80">
                        Zdjęcia tej kategorii pojawią się wkrótce.
                    </p>
                </div>

                <div
                    v-else
                    class="gap-4 [column-fill:_balance] sm:columns-2 lg:columns-3 xl:columns-4"
                >
                    <button
                        v-for="(image, index) in images"
                        :key="image.url"
                        type="button"
                        class="group mb-4 block w-full overflow-hidden rounded-xl bg-timber-charcoal/5 focus:outline-none focus-visible:ring-2 focus-visible:ring-timber-orange"
                        @click="openLightbox(index)"
                    >
                        <img
                            :src="image.url"
                            :alt="`${category.title} — realizacja ${index + 1}`"
                            loading="lazy"
                            decoding="async"
                            class="h-auto w-full transition-transform duration-500 group-hover:scale-105"
                        />
                    </button>
                </div>
            </div>
        </section>

        <TimberFooter />

        <GalleryLightbox
            :images="images"
            :open="lightboxOpen"
            :start-index="lightboxIndex"
            @close="closeLightbox"
        />
    </div>
</template>
