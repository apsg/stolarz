<script setup lang="ts">
const features = [
    {
        title: 'LITE DREWNO DĘBOWE',
        description: 'Używamy wyłącznie naturalnego drewna dębowego w klasach rustic oraz A/B – pięknego i trwałego.',
    },
    {
        title: 'KONTROLA JAKOŚCI',
        description: 'Każdy element przechodzi dokładną kontrolę – od wyboru drewna po końcowe lakierowanie.',
    },
    {
        title: 'INDYWIDUALNE PODEJŚCIE',
        description: 'Każde zamówienie jest realizowane według specyfikacji klienta. Słuchamy i doradzamy.',
    },
    {
        title: 'MEBLE NA WYMIAR',
        description: 'Od projektu po montaż – wykonujemy meble dokładnie dopasowane do Twojego wnętrza.',
    },
]
</script>

<template>
    <section class="bg-white py-14 px-4 overflow-hidden">
        <div class="mx-auto max-w-7xl">
            <div class="marquee-wrapper">
                <div class="marquee-track">
                    <template v-for="repeat in 2" :key="repeat">
                        <div
                            v-for="(feature, index) in features"
                            :key="`${repeat}-${index}`"
                            class="marquee-item text-center"
                            :class="index < features.length - 1 ? 'border-r border-gray-200' : ''"
                        >
                            <div class="mb-4 inline-flex items-center justify-center text-timber-gold">
                                <!-- Tree SVG (Sustainable Forestry) -->
                                <svg v-if="index % 4 === 0" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="24,4 36,20 28,20 38,34 28,34 28,44 20,44 20,34 10,34 20,20 12,20" />
                                </svg>
                                <!-- Shield/Check SVG (Quality Control) -->
                                <svg v-else-if="index % 4 === 1" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M24 4L8 10v14c0 10 7 18 16 20 9-2 16-10 16-20V10L24 4z" />
                                    <polyline points="16,24 21,29 32,18" />
                                </svg>
                                <!-- Team/Users SVG (Expert Team) -->
                                <svg v-else-if="index % 4 === 2" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="18" cy="16" r="6" />
                                    <path d="M6 42c0-8 5-13 12-13s12 5 12 13" />
                                    <circle cx="34" cy="16" r="5" />
                                    <path d="M38 42c0-7 3-11 8-13" />
                                </svg>
                                <!-- Gear SVG (Custom Processing) -->
                                <svg v-else xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="24" cy="24" r="7" />
                                    <path d="M24 6v4M24 38v4M6 24h4M38 24h4M10.1 10.1l2.8 2.8M35.1 35.1l2.8 2.8M10.1 37.9l2.8-2.8M35.1 12.9l2.8-2.8" />
                                </svg>
                            </div>
                            <h3 class="font-timber mb-3 text-lg font-bold uppercase text-timber-charcoal">
                                {{ feature.title }}
                            </h3>
                            <p class="leading-relaxed text-timber-charcoal/70">
                                {{ feature.description }}
                            </p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.marquee-wrapper {
    overflow: hidden;
}

.marquee-track {
    display: flex;
    animation: marquee-scroll 24s linear infinite;
    width: max-content;
}

.marquee-item {
    flex: 0 0 280px;
    padding: 0 2rem;
}

@keyframes marquee-scroll {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}
</style>
