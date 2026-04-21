<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();
</script>

<template>
    <section
        id="about"
        :ref="scrollRef"
        class="scroll-reveal bg-rings bg-white py-24"
    >
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
                </div>

                <div>
                    <p
                        class="text-timber-terracotta mb-3 text-sm font-semibold tracking-wider uppercase"
                    >
                        O NASZEJ FIRMIE
                    </p>
                    <h2
                        class="mb-6 font-timber text-3xl font-bold text-timber-charcoal uppercase lg:text-4xl"
                    >
                        PRACOWNIA STOLARSKA Z WIELOLETNIM DOŚWIADCZENIEM
                    </h2>
                    <p class="mb-8 leading-relaxed text-timber-charcoal/70">
                        With over 16 years of dedication to the art of
                        woodworking, our team has built a reputation for
                        excellence that spans generations. We combine
                        traditional craftsmanship with modern techniques to
                        create timeless pieces that tell a story. Every project
                        we undertake reflects our unwavering commitment to
                        quality, sustainability, and the natural beauty of wood.
                        From bespoke furniture to architectural installations,
                        we transform raw timber into works of art that stand the
                        test of time.
                    </p>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="overflow-hidden rounded-xl">
                            <img
                                src="/images/about_img_02.jpg"
                                alt="Wood workshop"
                                class="h-40 w-full object-cover"
                            />
                        </div>
                        <div
                            class="absolute -right-6 bottom-8 flex h-40 w-40 items-center justify-center rounded-full bg-timber-gold p-3 text-center shadow-lg"
                        >
                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <span
                                    class="text-3xl leading-none font-extrabold text-white"
                                    >40</span
                                >
                                <span
                                    class="text-xs leading-tight font-bold text-white uppercase"
                                    >LAT TRADYCJI</span
                                >
                            </div>
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
