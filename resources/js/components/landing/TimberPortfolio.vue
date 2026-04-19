<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useScrollReveal } from '@/composables/useScrollReveal';
import { show as galleryShow } from '@/routes/gallery';

const { scrollRef } = useScrollReveal();

const hoveredIndex = ref<number | null>(null);

interface PortfolioItem {
    title: string;
    slug: string;
    image: string;
}

const portfolioItems: PortfolioItem[] = [
    { title: 'KUCHNIE NA WYMIAR', slug: 'kuchnie', image: '/images/service_01.jpg' },
    { title: 'MEBLE', slug: 'meble', image: '/images/service_02.jpg' },
    { title: 'SCHODY', slug: 'schody', image: '/images/service_03.jpg' },
    { title: 'DRZWI', slug: 'drzwi', image: '/images/service_05.webp' },
    { title: 'INNE', slug: 'inne', image: '/images/service_04.jpg' },
];
</script>

<template>
    <section id="portfolio" class="bg-timber-forest py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div :ref="scrollRef" class="scroll-reveal mb-16 text-center">
                <p
                    class="mb-3 text-sm font-medium tracking-wider text-white/60 uppercase"
                >
                    ESENCJA STOLARSTWA
                </p>
                <h2
                    class="font-timber text-3xl font-bold text-white uppercase lg:text-4xl"
                >
                    ZOBACZ NASZE REALIZACJE
                </h2>
            </div>

            <!-- Mobile: grid layout -->
            <div class="relative z-10 grid grid-cols-1 gap-6 md:grid-cols-2 lg:hidden">
                <Link
                    v-for="(item, index) in portfolioItems"
                    :key="index"
                    :href="galleryShow({ slug: item.slug }).url"
                    class="group relative block aspect-[3/4] cursor-pointer overflow-hidden rounded-xl"
                >
                    <img
                        :src="item.image"
                        :alt="item.title"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    <div
                        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"
                    />
                    <div class="pointer-events-none absolute bottom-4 left-4">
                        <span class="text-lg font-bold text-white">{{
                            item.title
                        }}</span>
                    </div>
                </Link>
            </div>

            <!-- Desktop: flex expand layout -->
            <div
                class="hidden h-[560px] gap-3 lg:flex"
                @mouseleave="hoveredIndex = null"
            >
                <Link
                    v-for="(item, index) in portfolioItems"
                    :key="index"
                    :href="galleryShow({ slug: item.slug }).url"
                    :ref="scrollRef"
                    class="scroll-reveal portfolio-card relative block cursor-pointer overflow-hidden rounded-xl"
                    :class="
                        hoveredIndex === index
                            ? 'portfolio-card--active'
                            : hoveredIndex !== null
                              ? 'portfolio-card--inactive'
                              : ''
                    "
                    @mouseenter="hoveredIndex = index"
                >
                    <img
                        :src="item.image"
                        :alt="item.title"
                        class="h-full w-full object-cover"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent transition-colors duration-500"
                    />

                    <!-- Vertical title (default state) -->
                    <div
                        class="absolute top-4 right-4 transition-all duration-500"
                        :class="
                            hoveredIndex === index ? 'opacity-0' : 'opacity-100'
                        "
                    >
                        <span
                            class="text-lg font-bold tracking-wider text-white uppercase"
                            style="writing-mode: vertical-rl"
                        >
                            {{ item.title }}
                        </span>
                    </div>

                    <!-- Horizontal title (hover state) -->
                    <div
                        class="absolute top-6 left-6 transition-all duration-500"
                        :class="
                            hoveredIndex === index
                                ? 'translate-y-0 opacity-100'
                                : '-translate-y-4 opacity-0'
                        "
                    >
                        <span class="text-2xl font-bold text-white">{{
                            item.title
                        }}</span>
                    </div>

                    <!-- Bottom title -->
                    <div
                        class="absolute bottom-4 left-4 transition-all duration-500"
                        :class="
                            hoveredIndex === index ? 'opacity-100' : 'opacity-0'
                        "
                    >
                        <span
                            class="text-sm tracking-wider text-white/70 uppercase"
                            >Zobacz galerię realizacji</span
                        >
                    </div>
                </Link>
            </div>
        </div>
    </section>
</template>

<style scoped>
.portfolio-card {
    flex: 1 1 0%;
    transition: flex 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.portfolio-card--active {
    flex: 3 1 0%;
}

.portfolio-card--inactive {
    flex: 0.7 1 0%;
}
</style>
