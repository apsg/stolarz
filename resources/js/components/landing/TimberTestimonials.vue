<script setup lang="ts">
import { ref, computed } from 'vue'
import { Quote, Star, ChevronLeft } from 'lucide-vue-next'
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()

const testimonials = [
    {
        text: 'The craftsmanship exceeded all our expectations. Our custom kitchen is a masterpiece.',
        name: 'Sarah Mitchell',
    },
    {
        text: 'Professional, reliable, and incredibly talented. They transformed our home with beautiful woodwork.',
        name: 'James Anderson',
    },
    {
        text: 'From design to installation, the entire process was smooth. Highly recommend their services.',
        name: 'Emily Roberts',
    },
    {
        text: 'Outstanding quality and attention to detail. The wooden staircase they built is absolutely stunning.',
        name: 'Michael Turner',
    },
    {
        text: 'They delivered our custom bookshelf on time and it fits perfectly. True artisans at work.',
        name: 'Laura Chen',
    },
    {
        text: 'We hired them for our restaurant interior and the result is breathtaking. Clients love the ambience.',
        name: 'David Kowalski',
    },
    {
        text: 'The team was incredibly professional from start to finish. Our new deck is the envy of the neighborhood.',
        name: 'Jessica Williams',
    },
    {
        text: 'Beautiful handcrafted furniture that will last generations. Worth every penny.',
        name: 'Robert Hayes',
    },
    {
        text: 'Exceptional woodworking skills and great communication throughout the project. Highly recommend!',
        name: 'Amanda Foster',
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

function prevPage(): void {
    activeDot.value = activeDot.value > 0 ? activeDot.value - 1 : totalPages.value - 1
}
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-orange">
                    Testimonials
                </p>
                <h2 class="font-timber text-3xl font-bold uppercase text-timber-charcoal md:text-4xl">
                    Customers' Experience
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
                            class="rounded-xl p-8"
                            :class="index === 1 ? 'bg-timber-cream' : 'border border-gray-200 bg-white'"
                        >
                            <Quote class="mb-4 size-8 text-timber-orange" />

                            <p class="italic text-timber-charcoal/80">
                                "{{ testimonial.text }}"
                            </p>

                            <p class="mt-4 font-semibold text-timber-charcoal">
                                {{ testimonial.name }}
                            </p>

                            <div class="mt-2 flex gap-1">
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
                    type="button"
                    class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-timber-orange text-timber-orange transition-colors hover:bg-timber-orange hover:text-white"
                    aria-label="Previous page"
                    @click="prevPage"
                >
                    <ChevronLeft :size="16" />
                </button>
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
