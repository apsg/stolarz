<script setup lang="ts">
import { computed } from 'vue';
import { useWindowScroll } from '@vueuse/core';
import { ChevronUp, TreePine } from 'lucide-vue-next';

const { y } = useWindowScroll();
const showScrollTop = computed(() => y.value > 500);

const exploreLinks = [
    { label: 'Home', href: '#' },
    { label: 'About', href: '#about' },
    { label: 'Portfolio', href: '#portfolio' },
    { label: 'Pricing', href: '#pricing' },
    { label: 'Contact', href: '#contact' },
];

function scrollToTop(): void {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>

<template>
    <footer class="bg-timber-forest-dark py-16 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
                <!-- Left Column: Logo & Description -->
                <div>
                    <div class="mb-6 flex items-center gap-2">
                        <TreePine class="h-8 w-8 text-timber-orange" :stroke-width="2" />
                        <span class="font-timber text-xl font-bold uppercase tracking-wider">
                            TIMBER
                        </span>
                    </div>
                    <p class="mb-4 text-sm font-semibold uppercase tracking-wider text-timber-orange">
                        TIMBER FOR ELEGANT CONSTRUCTION
                    </p>
                    <p class="max-w-sm text-sm leading-relaxed text-white/70">
                        We are a passionate team of craftsmen dedicated to creating beautiful,
                        sustainable woodwork. From custom furniture to full construction projects,
                        we bring the natural warmth of timber into every space.
                    </p>
                </div>

                <!-- Middle Column: Explore Links -->
                <div>
                    <h3 class="font-timber mb-6 text-lg font-bold uppercase tracking-wider">
                        Explore
                    </h3>
                    <ul class="space-y-3">
                        <li v-for="link in exploreLinks" :key="link.label">
                            <a
                                :href="link.href"
                                class="text-sm text-white/70 transition-colors duration-200 hover:text-timber-orange"
                            >
                                {{ link.label }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Right Column: Contact Info -->
                <div>
                    <h3 class="font-timber mb-6 text-lg font-bold uppercase tracking-wider">
                        Contact Info
                    </h3>
                    <ul class="space-y-3 text-sm text-white/70">
                        <li>123 Wood Lane, Forest City</li>
                        <li>
                            <a
                                href="tel:+15551234567"
                                class="transition-colors duration-200 hover:text-timber-orange"
                            >
                                +1 (555) 123-4567
                            </a>
                        </li>
                        <li>
                            <a
                                href="mailto:info@timber.com"
                                class="transition-colors duration-200 hover:text-timber-orange"
                            >
                                info@timber.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 border-t border-white/10 pt-8 text-center">
                <p class="text-sm text-white/50">
                    &copy; 2026 Timber. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <Transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="translate-y-4 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-200 ease-in"
        leave-from-class="translate-y-0 opacity-100"
        leave-to-class="translate-y-4 opacity-0"
    >
        <button
            v-if="showScrollTop"
            type="button"
            class="fixed bottom-8 right-8 z-50 flex h-12 w-12 items-center justify-center rounded-full bg-timber-orange shadow-lg transition-colors duration-200 hover:bg-timber-orange-hover"
            aria-label="Scroll to top"
            @click="scrollToTop"
        >
            <ChevronUp class="h-6 w-6 text-white" />
        </button>
    </Transition>
</template>
