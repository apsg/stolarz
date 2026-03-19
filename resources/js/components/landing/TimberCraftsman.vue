<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

const bulletPoints = [
    {
        title: 'MOISTURE AND DRYING',
        description: 'Careful moisture control ensures wood stability and longevity in every project.',
        thumbnail: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=128&h=128&fit=crop&q=80',
    },
    {
        title: 'PROJECT LOGISTICS',
        description: 'Each piece of timber is carefully graded and sorted for optimal quality.',
        thumbnail: 'https://images.unsplash.com/photo-1504148455328-c376907d081c?w=128&h=128&fit=crop&q=80',
    },
    {
        title: 'QUALITY ASSURANCE',
        description: 'We use only natural, eco-friendly finishes and treatments for all our work.',
        thumbnail: 'https://images.unsplash.com/photo-1542621334-a254cf47733d?w=128&h=128&fit=crop&q=80',
    },
];
</script>

<template>
    <section class="overflow-hidden bg-timber-cream py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Left content -->
                    <div class="flex flex-col justify-center px-8 py-12 sm:px-12 lg:px-16">
                        <div :ref="scrollRef" class="scroll-reveal">
                            <h2 class="font-timber mb-8 text-3xl font-bold uppercase leading-tight text-timber-charcoal lg:text-4xl">
                                OPEN YOUR MIND TO THE POSSIBILITY OF WOOD FORESTRY
                            </h2>
                        </div>

                        <div class="space-y-6">
                            <div
                                v-for="(item, index) in bulletPoints"
                                :key="index"
                                :ref="scrollRef"
                                class="scroll-reveal flex items-start gap-4"
                            >
                                <img
                                    :src="item.thumbnail"
                                    :alt="item.title"
                                    class="h-16 w-16 shrink-0 rounded-full object-cover"
                                />
                                <div>
                                    <h3 class="uppercase font-semibold text-timber-charcoal">{{ item.title }}</h3>
                                    <p class="mt-1 text-sm leading-relaxed text-timber-charcoal/60">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right image -->
                    <div :ref="scrollRef" class="scroll-reveal flex items-end justify-center overflow-visible">
                        <img
                            src="/images/carpenter.png"
                            alt="Craftsman at work"
                            class="-mt-12 h-full min-h-[400px] w-full object-contain object-bottom"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
