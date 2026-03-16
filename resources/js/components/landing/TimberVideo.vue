<script setup lang="ts">
import { Play } from 'lucide-vue-next'
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog'
</script>

<template>
    <section
        class="relative flex min-h-[400px] items-center justify-center py-32"
        :style="{
            backgroundImage: 'url(https://images.unsplash.com/photo-1504148455328-c376907d081c?w=1920&q=80)',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
        }"
    >
        <div class="absolute inset-0 bg-black/50" />

        <div class="relative z-10 flex items-center justify-center">
            <Dialog>
                <DialogTrigger as-child>
                    <button
                        type="button"
                        class="group relative flex items-center justify-center"
                        aria-label="Play video"
                    >
                        <span class="pulse-ring absolute size-20 rounded-full border-2 border-white/40" />

                        <span
                            class="relative flex size-20 items-center justify-center rounded-full bg-white/90 shadow-lg transition-transform group-hover:scale-105"
                        >
                            <Play :size="32" class="ml-1 text-timber-orange" />
                        </span>
                    </button>
                </DialogTrigger>

                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Video Preview</DialogTitle>
                    </DialogHeader>
                    <div class="flex items-center justify-center py-12 text-timber-charcoal/60">
                        <p class="text-lg">Video coming soon</p>
                    </div>
                </DialogContent>
            </Dialog>
        </div>
    </section>
</template>

<style scoped>
.pulse-ring {
    animation: pulse-ring 2s ease-out infinite;
}
</style>
