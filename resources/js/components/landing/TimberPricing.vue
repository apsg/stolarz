<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

interface ServiceItem {
    name: string;
    description: string;
    price: number;
}

const leftColumn: ServiceItem[] = [
    {
        name: 'HOUSE CONCEPT',
        description: 'Layout study and massing review',
        price: 235,
    },
    {
        name: 'DOOR INSTALLATION',
        description: 'Fitted frames and quiet seals',
        price: 120,
    },
    {
        name: 'WALL PANELING',
        description: 'Tongue and groove surface finish',
        price: 40,
    },
    {
        name: 'SHINGLE LAYING',
        description: 'Weatherproof roof covering work',
        price: 90,
    },
    {
        name: 'DECK FRAMING',
        description: 'Structural outdoor platform build',
        price: 78,
    },
];

const rightColumn: ServiceItem[] = [
    {
        name: 'RAFTER REPAIR',
        description: 'Roof timber restoration service',
        price: 65,
    },
    {
        name: 'MOISTURE CHECK',
        description: 'Diagnostic scan and drying plan',
        price: 36,
    },
    {
        name: 'FURNITURE BUILD',
        description: 'Bespoke joinery to specification',
        price: 450,
    },
    {
        name: 'FACADE CLADDING',
        description: 'Exterior timber board installation',
        price: 145,
    },
    {
        name: 'INTERIOR FINISH',
        description: 'Fine woodwork trim and detailing',
        price: 240,
    },
];
</script>

<template>
    <section id="pricing" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div :ref="scrollRef" class="scroll-reveal mb-14 text-center">
                <p class="mb-3 text-sm font-medium uppercase tracking-wider text-timber-terracotta">
                    OUR PRICES
                </p>
                <h2 class="font-timber text-3xl font-bold uppercase text-timber-charcoal lg:text-4xl">
                    CARPENTER SERVICES
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-x-16 gap-y-0 lg:grid-cols-[1fr_auto_1fr]">
                <!-- Left column -->
                <div>
                    <div
                        v-for="(service, index) in leftColumn"
                        :key="index"
                        :ref="scrollRef"
                        class="scroll-reveal flex items-center justify-between border-b border-dashed border-timber-charcoal/40 py-5"
                    >
                        <div class="mr-4">
                            <h3 class="uppercase font-semibold text-timber-charcoal">{{ service.name }}</h3>
                            <p class="text-sm text-timber-charcoal/60">{{ service.description }}</p>
                        </div>
                        <div class="flex items-center shrink-0">
                            <span class="mx-3 flex-1 border-t-2 border-timber-forest/40 w-8 hidden sm:block"></span>
                            <span class="shrink-0">
                                <sup class="text-sm align-super text-timber-terracotta">$</sup><span class="text-2xl font-bold text-timber-terracotta">{{ service.price }}</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Decorative tree image (visible on lg+) -->
                <div class="pointer-events-none hidden items-center lg:flex">
                    <img src="/images/price_tree.jpg" alt="Tree" class="h-full max-h-[450px] w-auto object-contain" />
                </div>

                <!-- Right column -->
                <div>
                    <div
                        v-for="(service, index) in rightColumn"
                        :key="index"
                        :ref="scrollRef"
                        class="scroll-reveal flex items-center justify-between border-b border-dashed border-timber-charcoal/40 py-5"
                    >
                        <div class="mr-4">
                            <h3 class="uppercase font-semibold text-timber-charcoal">{{ service.name }}</h3>
                            <p class="text-sm text-timber-charcoal/60">{{ service.description }}</p>
                        </div>
                        <div class="flex items-center shrink-0">
                            <span class="mx-3 flex-1 border-t-2 border-timber-forest/40 w-8 hidden sm:block"></span>
                            <span class="shrink-0">
                                <sup class="text-sm align-super text-timber-terracotta">$</sup><span class="text-2xl font-bold text-timber-terracotta">{{ service.price }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
