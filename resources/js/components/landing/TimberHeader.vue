<script setup lang="ts">
import { ref, computed } from 'vue';
import { useWindowScroll } from '@vueuse/core';
import { Search, User, ShoppingCart, Menu, X, TreePine, ChevronDown } from 'lucide-vue-next';

const { y } = useWindowScroll();
const isScrolled = computed(() => y.value > 80);
const mobileOpen = ref(false);
const activeDropdown = ref<string | null>(null);

interface MenuItem {
    label: string;
    href: string;
    children?: { label: string; href: string }[];
}

const menuItems: MenuItem[] = [
    {
        label: 'HOME',
        href: '#',
        children: [
            { label: 'Carpenter', href: '#' },
            { label: 'Forestry', href: '#' },
            { label: 'Woodworks', href: '#' },
            { label: 'Store', href: '#' },
        ],
    },
    {
        label: 'ABOUT',
        href: '#about',
        children: [
            { label: 'About Us', href: '#about' },
            { label: 'Our Team', href: '#' },
            { label: 'Testimonials', href: '#testimonials' },
            { label: 'FAQ', href: '#faq' },
            { label: 'Gallery', href: '#portfolio' },
        ],
    },
    { label: 'PORTFOLIO', href: '#portfolio' },
    { label: 'PRICING', href: '#pricing' },
    { label: 'CONTACT', href: '#contact' },
];

const megaMenuItems = [
    { name: 'Carpenter', color: 'bg-timber-orange/20' },
    { name: 'Forestry', color: 'bg-timber-forest/20' },
    { name: 'Woodworks', color: 'bg-timber-gold/20' },
    { name: 'Store', color: 'bg-timber-cream' },
];

function closeMobile(): void {
    mobileOpen.value = false;
}

function openDropdown(label: string): void {
    activeDropdown.value = label;
}

function closeDropdown(): void {
    activeDropdown.value = null;
}
</script>

