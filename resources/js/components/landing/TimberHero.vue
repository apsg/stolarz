<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import { Play } from 'lucide-vue-next'

interface Slide {
    subtitle: string
    heading: string
    image: string
}

const slides: Slide[] = [
    {
        subtitle: 'WELCOME TO TIMBER',
        heading: 'CRAFTING WOOD INTO ART',
        image: 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=1920&q=80',
    },
    {
        subtitle: 'SUSTAINABLE FORESTRY',
        heading: 'RESPONSIBLE TIMBER PRODUCTION',
        image: 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?w=1920&q=80',
    },
    {
        subtitle: 'EXPERT CRAFTSMEN',
        heading: 'DECADES OF WOODWORKING MASTERY',
        image: 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=1920&q=80',
    },
    {
        subtitle: 'CUSTOM DESIGNS',
        heading: 'YOUR VISION, OUR EXPERTISE',
        image: 'https://images.unsplash.com/photo-1610505466183-8c4ff4b4c3c1?w=1920&q=80',
    },
    {
        subtitle: 'PREMIUM QUALITY',
        heading: 'FINEST MATERIALS, FINEST RESULTS',
        image: 'https://images.unsplash.com/photo-1541123603104-512919d6a96c?w=1920&q=80',
    },
]

const currentSlide = ref(0)
let interval: ReturnType<typeof setInterval> | null = null

function goToSlide(index: number): void {
    currentSlide.value = index
    resetInterval()
}

function resetInterval(): void {
    if (interval) {
        clearInterval(interval)
    }
    interval = setInterval(() => {
        currentSlide.value = (currentSlide.value + 1) % slides.length
    }, 6000)
}

onMounted(() => {
    resetInterval()
})

onUnmounted(() => {
    if (interval) {
        clearInterval(interval)
    }
})
</script>

<template>
    <section class="relative min-h-screen overflow-hidden">
        <div
            v-for="(slide, index) in slides"
            :key="index"
            class="absolute inset-0 transition-opacity duration-700"
            :class="index === currentSlide ? 'opacity-100 z-10' : 'opacity-0 z-0'"
        >
            <img
                :src="slide.image"
                :alt="slide.heading"
                class="h-full w-full object-cover"
            />
            <div class="absolute inset-0 bg-black/50" />
        </div>

        <div class="relative z-20 flex min-h-screen items-center">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="mb-4 text-sm font-medium uppercase tracking-widest text-timber-orange">
                        {{ slides[currentSlide].subtitle }}
                    </p>
                    <h1 class="font-timber mb-6 text-4xl font-bold uppercase leading-tight text-white md:text-5xl lg:text-6xl">
                        {{ slides[currentSlide].heading }}
                    </h1>
                    <div class="flex flex-wrap gap-4">
                        <a
                            href="#about"
                            class="rounded-full bg-timber-orange px-8 py-3 text-sm font-semibold uppercase tracking-wider text-white transition-colors hover:bg-timber-orange-hover"
                        >
                            READ MORE
                        </a>
                        <button
                            class="flex items-center gap-2 rounded-full border-2 border-white px-8 py-3 text-sm font-semibold uppercase tracking-wider text-white transition-colors hover:bg-white/10"
                        >
                            <Play :size="16" class="fill-white" />
                            VIDEO TOUR
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute right-6 top-1/2 z-20 flex -translate-y-1/2 flex-col gap-3">
            <button
                v-for="(slide, index) in slides"
                :key="index"
                class="block size-3 rounded-full border-2 border-white transition-all"
                :class="index === currentSlide ? 'bg-timber-orange border-timber-orange scale-125' : 'bg-transparent'"
                :aria-label="`Go to slide ${index + 1}`"
                @click="goToSlide(index)"
            />
        </div>
    </section>
</template>
