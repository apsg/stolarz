<script setup lang="ts">
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { useWindowScroll } from '@vueuse/core';
import { Menu, X, ChevronDown } from 'lucide-vue-next';
import { show as galleryShow } from '@/routes/gallery';

const page = usePage();
const cartCount = computed(() => page.props.cart?.items_count ?? 0);

const { y } = useWindowScroll();
const isScrolled = computed(() => y.value > 80);
const mobileOpen = ref(false);
const activeDropdown = ref<string | null>(null);

interface MenuChild {
    label: string;
    href: string;
    inertia?: boolean;
}

interface MenuItem {
    label: string;
    href: string;
    inertia?: boolean;
    children?: MenuChild[];
}

const galleryChildren: MenuChild[] = [
    { label: 'Schody', href: galleryShow({ slug: 'schody' }).url, inertia: true },
    { label: 'Drzwi', href: galleryShow({ slug: 'drzwi' }).url, inertia: true },
    { label: 'Kuchnie', href: galleryShow({ slug: 'kuchnie' }).url, inertia: true },
    { label: 'Meble', href: galleryShow({ slug: 'meble' }).url, inertia: true },
    { label: 'Inne', href: galleryShow({ slug: 'inne' }).url, inertia: true },
];

const menuItems: MenuItem[] = [
    {
        label: 'START',
        href: '/',
        inertia: true,
    },
    {
        label: 'O STOLARNI',
        href: '/#about',
    },
    {
        label: 'GALERIA',
        href: galleryShow({ slug: 'kuchnie' }).url,
        inertia: true,
        children: galleryChildren,
    },
    { label: 'KONTAKT', href: '/#contact' },
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
        class="fixed top-0 right-0 left-0 z-50 w-full transition-all duration-300"
        :class="
            isScrolled
                ? 'bg-timber-forest-dark/95 shadow-lg backdrop-blur-sm'
                : 'bg-transparent'
        "
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    <img
                        src="/images/logo.svg"
                        alt="Stolarz Piotr Jędrzejewski"
                        class="h-10 w-auto"
                    />
                    <span
                        class="font-timber text-xl font-bold tracking-wider text-timber-gold uppercase"
                    >
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden items-center gap-8 lg:flex">
                    <template v-for="item in menuItems" :key="item.label">
                        <!-- Items with dropdown children -->
                        <div
                            v-if="item.children"
                            class="relative"
                            @mouseenter="openDropdown(item.label)"
                            @mouseleave="closeDropdown"
                        >
                            <component
                                :is="item.inertia ? Link : 'a'"
                                :href="item.href"
                                class="flex items-center gap-1 text-xs font-medium tracking-widest text-white transition-colors duration-200 hover:text-timber-orange"
                            >
                                {{ item.label }}
                                <ChevronDown :size="14" class="opacity-60" />
                            </component>

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
                                    class="absolute top-full left-1/2 mt-4 w-52 -translate-x-1/2 rounded-xl bg-white py-2 shadow-2xl"
                                >
                                    <component
                                        :is="child.inertia ? Link : 'a'"
                                        v-for="child in item.children"
                                        :key="child.label"
                                        :href="child.href"
                                        class="block px-5 py-2.5 text-sm text-timber-charcoal transition-colors duration-150 hover:bg-timber-cream hover:text-timber-orange"
                                    >
                                        {{ child.label }}
                                    </component>
                                </div>
                            </Transition>
                        </div>

                        <!-- Simple links -->
                        <component
                            :is="item.inertia ? Link : 'a'"
                            v-else
                            :href="item.href"
                            class="text-xs font-medium tracking-widest text-white transition-colors duration-200 hover:text-timber-orange"
                        >
                            {{ item.label }}
                        </component>
                    </template>
                </nav>

                <!-- Desktop Icons -->
                <!--                <div class="hidden items-center gap-5 lg:flex">-->
                <!--                    <button-->
                <!--                        type="button"-->
                <!--                        class="flex flex-col items-center gap-0.5 text-white transition-colors duration-200 hover:text-timber-orange"-->
                <!--                        aria-label="Search"-->
                <!--                    >-->
                <!--                        <Search class="h-5 w-5" />-->
                <!--                        <span class="text-[9px] font-medium uppercase tracking-widest">search</span>-->
                <!--                    </button>-->
                <!--                    <button-->
                <!--                        type="button"-->
                <!--                        class="flex flex-col items-center gap-0.5 text-white transition-colors duration-200 hover:text-timber-orange"-->
                <!--                        aria-label="Account"-->
                <!--                    >-->
                <!--                        <User class="h-5 w-5" />-->
                <!--                        <span class="text-[9px] font-medium uppercase tracking-widest">login</span>-->
                <!--                    </button>-->
                <!--                    <a-->
                <!--                        href="/cart"-->
                <!--                        class="flex flex-col items-center gap-0.5 text-white transition-colors duration-200 hover:text-timber-orange"-->
                <!--                        aria-label="Cart"-->
                <!--                    >-->
                <!--                        <div class="relative">-->
                <!--                            <ShoppingCart class="h-5 w-5" />-->
                <!--                            <span-->
                <!--                                v-if="cartCount > 0"-->
                <!--                                class="absolute -right-2 -top-2 flex h-4 w-4 items-center justify-center rounded-full bg-timber-orange text-[10px] font-bold text-white"-->
                <!--                            >-->
                <!--                                {{ cartCount }}-->
                <!--                            </span>-->
                <!--                        </div>-->
                <!--                        <span class="text-[9px] font-medium uppercase tracking-widest">cart {{ cartCount }}</span>-->
                <!--                    </a>-->
                <!--                </div>-->

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
                <div
                    class="flex items-center justify-between border-b border-white/10 px-6 py-5"
                >
                    <div class="flex items-center gap-2">
                        <img
                            src="/images/logo.png"
                            alt="Lumbert"
                            class="h-8 w-auto"
                        />
                        <span
                            class="font-timber text-lg font-bold tracking-wider text-timber-gold uppercase"
                        >
                            LUMBERT
                        </span>
                    </div>
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
                    <template v-for="item in menuItems" :key="item.label">
                        <component
                            :is="item.inertia ? Link : 'a'"
                            :href="item.href"
                            class="border-b border-white/10 py-4 text-xs font-medium tracking-widest text-white transition-colors duration-200 hover:text-timber-orange"
                            @click="closeMobile"
                        >
                            {{ item.label }}
                        </component>
                        <template v-if="item.children">
                            <component
                                :is="child.inertia ? Link : 'a'"
                                v-for="child in item.children"
                                :key="child.label"
                                :href="child.href"
                                class="border-b border-white/10 py-3 pl-4 text-xs tracking-widest text-white/70 uppercase transition-colors duration-200 hover:text-timber-orange"
                                @click="closeMobile"
                            >
                                {{ child.label }}
                            </component>
                        </template>
                    </template>
                </nav>

                <!--                <div class="flex items-center gap-6 px-6 pt-4">-->
                <!--                    <button-->
                <!--                        type="button"-->
                <!--                        class="text-white transition-colors duration-200 hover:text-timber-orange"-->
                <!--                        aria-label="Search"-->
                <!--                    >-->
                <!--                        <Search class="h-5 w-5" />-->
                <!--                    </button>-->
                <!--                    <button-->
                <!--                        type="button"-->
                <!--                        class="text-white transition-colors duration-200 hover:text-timber-orange"-->
                <!--                        aria-label="Account"-->
                <!--                    >-->
                <!--                        <User class="h-5 w-5" />-->
                <!--                    </button>-->
                <!--                    <a-->
                <!--                        href="/cart"-->
                <!--                        class="relative text-white transition-colors duration-200 hover:text-timber-orange"-->
                <!--                        aria-label="Cart"-->
                <!--                    >-->
                <!--                        <ShoppingCart class="h-5 w-5" />-->
                <!--                        <span-->
                <!--                            v-if="cartCount > 0"-->
                <!--                            class="absolute -right-2 -top-2 flex h-4 w-4 items-center justify-center rounded-full bg-timber-orange text-[10px] font-bold text-white"-->
                <!--                        >-->
                <!--                            {{ cartCount }}-->
                <!--                        </span>-->
                <!--                    </a>-->
                <!--                </div>-->
            </div>
        </Transition>
    </header>
</template>