<template>
    <header
        class="sticky top-0 z-50 w-full transition-all duration-300"
        :class="isScrolled ? 'bg-timber-forest/95 backdrop-blur-sm shadow-lg' : 'bg-transparent'"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    <TreePine class="h-8 w-8 text-timber-orange" :stroke-width="2" />
                    <span class="font-timber text-xl font-bold uppercase tracking-wider text-white">
                        TIMBER
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden items-center gap-8 lg:flex">
                    <template v-for="item in menuItems" :key="item.label">
                        <!-- HOME with mega menu -->
                        <div
                            v-if="item.label === 'HOME'"
                            class="relative"
                            @mouseenter="openDropdown('HOME')"
                            @mouseleave="closeDropdown"
                        >
                            <a
                                :href="item.href"
                                class="flex items-center gap-1 text-sm font-medium tracking-wider text-white transition-colors duration-200 hover:text-timber-orange"
                            >
                                {{ item.label }}
                                <ChevronDown :size="14" class="opacity-60" />
                            </a>

                            <Transition
                                enter-active-class="transition duration-200 ease-out"
                                enter-from-class="translate-y-1 opacity-0"
                                enter-to-class="translate-y-0 opacity-100"
                                leave-active-class="transition duration-150 ease-in"
                                leave-from-class="translate-y-0 opacity-100"
                                leave-to-class="translate-y-1 opacity-0"
                            >
                                <div
                                    v-if="activeDropdown === 'HOME'"
                                    class="absolute left-1/2 top-full mt-4 w-[480px] -translate-x-1/2 rounded-xl bg-white p-6 shadow-2xl"
                                >
                                    <div class="grid grid-cols-2 gap-4">
                                        <a
                                            v-for="mega in megaMenuItems"
                                            :key="mega.name"
                                            href="#"
                                            class="group/card flex flex-col overflow-hidden rounded-lg border border-gray-100 transition-shadow duration-200 hover:shadow-md"
                                        >
                                            <div
                                                class="flex h-24 items-center justify-center"
                                                :class="mega.color"
                                            >
                                                <TreePine class="h-8 w-8 text-timber-forest opacity-40 transition-opacity duration-200 group-hover/card:opacity-70" />
                                            </div>
                                            <div class="p-3">
                                                <p class="text-sm font-semibold text-timber-charcoal">
                                                    {{ mega.name }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </Transition>
                        </div>

                        <!-- Items with dropdown children (not HOME) -->
                        <div
                            v-else-if="item.children"
                            class="relative"
                            @mouseenter="openDropdown(item.label)"
                            @mouseleave="closeDropdown"
                        >
                            <a
                                :href="item.href"
                                class="flex items-center gap-1 text-sm font-medium tracking-wider text-white transition-colors duration-200 hover:text-timber-orange"
                            >
                                {{ item.label }}
                                <ChevronDown :size="14" class="opacity-60" />
                            </a>

                            <Transition
                                enter-active-class="transition duration-200 ease-out"
                                enter-from-class="translate-y-1 opacity-0"
                                enter-to-class="translate-y-0 opacity-100"
                                leave-active-class="transition duration-150 ease-in"
                                leave-from-class="translate-y-0 opacity-100"
                                leave-to-class="translate-y-1 opacity-0"
                            >
                                <div
                                    v-if="activeDropdown === item.label"
                                    class="absolute left-1/2 top-full mt-4 w-52 -translate-x-1/2 rounded-xl bg-white py-2 shadow-2xl"
                                >
                                    <a
                                        v-for="child in item.children"
                                        :key="child.label"
                                        :href="child.href"
                                        class="block px-5 py-2.5 text-sm text-timber-charcoal transition-colors duration-150 hover:bg-timber-cream hover:text-timber-orange"
                                    >
                                        {{ child.label }}
                                    </a>
                                </div>
                            </Transition>
                        </div>

                        <!-- Simple links -->
                        <a
                            v-else
                            :href="item.href"
                            class="text-sm font-medium tracking-wider text-white transition-colors duration-200 hover:text-timber-orange"
                        >
                            {{ item.label }}
                        </a>
                    </template>
                </nav>

                <!-- Desktop Icons -->
                <div class="hidden items-center gap-5 lg:flex">
                    <button
                        type="button"
                        class="text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Search"
                    >
                        <Search class="h-5 w-5" />
                    </button>
                    <button
                        type="button"
                        class="text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Account"
                    >
                        <User class="h-5 w-5" />
                    </button>
                    <button
                        type="button"
                        class="relative text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Cart"
                    >
                        <ShoppingCart class="h-5 w-5" />
                        <span
                            class="absolute -right-2 -top-2 flex h-4 w-4 items-center justify-center rounded-full bg-timber-orange text-[10px] font-bold text-white"
                        >
                            0
                        </span>
                    </button>
                </div>

                <!-- Mobile Hamburger -->
                <button
                    type="button"
                    class="text-white lg:hidden"
                    aria-label="Open menu"
                    @click="mobileOpen = true"
                >
                    <Menu class="h-6 w-6" />
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Overlay -->
        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="mobileOpen"
                class="fixed inset-0 z-40 bg-black/50"
                @click="closeMobile"
            />
        </Transition>

        <!-- Mobile Drawer Panel -->
        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="translate-x-full"
            enter-to-class="translate-x-0"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="translate-x-0"
            leave-to-class="translate-x-full"
        >
            <div
                v-if="mobileOpen"
                class="fixed inset-y-0 right-0 z-50 w-72 bg-timber-forest shadow-2xl"
            >
                <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                    <span class="font-timber text-lg font-bold uppercase tracking-wider text-white">
                        TIMBER
                    </span>
                    <button
                        type="button"
                        class="text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Close menu"
                        @click="closeMobile"
                    >
                        <X class="h-6 w-6" />
                    </button>
                </div>

                <nav class="flex flex-col px-6 py-6">
                    <a
                        v-for="item in menuItems"
                        :key="item.label"
                        :href="item.href"
                        class="border-b border-white/10 py-4 text-sm font-medium tracking-wider text-white transition-colors duration-200 hover:text-timber-orange"
                        @click="closeMobile"
                    >
                        {{ item.label }}
                    </a>
                </nav>

                <div class="flex items-center gap-6 px-6 pt-4">
                    <button
                        type="button"
                        class="text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Search"
                    >
                        <Search class="h-5 w-5" />
                    </button>
                    <button
                        type="button"
                        class="text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Account"
                    >
                        <User class="h-5 w-5" />
                    </button>
                    <button
                        type="button"
                        class="relative text-white transition-colors duration-200 hover:text-timber-orange"
                        aria-label="Cart"
                    >
                        <ShoppingCart class="h-5 w-5" />
                        <span
                            class="absolute -right-2 -top-2 flex h-4 w-4 items-center justify-center rounded-full bg-timber-orange text-[10px] font-bold text-white"
                        >
                            0
                        </span>
                    </button>
                </div>
            </div>
        </Transition>
    </header>
</template>
