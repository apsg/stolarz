<script setup lang="ts">
import { computed, ref, watch } from 'vue';
import { useEventListener, useScrollLock } from '@vueuse/core';
import { ChevronLeft, ChevronRight, X } from 'lucide-vue-next';

interface GalleryImage {
    url: string;
    filename: string;
}

const props = defineProps<{
    images: GalleryImage[];
    open: boolean;
    startIndex: number;
}>();

const emit = defineEmits<{
    close: [];
}>();

const currentIndex = ref(props.startIndex);

const current = computed<GalleryImage | null>(
    () => props.images[currentIndex.value] ?? null,
);

const scrollLock = useScrollLock(
    typeof document !== 'undefined' ? document.body : null,
);

watch(
    () => [props.open, props.startIndex] as const,
    ([isOpen, index]) => {
        if (isOpen) {
            currentIndex.value = index;
            scrollLock.value = true;
        } else {
            scrollLock.value = false;
        }
    },
);

function close(): void {
    emit('close');
}

function next(): void {
    if (props.images.length === 0) {
        return;
    }
    currentIndex.value = (currentIndex.value + 1) % props.images.length;
}

function prev(): void {
    if (props.images.length === 0) {
        return;
    }
    currentIndex.value =
        (currentIndex.value - 1 + props.images.length) % props.images.length;
}

useEventListener('keydown', (event: KeyboardEvent) => {
    if (!props.open) {
        return;
    }
    if (event.key === 'Escape') {
        close();
    } else if (event.key === 'ArrowRight') {
        next();
    } else if (event.key === 'ArrowLeft') {
        prev();
    }
});
</script>

<template>
    <Transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition duration-150 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="open && current"
            class="fixed inset-0 z-[60] flex items-center justify-center bg-black/95"
            role="dialog"
            aria-modal="true"
            @click.self="close"
        >
            <button
                type="button"
                class="absolute top-5 right-5 rounded-full bg-white/10 p-2 text-white transition hover:bg-white/20 focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                aria-label="Zamknij"
                @click="close"
            >
                <X class="h-6 w-6" />
            </button>

            <button
                v-if="images.length > 1"
                type="button"
                class="absolute left-4 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-2 text-white transition hover:bg-white/20 focus:outline-none focus-visible:ring-2 focus-visible:ring-white md:left-8"
                aria-label="Poprzednie zdjęcie"
                @click.stop="prev"
            >
                <ChevronLeft class="h-7 w-7" />
            </button>

            <button
                v-if="images.length > 1"
                type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-2 text-white transition hover:bg-white/20 focus:outline-none focus-visible:ring-2 focus-visible:ring-white md:right-8"
                aria-label="Następne zdjęcie"
                @click.stop="next"
            >
                <ChevronRight class="h-7 w-7" />
            </button>

            <img
                :src="current.url"
                :alt="current.filename"
                class="max-h-[85vh] max-w-[90vw] cursor-pointer rounded-lg object-contain shadow-2xl select-none"
                @click.stop="next"
            />

            <div
                v-if="images.length > 1"
                class="absolute bottom-6 left-1/2 -translate-x-1/2 rounded-full bg-white/10 px-4 py-1.5 text-sm font-medium text-white backdrop-blur-sm"
            >
                {{ currentIndex + 1 }} / {{ images.length }}
            </div>
        </div>
    </Transition>
</template>
