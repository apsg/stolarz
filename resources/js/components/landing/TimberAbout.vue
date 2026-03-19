<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()
</script>

<template>
    <section id="about" :ref="scrollRef" class="scroll-reveal bg-white py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
                <div class="relative">
                    <div class="overflow-hidden rounded-xl">
                        <img
                            src="/images/about_img_01.jpg"
                            alt="Master craftsman at work"
                            class="h-[500px] w-full object-cover"
                        />
                    </div>
                    <div class="absolute -bottom-6 -right-6 hidden overflow-hidden rounded-xl border-4 border-white shadow-lg md:block">
                        <img
                            src="/images/about_img_02.jpg"
                            alt="Finished woodwork"
                            class="h-48 w-64 object-cover"
                        />
                    </div>
                    <div class="absolute bottom-8 -right-6 flex h-40 w-40 items-center justify-center rounded-full bg-timber-gold p-3 text-center shadow-lg">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-3xl font-extrabold leading-none text-white">16</span>
                            <span class="text-xs font-bold uppercase leading-tight text-white">YEARS OF EXPERIENCE</span>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-timber-terracotta">
                        ABOUT COMPANY
                    </p>
                    <h2 class="font-timber mb-6 text-3xl font-bold uppercase text-timber-charcoal lg:text-4xl">
                        RELIABLE CARPENTRY SERVICES INCLUDES PROJECT PLANNING AND PERFECT FINISHING
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
                                src="/images/about_img_01.jpg"
                                alt="Wood workshop"
                                class="h-40 w-full object-cover"
                            />
                        </div>
                        <div class="overflow-hidden rounded-xl">
                            <img
                                src="/images/about_img_03.jpg"
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
