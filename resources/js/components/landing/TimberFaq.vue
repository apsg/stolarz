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
        id: 'drewno',
        question: 'Z JAKIEGO DREWNA WYKONUJECIE MEBLE?',
        answer: 'Pracujemy głównie na litym drewnie dębowym. Oferujemy klasę rustic (z naturalnym charakterem, sękami i żyłkami) oraz klasę A/B (czystsza, bardziej jednorodna powierzchnia). Pomagamy dobrać klasę do stylu wnętrza.',
    },
    {
        id: 'wymiar',
        question: 'CZY MOGĘ ZAMÓWIĆ MEBEL NA WYMIAR?',
        answer: 'Tak – to nasza specjalność. Wykonujemy meble dokładnie według podanych wymiarów. Wystarczy podać szerokość, głębokość i wysokość, a my zajmiemy się resztą. Bezpłatna wycena przez telefon lub e-mail.',
    },
    {
        id: 'czas',
        question: 'JAK DŁUGO TRWA REALIZACJA ZAMÓWIENIA?',
        answer: 'Czas realizacji zależy od złożoności projektu i aktualnej kolejki zleceń. Standardowy stół na wymiar to zazwyczaj 2–4 tygodnie. Przy zamówieniu prosimy o kontakt – podamy dokładny termin.',
    },
    {
        id: 'dostawa',
        question: 'CZY OFERUJECIE DOSTAWĘ I MONTAŻ?',
        answer: 'Możliwość dostawy ustalamy indywidualnie. Działamy głównie na terenie Kujaw i Pomorza, ale dla większych zamówień możliwy jest transport w dalsze rejony Polski.',
    },
    {
        id: 'pielegnacja',
        question: 'JAK PIELĘGNOWAĆ DĘBOWY BLAT?',
        answer: 'Blaty lakierowane wystarczy przecierać wilgotną ściereczką. Unikaj pozostawiania mokrych naczyń bezpośrednio na drewnie. Raz na rok można odświeżyć powierzchnię delikatnym woskiem do drewna – drewno odwdzięczy się pięknym wyglądem na lata.',
    },
];
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-terracotta">
                        POMOCNE INFORMACJE
                    </p>
                    <h2 class="mb-8 text-2xl font-bold uppercase text-timber-charcoal lg:text-3xl">
                        NAJCZĘŚCIEJ ZADAWANE PYTANIA
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
                        alt="Deski dębowe w stolarni"
                        class="h-full min-h-[500px] w-full rounded-lg object-cover"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
