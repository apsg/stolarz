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
        name: 'STÓŁ LOFTOWY NA WYMIAR',
        description: 'Stalowe nogi + blat dębowy',
        price: 'Wycena',
    },
    {
        name: 'BLAT DĘBOWY',
        description: 'Klasa rustic lub A/B, dowolne wymiary',
        price: 'Wycena',
    },
    {
        name: 'STÓŁ JADALNIANY',
        description: 'Lite drewno, projekt indywidualny',
        price: 'Wycena',
    },
    {
        name: 'PÓŁKA / REGAŁ',
        description: 'Montaż na ścianie lub wolnostojący',
        price: 'Wycena',
    },
    {
        name: 'KONSOLA / KOMODA',
        description: 'Na wymiar, lite drewno',
        price: 'Wycena',
    },
];

const rightColumn: ServiceItem[] = [
    {
        name: 'ŁAWA / STOLIK KAWOWY',
        description: 'Industrialny lub klasyczny styl',
        price: 'Wycena',
    },
    {
        name: 'BIURKO NA WYMIAR',
        description: 'Do domu i biura, z litego drewna',
        price: 'Wycena',
    },
    {
        name: 'RENOWACJA MEBLI',
        description: 'Szlifowanie, lakierowanie, odnowienie',
        price: 'Wycena',
    },
    {
        name: 'NOGI STALOWE / METALOWE',
        description: 'Produkcja i spawanie na zamówienie',
        price: 'Wycena',
    },
    {
        name: 'PROJEKT + WYCENA',
        description: 'Bezpłatna konsultacja i doradztwo',
        price: 'Gratis',
    },
];
</script>

<template>
    <section id="pricing" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div :ref="scrollRef" class="scroll-reveal mb-14 text-center">
                <p class="mb-3 text-sm font-medium uppercase tracking-wider text-timber-terracotta">
                    CENNIK USŁUG
                </p>
                <h2 class="font-timber text-3xl font-bold uppercase text-timber-charcoal lg:text-4xl">
                    USŁUGI STOLARSKIE
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
                                <span class="text-lg font-bold text-timber-terracotta">{{ service.price }}</span>
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
                                <span class="text-lg font-bold text-timber-terracotta">{{ service.price }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
