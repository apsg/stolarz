<script setup lang="ts">
import { TreePine, ShieldCheck, Users, Wrench } from 'lucide-vue-next'
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()

const features = [
    {
        icon: TreePine,
        title: 'SUSTAINABLE WOOD',
        description: 'We source our timber from responsibly managed forests ensuring ecological balance.',
    },
    {
        icon: ShieldCheck,
        title: 'QUALITY GUARANTEE',
        description: 'Every piece undergoes rigorous quality control for lasting durability and beauty.',
    },
    {
        icon: Users,
        title: 'EXPERT TEAM',
        description: 'Our master craftsmen bring decades of combined experience to every project.',
    },
    {
        icon: Wrench,
        title: 'CUSTOM SOLUTIONS',
        description: 'From concept to completion, we create bespoke woodwork tailored to your needs.',
    },
]
</script>

<template>
    <section class="bg-white py-20 px-4">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="(feature, index) in features"
                    :key="index"
                    :ref="scrollRef"
                    class="scroll-reveal text-center"
                    :style="{ transitionDelay: `${index * 0.1}s` }"
                >
                    <div class="mb-4 inline-flex items-center justify-center">
                        <component :is="feature.icon" :size="48" class="text-timber-orange" />
                    </div>
                    <div class="mx-auto mb-4 h-0.5 w-12 bg-timber-orange" />
                    <h3 class="font-timber mb-3 text-lg font-bold uppercase text-timber-charcoal">
                        {{ feature.title }}
                    </h3>
                    <p class="leading-relaxed text-timber-charcoal/70">
                        {{ feature.description }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
