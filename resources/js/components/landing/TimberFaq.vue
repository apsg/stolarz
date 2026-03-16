<script setup lang="ts">
import { ref } from 'vue';
import { Minus, Plus } from 'lucide-vue-next';
import Collapsible from '@/components/ui/collapsible/Collapsible.vue';
import CollapsibleTrigger from '@/components/ui/collapsible/CollapsibleTrigger.vue';
import CollapsibleContent from '@/components/ui/collapsible/CollapsibleContent.vue';
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

const openFaq = ref<string | null>(null);

const faqItems = [
    {
        id: 'wood-types',
        question: 'What types of wood do you work with?',
        answer: 'We work with a wide variety of hardwoods and softwoods including oak, walnut, maple, cherry, pine, and cedar. We can source specialty woods upon request to match your project\'s specific requirements.',
    },
    {
        id: 'project-timeline',
        question: 'How long does a typical project take?',
        answer: 'Project timelines vary based on complexity and scope. A simple furniture piece may take 2-4 weeks, while a full kitchen renovation could take 6-12 weeks. We provide detailed timelines during consultation.',
    },
    {
        id: 'consultations',
        question: 'Do you offer free consultations?',
        answer: 'Yes, we offer complimentary initial consultations where we discuss your vision, take measurements, and provide a detailed quote. This helps us understand your needs and budget.',
    },
    {
        id: 'warranty',
        question: 'What is your warranty policy?',
        answer: 'All our work comes with a 5-year craftsmanship warranty. We stand behind the quality of our materials and workmanship, and we\'re always available for any post-project support.',
    },
    {
        id: 'matching',
        question: 'Can you match existing woodwork in my home?',
        answer: 'Absolutely. Our craftsmen are skilled at matching wood species, stains, and finishes to seamlessly integrate new work with your existing woodwork and decor.',
    },
];

</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-orange">
                        HELPFUL INFORMATION
                    </p>
                    <h2 class="mb-8 text-2xl font-bold uppercase text-timber-charcoal lg:text-3xl">
                        FREQUENTLY ASKED QUESTIONS
                    </h2>

                    <div>
                        <Collapsible
                            v-for="item in faqItems"
                            :key="item.id"
                            :open="openFaq === item.id"
                            class="border-b border-timber-charcoal/10"
                            @update:open="(open: boolean) => open ? (openFaq = item.id) : (openFaq = null)"
                        >
                            <CollapsibleTrigger
                                class="flex w-full items-center justify-between py-4 text-left"
                            >
                                <span class="font-semibold text-timber-charcoal">{{ item.question }}</span>
                                <span
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border-2 border-timber-orange"
                                >
                                    <Minus v-if="openFaq === item.id" :size="16" class="text-timber-orange" />
                                    <Plus v-else :size="16" class="text-timber-orange" />
                                </span>
                            </CollapsibleTrigger>
                            <CollapsibleContent>
                                <p class="py-4 leading-relaxed text-timber-charcoal/70">
                                    {{ item.answer }}
                                </p>
                            </CollapsibleContent>
                        </Collapsible>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <img
                        src="https://images.unsplash.com/photo-1520420097861-e4959843b682?w=800&q=80"
                        alt="Stacked timber wood"
                        class="h-full min-h-[500px] w-full rounded-2xl object-cover"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
