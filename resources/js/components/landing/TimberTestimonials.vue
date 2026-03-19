<script setup lang="ts">
import { ref, computed } from 'vue'
import { Star } from 'lucide-vue-next'
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()

const testimonials = [
    {
        text: 'The craftsmanship exceeded all our expectations. Our custom kitchen is a masterpiece.',
        name: 'STEFANIE RASHFORD',
        avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Professional, reliable, and incredibly talented. They transformed our home with beautiful woodwork.',
        name: 'PATRIC STONE',
        avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'From design to installation, the entire process was smooth. Highly recommend their services.',
        name: 'HUGO JAMES',
        avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Outstanding quality and attention to detail. The wooden staircase they built is absolutely stunning.',
        name: 'MICHAEL TURNER',
        avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'They delivered our custom bookshelf on time and it fits perfectly. True artisans at work.',
        name: 'LAURA CHEN',
        avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'We hired them for our restaurant interior and the result is breathtaking. Clients love the ambience.',
        name: 'DAVID KOWALSKI',
        avatar: 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'The team was incredibly professional from start to finish. Our new deck is the envy of the neighborhood.',
        name: 'JESSICA WILLIAMS',
        avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Beautiful handcrafted furniture that will last generations. Worth every penny.',
        name: 'ROBERT HAYES',
        avatar: 'https://images.unsplash.com/photo-1552374196-c4e7ffc6e126?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Exceptional woodworking skills and great communication throughout the project. Highly recommend!',
        name: 'AMANDA FOSTER',
        avatar: 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'The bespoke wardrobe they built for our bedroom is flawless. Every joint is perfectly fitted.',
        name: 'THOMAS GREY',
        avatar: 'https://images.unsplash.com/photo-1504257432389-52343af06ae3?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'Superb finish on our garden pergola. They understood the brief immediately and delivered beyond expectations.',
        name: 'CLAIRE MORTON',
        avatar: 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=100&h=100&fit=crop&crop=face',
    },
    {
        text: 'From the initial consultation to the final reveal, every step felt personal and considered. Truly first class.',
        name: 'EVAN CARLISLE',
        avatar: 'https://images.unsplash.com/photo-1463453091185-61582044d556?w=100&h=100&fit=crop&crop=face',
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
