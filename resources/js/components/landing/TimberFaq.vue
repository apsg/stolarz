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
        id: 'moisture-level',
        question: 'WHAT MOISTURE LEVEL SUITS INTERIOR JOINERY WORK?',
        answer: 'Interior joinery typically requires wood dried to 8-12% moisture content. This range ensures stability and prevents warping or shrinkage after installation. We use precision moisture meters to verify every piece before it leaves our workshop.',
    },
    {
        id: 'oil-facades',
        question: 'HOW TO MAINTAIN OIL FINISHED FACADES?',
        answer: 'Regular maintenance involves cleaning and reapplying oil every 1-2 years depending on exposure. Use a mild soap solution for cleaning, allow to dry fully, then apply a quality exterior timber oil with a brush or cloth working in the direction of the grain.',
    },
    {
        id: 'wooden-roofs',
        question: 'HOW LONG DO WOODEN ROOFS NORMALLY LAST?',
        answer: 'With proper maintenance, wooden roofs can last 30-50 years. The lifespan depends on the wood species, climate conditions, installation quality, and regularity of maintenance. Cedar and redwood are among the most durable choices for roofing applications.',
    },
    {
        id: 'ventilation',
        question: 'WHAT VENTILATION IS NEEDED UNDER ROOF COVERINGS?',
        answer: 'Adequate ventilation prevents moisture buildup that leads to rot and structural damage. A continuous air gap of at least 25mm between the insulation and roof deck is recommended, with ventilation openings at the eaves and ridge to allow airflow across the full roof area.',
    },
    {
        id: 'decking-inspection',
        question: 'HOW OFTEN TO INSPECT OUTDOOR DECKING?',
        answer: 'Inspect decking at least twice yearly, before and after winter. Check for loose boards, protruding fasteners, signs of rot or discoloration, and any structural movement. Early detection of issues dramatically reduces repair costs and extends the life of your deck.',
    },
];
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-terracotta">
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
                                <span class="uppercase font-semibold text-timber-charcoal">{{ item.question }}</span>
                                <span
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border-2 border-timber-terracotta"
                                >
                                    <Minus v-if="openFaq === item.id" :size="16" class="text-timber-terracotta" />
                                    <Plus v-else :size="16" class="text-timber-terracotta" />
                                </span>
                            </CollapsibleTrigger>
                            <CollapsibleContent class="transition-all duration-[400ms]">
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
                        class="h-full min-h-[500px] w-full rounded-lg object-cover"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
