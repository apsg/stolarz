<script setup lang="ts">
import { Play } from 'lucide-vue-next'
</script>

<template>
    <section
        class="relative flex min-h-[500px] flex-col items-center justify-center gap-6 py-32"
        :style="{
            backgroundImage: 'url(https://images.unsplash.com/photo-1504148455328-c376907d081c?w=1920&q=80)',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundAttachment: 'fixed',
        }"
    >
        <div class="absolute inset-0 bg-black/50" />

        <div class="relative z-10 flex flex-col items-center gap-6">
            <button
                type="button"
                class="group relative flex items-center justify-center"
                aria-label="Play video"
            >
                <span class="pulse-ring absolute size-28 rounded-full border-2 border-white/40" />

                <span
                    class="relative flex size-24 items-center justify-center rounded-full border-2 border-white bg-transparent shadow-lg transition-transform group-hover:scale-105"
                >
                    <Play :size="32" class="ml-1 text-white" />
                </span>
            </button>

            <h2 class="mt-8 text-2xl font-bold uppercase tracking-widest text-white lg:text-3xl">
                ZOBACZ JAK PRACUJEMY
            </h2>
        </div>
    </section>
</template>

<style scoped>
.pulse-ring {
    animation: pulse-ring 2s ease-out infinite;
}
</style>
