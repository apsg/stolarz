<script setup lang="ts">
import { ref } from 'vue';
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

const hoveredIndex = ref<number | null>(null);

const portfolioItems = [
    {
        title: 'Kitchen Design',
        image: 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80',
    },
    {
        title: 'Custom Furniture',
        image: 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
    },
    {
        title: 'Wooden Stairs',
        image: 'https://images.unsplash.com/photo-1572025442646-866d16c84a54?w=600&q=80',
    },
    {
        title: 'Wood Flooring',
        image: 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=600&q=80',
    },
];
</script>

<template>
    <section id="portfolio" class="bg-timber-forest py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div :ref="scrollRef" class="scroll-reveal mb-12 text-center">
                <p class="mb-3 text-sm font-medium uppercase tracking-wider text-timber-orange">
                    THE POSSIBILITY OF WOOD FORESTRY
                </p>
                <h2 class="font-timber text-3xl font-bold uppercase text-white lg:text-4xl">
                    RESPONSIBLE TIMBER PRODUCTION
                </h2>
            </div>

            <!-- Mobile: grid layout -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:hidden">
                <div
                    v-for="(item, index) in portfolioItems"
                    :key="index"
                    :ref="scrollRef"
                    class="scroll-reveal group relative aspect-[3/4] cursor-pointer overflow-hidden rounded-xl"
                >
                    <img
                        :src="item.image"
                        :alt="item.title"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"
                    />
                    <div class="absolute bottom-4 left-4">
                        <span class="text-lg font-bold text-white">{{ item.title }}</span>
                    </div>
                </div>
            </div>

            <!-- Desktop: flex expand layout -->
            <div
                class="hidden h-[500px] gap-4 lg:flex"
                @mouseleave="hoveredIndex = null"
            >
                <div
                    v-for="(item, index) in portfolioItems"
                    :key="index"
                    :ref="scrollRef"
                    class="scroll-reveal portfolio-card relative cursor-pointer overflow-hidden rounded-xl"
                    :class="hoveredIndex === index ? 'portfolio-card--active' : hoveredIndex !== null ? 'portfolio-card--inactive' : ''"
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
                        class="absolute right-4 top-4 transition-all duration-500"
                        :class="hoveredIndex === index ? 'opacity-0' : 'opacity-100'"
                    >
                        <span
                            class="text-sm font-semibold uppercase tracking-wider text-white/80"
                            style="writing-mode: vertical-rl"
                        >
                            {{ item.title }}
                        </span>
                    </div>

                    <!-- Horizontal title (hover state) -->
                    <div
                        class="absolute left-6 top-6 transition-all duration-500"
                        :class="hoveredIndex === index ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'"
                    >
                        <span class="text-2xl font-bold text-white">{{ item.title }}</span>
                    </div>

                    <!-- Bottom title -->
                    <div
                        class="absolute bottom-4 left-4 transition-all duration-500"
                        :class="hoveredIndex === index ? 'opacity-100' : 'opacity-0'"
                    >
                        <span class="text-sm uppercase tracking-wider text-white/70">View Project</span>
                    </div>
                </div>
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
