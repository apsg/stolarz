<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()

const clients = [
    'Digital Research',
    'Nadia Farel',
    'Natural Wood Co.',
    'Forest Academy',
    'Oak & Pine',
    'Timber Studio',
]
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-timber-forest py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="mb-10 text-center text-sm font-semibold uppercase tracking-widest text-white">
                Trusted by Leading Brands
            </h2>

            <div class="flex flex-wrap items-center justify-center gap-12">
                <span
                    v-for="client in clients"
                    :key="client"
                    class="text-lg font-semibold uppercase tracking-wider text-white/60 transition-opacity hover:opacity-100"
                >
                    {{ client }}
                </span>
            </div>
        </div>
    </section>
</template>
