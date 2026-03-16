<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

interface ServiceItem {
    name: string;
    description: string;
    price: string;
}

const leftColumn: ServiceItem[] = [
    {
        name: 'House Concept',
        description: 'Complete wooden house design and planning',
        price: '$235',
    },
    {
        name: 'Deck Framing',
        description: 'Professional deck construction and framing',
        price: '$78',
    },
    {
        name: 'Rafter Repair',
        description: 'Expert roof rafter repair and replacement',
        price: '$65',
    },
    {
        name: 'Interior Finish',
        description: 'Fine interior woodwork and finishing',
        price: '$240',
    },
];

const rightColumn: ServiceItem[] = [
    {
        name: 'Cabinet Making',
        description: 'Custom kitchen and bathroom cabinets',
        price: '$180',
    },
    {
        name: 'Door Installation',
        description: 'Premium wood door fitting and installation',
        price: '$95',
    },
    {
        name: 'Window Frames',
        description: 'Handcrafted wooden window frames',
        price: '$120',
    },
    {
        name: 'Furniture Restoration',
        description: 'Antique furniture repair and refinishing',
        price: '$150',
    },
];
</script>

<template>
    <section id="pricing" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div :ref="scrollRef" class="scroll-reveal mb-14 text-center">
                <p class="mb-3 text-sm font-medium uppercase tracking-wider text-timber-orange">
                    OUR PRICES
                </p>
                <h2 class="font-timber text-3xl font-bold uppercase text-timber-charcoal lg:text-4xl">
                    CARPENTER SERVICES
                </h2>
            </div>

            <div class="relative grid grid-cols-1 gap-x-16 gap-y-0 lg:grid-cols-2">
                <!-- Left column -->
                <div>
                    <div
                        v-for="(service, index) in leftColumn"
                        :key="index"
                        :ref="scrollRef"
                        class="scroll-reveal flex items-center justify-between border-b border-dashed border-timber-charcoal/20 py-5"
                    >
                        <div class="mr-4">
                            <h3 class="font-semibold text-timber-charcoal">{{ service.name }}</h3>
                            <p class="text-sm text-timber-charcoal/60">{{ service.description }}</p>
                        </div>
                        <span class="shrink-0 text-xl font-bold text-timber-orange">{{ service.price }}</span>
                    </div>
                </div>

                <!-- Decorative tree SVG (visible on lg+) -->
                <div class="pointer-events-none absolute inset-y-0 left-1/2 hidden -translate-x-1/2 items-center lg:flex">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 64 120"
                        class="h-48 w-auto text-timber-forest/15"
                        fill="currentColor"
                    >
                        <polygon points="32,0 8,40 20,40 4,70 18,70 2,100 62,100 46,70 60,70 44,40 56,40" />
                        <rect x="27" y="100" width="10" height="20" />
                    </svg>
                </div>

                <!-- Right column -->
                <div>
                    <div
                        v-for="(service, index) in rightColumn"
                        :key="index"
                        :ref="scrollRef"
                        class="scroll-reveal flex items-center justify-between border-b border-dashed border-timber-charcoal/20 py-5"
                    >
                        <div class="mr-4">
                            <h3 class="font-semibold text-timber-charcoal">{{ service.name }}</h3>
                            <p class="text-sm text-timber-charcoal/60">{{ service.description }}</p>
                        </div>
                        <span class="shrink-0 text-xl font-bold text-timber-orange">{{ service.price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
