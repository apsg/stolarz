<script setup lang="ts">
import { ref, computed } from 'vue'
import { Star } from 'lucide-vue-next'
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()

const testimonials = [
    {
        text: 'Stół loftowy który zrobił Pan Piotr to perfekcja. Nogi spawane idealnie, blat dębowy wygląda niesamowicie. Polecam każdemu!',
        name: 'MARCIN K.',
        avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Zamówiłam blat dębowy do kuchni. Dopasowany wymiarowo co do milimetra, wykończenie klasy A/B – przepiękne drewno.',
        name: 'ANNA W.',
        avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Profesjonalne podejście, uczciwa wycena i termin dotrzymany. Stół stoi w naszej restauracji i każdy pyta skąd jest.',
        name: 'TOMASZ S.',
        avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Zamówiliśmy 6 stołów do kawiarni. Wszystkie wykonane identycznie, precyzyjnie, w umówionym czasie. Solidna robota.',
        name: 'KATARZYNA M.',
        avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Świetny kontakt i dobre doradztwo przy wyborze klasy drewna. Blat rustic w naszym salonie wygląda naturalnie i ciepło.',
        name: 'PAWEŁ R.',
        avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Szybka wycena, dobry stosunek jakości do ceny i rzetelne wykonanie. Polecam Stolarni Piotra bez wahania.',
        name: 'PIOTR N.',
        avatar: 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Biurko na wymiar do mojego home office – idealnie wpasowane we wnękę. Jakość drewna i wykończenie na najwyższym poziomie.',
        name: 'MARTA J.',
        avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Zamawiałem regał z litego dębu. Ciężki, solidny, piękny. Widać że to robota człowieka, który kocha swój zawód.',
        name: 'ROBERT Z.',
        avatar: 'https://images.unsplash.com/photo-1552374196-c4e7ffc6e126?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Odnowienie starych mebli rodzinnych – Pan Piotr przywrócił im dawny blask. Jestem wzruszona efektem końcowym.',
        name: 'AGNIESZKA L.',
        avatar: 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=100&h=100&fit=crop&crop=face',
    },
]

const activeDot = ref(0)
const itemsPerPage = 3
const totalPages = computed(() => Math.ceil(testimonials.length / itemsPerPage))

const visibleTestimonials = computed(() => {
    const start = activeDot.value * itemsPerPage
    return testimonials.slice(start, start + itemsPerPage)
})

function setPage(page: number): void {
    activeDot.value = page
}
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-orange">
                    Opinie
                </p>
                <h2 class="font-timber text-3xl font-bold uppercase text-timber-charcoal md:text-4xl">
                    Co mówią nasi klienci
                </h2>
            </div>

            <div class="relative overflow-hidden">
                <TransitionGroup
                    enter-active-class="transition-all duration-500 ease-out"
                    enter-from-class="opacity-0 translate-x-8"
                    enter-to-class="opacity-100 translate-x-0"
                    leave-active-class="transition-all duration-300 ease-in absolute inset-0"
                    leave-from-class="opacity-100 translate-x-0"
                    leave-to-class="opacity-0 -translate-x-8"
                >
                    <div :key="activeDot" class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div
                            v-for="(testimonial, index) in visibleTestimonials"
                            :key="testimonial.name"
                            class="rounded-xl p-10 bg-timber-cream shadow-md"
                            :class="index === 1 ? 'transform scale-105 -translate-y-2 shadow-lg' : ''"
                        >
                            <span class="block font-serif text-7xl leading-none text-timber-terracotta mb-2">&ldquo;</span>

                            <p class="italic text-timber-charcoal">
                                "{{ testimonial.text }}"
                            </p>

                            <img :src="testimonial.avatar" :alt="testimonial.name" class="mx-auto mt-4 h-14 w-14 rounded-full object-cover" />

                            <p class="mt-4 font-semibold uppercase tracking-wider text-timber-charcoal text-center">
                                {{ testimonial.name }}
                            </p>

                            <div class="mt-2 flex justify-center gap-1">
                                <Star
                                    v-for="star in 5"
                                    :key="star"
                                    :size="16"
                                    class="fill-timber-gold text-timber-gold"
                                />
                            </div>
                        </div>
                    </div>
                </TransitionGroup>
            </div>

            <div class="mt-8 flex items-center justify-center gap-3">
                <button
                    v-for="dot in totalPages"
                    :key="dot"
                    type="button"
                    class="block size-3 rounded-full transition-colors"
                    :class="dot - 1 === activeDot ? 'bg-timber-orange' : 'bg-gray-300 hover:bg-gray-400'"
                    :aria-label="`Go to page ${dot}`"
                    @click="setPage(dot - 1)"
                />
            </div>
        </div>
    </section>
</template>
