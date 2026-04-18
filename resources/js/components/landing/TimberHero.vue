<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import { Play } from 'lucide-vue-next';

interface Slide {
    subtitle: string;
    heading: string;
    image: string;
}

const slides: Slide[] = [
    {
        subtitle: 'Tradycyjne oraz nowoczesne schody drewniane',
        heading: 'SCHODY',
        image: '/images/schody.webp',
    },
    {
        subtitle: 'Drzwi wewnętrzne i wejściowe',
        heading: 'DRZWI',
        image: '/images/drzwi.webp',
    },
    {
        subtitle: 'Meble kuchenne na wymiar, z charakterem',
        heading: 'KUCHNIE',
        image: 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=1920&q=80',
    },
    {
        subtitle:
            'Dowolne meble z drewna, płyt meblowych, szkła, metalu i nie tylko',
        heading: 'MEBLE',
        image: '/images/meble.webp',
    },
    {
        subtitle: 'Masz pomysł na nietypową rzecz z drewna? Zrealizujemy go!',
        heading: 'INNE',
        image: '/images/inne.webp',
    },
];

const currentSlide = ref(0);
let interval: ReturnType<typeof setInterval> | null = null;

function goToSlide(index: number): void {
    currentSlide.value = index;
    resetInterval();
}

function resetInterval(): void {
    if (interval) {
        clearInterval(interval);
    }
    interval = setInterval(() => {
        currentSlide.value = (currentSlide.value + 1) % slides.length;
    }, 8000);
}

onMounted(() => {
    resetInterval();
});

onUnmounted(() => {
    if (interval) {
        clearInterval(interval);
    }
});
</script>

<template>
    <section class="relative min-h-screen overflow-hidden">
        <div
            v-for="(slide, index) in slides"
            :key="index"
            class="absolute inset-0 transition-opacity duration-700"
            :class="
                index === currentSlide ? 'z-10 opacity-100' : 'z-0 opacity-0'
            "
        >
            <div
                class="absolute inset-0 bg-cover bg-center"
                :style="{ backgroundImage: `url('${slide.image}')` }"
                :class="index === currentSlide ? 'ken-burns-active' : ''"
            />
            <div class="absolute inset-0 bg-black/50" />
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
                        <div
                            :key="currentSlide"
                            class="absolute inset-0 max-w-2xl"
                        >
                            <p
                                class="mb-4 text-sm font-medium tracking-widest text-timber-gold uppercase"
                            >
                                {{ slides[currentSlide].subtitle }}
                            </p>
                            <h1
                                class="mb-6 font-timber text-4xl leading-tight font-bold text-white uppercase md:text-5xl lg:text-6xl"
                            >
                                {{ slides[currentSlide].heading }}
                            </h1>
                            <div class="flex flex-wrap gap-4">
                                <a
                                    href="#about"
                                    class="bg-timber-terracotta hover:bg-timber-terracotta-hover rounded-full px-8 py-3 text-sm font-semibold tracking-wider text-white uppercase transition-colors"
                                >
                                    DOWIEDZ SIĘ WIĘCEJ
                                </a>
                                <button
                                    class="flex items-center gap-2 rounded-full border-2 border-white px-8 py-3 text-sm font-semibold tracking-wider text-white uppercase transition-colors hover:bg-white/10"
                                >
                                    <Play :size="16" class="fill-white" />
                                    ZOBACZ GALERIĘ REALIZACJI
                                </button>
                            </div>
                        </div>
                    </Transition>
                </div>
            </div>
        </div>

        <div
            class="absolute top-1/2 right-6 z-20 flex -translate-y-1/2 flex-col gap-3"
        >
            <button
                v-for="(slide, index) in slides"
                :key="index"
                class="block size-2 rounded-full border-2 border-white transition-all"
                :class="
                    index === currentSlide
                        ? 'bg-timber-terracotta border-timber-terracotta'
                        : 'bg-transparent'
                "
                :aria-label="`Go to slide ${index + 1}`"
                @click="goToSlide(index)"
            />
        </div>
    </section>
</template>

<style scoped>
@keyframes kenBurns {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.15);
    }
}

.ken-burns-active {
    animation: kenBurns 8000ms ease-out forwards;
}
</style>
