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
        subtitle: 'Project planning that respects material properties',
        heading: 'CARPENTRY AND JOINERY SERVICES',
        image: 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=1920&q=80',
    },
    {
        subtitle: 'Craftsmanship meets modern technology',
        heading: 'CUSTOM FURNITURE DESIGN',
        image: 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?w=1920&q=80',
    },
    {
        subtitle: 'Sustainable sourcing for lasting results',
        heading: 'RESPONSIBLE TIMBER PRODUCTION',
        image: 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=1920&q=80',
    },
    {
        subtitle: 'Expert artisans dedicated to quality',
        heading: 'PREMIUM WOODWORK SOLUTIONS',
        image: 'https://images.unsplash.com/photo-1610505466183-8c4ff4b4c3c1?w=1920&q=80',
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
    }, 8000)
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
            <div
                class="absolute inset-0 bg-cover bg-center"
                :style="{ backgroundImage: `url('${slide.image}')` }"
                :class="index === currentSlide ? 'ken-burns-active' : ''"
            />
            <div class="absolute inset-0 bg-black/70" />
        </div>

        <div class="relative z-20 flex min-h-screen items-center">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="relative" style="min-height: 220px">
                    <Transition
                        enter-active-class="transition duration-700 ease-out"
                        enter-from-class="opacity-0 translate-y-8"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition duration-300 ease-in"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 translate-y-4"
                    >
                        <div :key="currentSlide" class="absolute inset-0 max-w-2xl">
                        <p class="mb-4 text-sm font-medium uppercase tracking-widest text-timber-orange">
                            {{ slides[currentSlide].subtitle }}
                        </p>
                        <h1 class="font-timber mb-6 text-4xl font-bold uppercase leading-tight text-white md:text-5xl lg:text-6xl">
                            {{ slides[currentSlide].heading }}
                        </h1>
                        <div class="flex flex-wrap gap-4">
                            <a
                                href="#about"
                                class="rounded-full bg-timber-terracotta px-8 py-3 text-sm font-semibold uppercase tracking-wider text-white transition-colors hover:bg-timber-terracotta-hover"
                            >
                                READ MORE
                            </a>
                            <button
                                class="flex items-center gap-2 rounded-full border-2 border-white px-8 py-3 text-sm font-semibold uppercase tracking-wider text-white transition-colors hover:bg-white/10"
                            >
                                <Play :size="16" class="fill-white" />
                                CARPENTRY VIDEO TOUR
                            </button>
                        </div>
                    </div>
                    </Transition>
                </div>
            </div>
        </div>

        <div class="absolute right-6 top-1/2 z-20 flex -translate-y-1/2 flex-col gap-3">
            <button
                v-for="(slide, index) in slides"
                :key="index"
                class="block size-2 rounded-full border-2 border-white transition-all"
                :class="index === currentSlide ? 'bg-timber-terracotta border-timber-terracotta' : 'bg-transparent'"
                :aria-label="`Go to slide ${index + 1}`"
                @click="goToSlide(index)"
            />
        </div>
    </section>
</template>

<style scoped>
@keyframes kenBurns {
    from {
        transform: scale(1.0);
    }
    to {
        transform: scale(1.15);
    }
}

.ken-burns-active {
    animation: kenBurns 8000ms ease-out forwards;
}
</style>
