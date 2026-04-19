<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()

const stats = [
    { value: '467+', label: 'Obserwujących na Facebooku' },
    { value: '10+', label: 'Lat doświadczenia' },
    { value: '100+', label: 'Zrealizowanych projektów' },
    { value: '100%', label: 'Zadowolonych klientów' },
]
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-timber-forest py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div
                    v-for="(stat, index) in stats"
                    :key="index"
                    class="text-center"
                >
                    <p class="font-timber text-4xl font-bold text-timber-gold lg:text-5xl">
                        {{ stat.value }}
                    </p>
                    <p class="mt-2 text-sm uppercase tracking-wider text-white/70">
                        {{ stat.label }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
