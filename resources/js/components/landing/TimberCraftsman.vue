<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

const bulletPoints = [
    {
        title: 'Moisture and Drying',
        description: 'Careful moisture control ensures wood stability and longevity in every project.',
        thumbnail: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=128&h=128&fit=crop&q=80',
    },
    {
        title: 'Grading and Sorting',
        description: 'Each piece of timber is carefully graded and sorted for optimal quality.',
        thumbnail: 'https://images.unsplash.com/photo-1504148455328-c376907d081c?w=128&h=128&fit=crop&q=80',
    },
    {
        title: 'Natural Ingredients',
        description: 'We use only natural, eco-friendly finishes and treatments for all our work.',
        thumbnail: 'https://images.unsplash.com/photo-1542621334-a254cf47733d?w=128&h=128&fit=crop&q=80',
    },
];
</script>

<template>
    <section class="bg-timber-cream py-20">
        <div class="mx-auto max-w-7xl overflow-hidden rounded-2xl bg-white px-4 shadow-lg sm:px-0">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Left content -->
                <div class="flex flex-col justify-center px-8 py-12 sm:px-12 lg:px-16">
                    <div :ref="scrollRef" class="scroll-reveal">
                        <p class="mb-3 text-sm font-medium uppercase tracking-wider text-timber-orange">
                            OUR CRAFTSMANSHIP
                        </p>
                        <h2 class="font-timber mb-8 text-2xl font-bold uppercase leading-tight text-timber-charcoal lg:text-3xl">
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
                                class="h-16 w-16 shrink-0 rounded object-cover"
                            />
                            <div>
                                <h3 class="font-semibold text-timber-charcoal">{{ item.title }}</h3>
                                <p class="mt-1 text-sm leading-relaxed text-timber-charcoal/60">
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right image -->
                <div :ref="scrollRef" class="scroll-reveal">
                    <img
                        src="https://images.unsplash.com/photo-1601058272524-0611e132d3c0?w=800&q=80"
                        alt="Craftsman at work"
                        class="h-full min-h-[400px] w-full object-cover"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
