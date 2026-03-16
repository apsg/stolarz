<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()
</script>

<template>
    <section id="about" :ref="scrollRef" class="scroll-reveal bg-timber-cream py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
                <div class="relative">
                    <div class="overflow-hidden rounded-xl">
                        <img
                            src="https://images.unsplash.com/photo-1588854337236-6889d631faa8?w=800&q=80"
                            alt="Master craftsman at work"
                            class="h-[500px] w-full object-cover"
                        />
                    </div>
                    <div class="absolute -bottom-6 -right-6 hidden overflow-hidden rounded-xl border-4 border-timber-cream shadow-lg md:block">
                        <img
                            src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=400&q=80"
                            alt="Finished woodwork"
                            class="h-48 w-64 object-cover"
                        />
                    </div>
                    <div class="absolute -right-4 -top-4 flex h-32 w-32 items-center justify-center rounded-full bg-timber-gold p-3 text-center shadow-lg">
                        <span class="text-sm font-bold uppercase leading-tight text-white">
                            16 YEARS OF EXPERIENCE
                        </span>
                    </div>
                </div>

                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-orange">
                        ABOUT US
                    </p>
                    <h2 class="font-timber mb-6 text-3xl font-bold uppercase text-timber-charcoal lg:text-4xl">
                        WE HAVE BEEN WORKING VERY HARD FOR 16 YEARS
                    </h2>
                    <p class="mb-8 leading-relaxed text-timber-charcoal/70">
                        With over 16 years of dedication to the art of woodworking, our team has built a
                        reputation for excellence that spans generations. We combine traditional craftsmanship
                        with modern techniques to create timeless pieces that tell a story. Every project we
                        undertake reflects our unwavering commitment to quality, sustainability, and the natural
                        beauty of wood. From bespoke furniture to architectural installations, we transform raw
                        timber into works of art that stand the test of time.
                    </p>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="overflow-hidden rounded-xl">
                            <img
                                src="https://images.unsplash.com/photo-1622021142947-da7dedc7c39a?w=400&q=80"
                                alt="Wood workshop"
                                class="h-40 w-full object-cover"
                            />
                        </div>
                        <div class="overflow-hidden rounded-xl">
                            <img
                                src="https://images.unsplash.com/photo-1564182842519-8a3b2af3e228?w=400&q=80"
                                alt="Handcrafted wood detail"
                                class="h-40 w-full object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
