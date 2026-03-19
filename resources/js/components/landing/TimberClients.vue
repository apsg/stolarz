<script setup lang="ts">
import { useScrollReveal } from '@/composables/useScrollReveal'

const { scrollRef } = useScrollReveal()
</script>

<template>
    <section :ref="scrollRef" class="scroll-reveal overflow-hidden bg-timber-forest py-10">
        <div class="marquee-track flex items-center gap-16">
            <!-- First set -->
            <div class="flex shrink-0 items-center gap-16">
                <!-- Digital Research Academy -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Digital Research Academy">
                    <circle cx="20" cy="20" r="18" stroke="white" stroke-width="2"/>
                    <text x="20" y="25" text-anchor="middle" font-family="serif" font-size="13" font-weight="700" fill="white">DR</text>
                    <text x="50" y="16" font-family="sans-serif" font-size="10" font-weight="600" fill="white">DIGITAL</text>
                    <text x="50" y="28" font-family="sans-serif" font-size="10" font-weight="600" fill="white">RESEARCH</text>
                    <text x="50" y="38" font-family="sans-serif" font-size="8" fill="white" opacity="0.7">ACADEMY</text>
                </svg>

                <!-- Nadia Farel Photography -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 130 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Nadia Farel Photography">
                    <text x="2" y="32" font-family="Georgia, serif" font-size="30" font-style="italic" font-weight="400" fill="white">NF</text>
                    <text x="48" y="20" font-family="sans-serif" font-size="9" letter-spacing="2" fill="white">NADIA FAREL</text>
                    <line x1="48" y1="24" x2="128" y2="24" stroke="white" stroke-width="0.5"/>
                    <text x="48" y="34" font-family="sans-serif" font-size="8" letter-spacing="1" fill="white" opacity="0.7">PHOTOGRAPHY</text>
                </svg>

                <!-- Artisan Co -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 100 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Artisan Co">
                    <circle cx="20" cy="20" r="17" stroke="white" stroke-width="1.5"/>
                    <text x="20" y="25" text-anchor="middle" font-family="Georgia, serif" font-size="16" font-weight="700" fill="white">A</text>
                    <text x="44" y="18" font-family="sans-serif" font-size="11" font-weight="700" letter-spacing="2" fill="white">ARTISAN</text>
                    <text x="44" y="32" font-family="sans-serif" font-size="10" letter-spacing="3" fill="white" opacity="0.7">CO.</text>
                </svg>

                <!-- Natural -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 110 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Natural">
                    <path d="M20 32 C20 32 10 22 12 14 C14 6 20 8 20 14 C20 8 26 6 28 14 C30 22 20 32 20 32Z" fill="white"/>
                    <line x1="20" y1="32" x2="20" y2="38" stroke="white" stroke-width="1.5"/>
                    <text x="36" y="25" font-family="sans-serif" font-size="14" font-weight="700" letter-spacing="3" fill="white">NATURAL</text>
                </svg>

                <!-- AW Design -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 110 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="AW Design">
                    <text x="2" y="32" font-family="Georgia, serif" font-size="28" font-weight="700" fill="white">AW</text>
                    <text x="56" y="20" font-family="sans-serif" font-size="9" letter-spacing="2" fill="white">DESIGN</text>
                    <line x1="56" y1="23" x2="108" y2="23" stroke="white" stroke-width="0.5"/>
                    <text x="56" y="33" font-family="sans-serif" font-size="8" letter-spacing="1" fill="white" opacity="0.6">STUDIO</text>
                </svg>

                <!-- M Photography -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="M Photography">
                    <polygon points="20,4 36,20 20,36 4,20" stroke="white" stroke-width="1.5" fill="none"/>
                    <text x="20" y="25" text-anchor="middle" font-family="Georgia, serif" font-size="16" font-weight="700" fill="white">M</text>
                    <text x="44" y="18" font-family="sans-serif" font-size="10" font-weight="600" letter-spacing="1" fill="white">M PHOTO-</text>
                    <text x="44" y="31" font-family="sans-serif" font-size="10" font-weight="600" letter-spacing="1" fill="white">GRAPHY</text>
                </svg>

                <!-- Timber Alliance -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 130 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Timber Alliance">
                    <path d="M20 34 L12 20 L16 20 L16 10 L24 10 L24 20 L28 20 Z" fill="white"/>
                    <path d="M20 10 L14 18 L26 18 Z" fill="white" opacity="0.6"/>
                    <text x="36" y="20" font-family="sans-serif" font-size="11" font-weight="700" letter-spacing="2" fill="white">TIMBER</text>
                    <text x="36" y="34" font-family="sans-serif" font-size="10" letter-spacing="2" fill="white" opacity="0.7">ALLIANCE</text>
                </svg>
            </div>

            <!-- Duplicated set for seamless loop -->
            <div class="flex shrink-0 items-center gap-16" aria-hidden="true">
                <!-- Digital Research Academy -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="18" stroke="white" stroke-width="2"/>
                    <text x="20" y="25" text-anchor="middle" font-family="serif" font-size="13" font-weight="700" fill="white">DR</text>
                    <text x="50" y="16" font-family="sans-serif" font-size="10" font-weight="600" fill="white">DIGITAL</text>
                    <text x="50" y="28" font-family="sans-serif" font-size="10" font-weight="600" fill="white">RESEARCH</text>
                    <text x="50" y="38" font-family="sans-serif" font-size="8" fill="white" opacity="0.7">ACADEMY</text>
                </svg>

                <!-- Nadia Farel Photography -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 130 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="2" y="32" font-family="Georgia, serif" font-size="30" font-style="italic" font-weight="400" fill="white">NF</text>
                    <text x="48" y="20" font-family="sans-serif" font-size="9" letter-spacing="2" fill="white">NADIA FAREL</text>
                    <line x1="48" y1="24" x2="128" y2="24" stroke="white" stroke-width="0.5"/>
                    <text x="48" y="34" font-family="sans-serif" font-size="8" letter-spacing="1" fill="white" opacity="0.7">PHOTOGRAPHY</text>
                </svg>

                <!-- Artisan Co -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 100 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="17" stroke="white" stroke-width="1.5"/>
                    <text x="20" y="25" text-anchor="middle" font-family="Georgia, serif" font-size="16" font-weight="700" fill="white">A</text>
                    <text x="44" y="18" font-family="sans-serif" font-size="11" font-weight="700" letter-spacing="2" fill="white">ARTISAN</text>
                    <text x="44" y="32" font-family="sans-serif" font-size="10" letter-spacing="3" fill="white" opacity="0.7">CO.</text>
                </svg>

                <!-- Natural -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 110 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 32 C20 32 10 22 12 14 C14 6 20 8 20 14 C20 8 26 6 28 14 C30 22 20 32 20 32Z" fill="white"/>
                    <line x1="20" y1="32" x2="20" y2="38" stroke="white" stroke-width="1.5"/>
                    <text x="36" y="25" font-family="sans-serif" font-size="14" font-weight="700" letter-spacing="3" fill="white">NATURAL</text>
                </svg>

                <!-- AW Design -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 110 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="2" y="32" font-family="Georgia, serif" font-size="28" font-weight="700" fill="white">AW</text>
                    <text x="56" y="20" font-family="sans-serif" font-size="9" letter-spacing="2" fill="white">DESIGN</text>
                    <line x1="56" y1="23" x2="108" y2="23" stroke="white" stroke-width="0.5"/>
                    <text x="56" y="33" font-family="sans-serif" font-size="8" letter-spacing="1" fill="white" opacity="0.6">STUDIO</text>
                </svg>

                <!-- M Photography -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="20,4 36,20 20,36 4,20" stroke="white" stroke-width="1.5" fill="none"/>
                    <text x="20" y="25" text-anchor="middle" font-family="Georgia, serif" font-size="16" font-weight="700" fill="white">M</text>
                    <text x="44" y="18" font-family="sans-serif" font-size="10" font-weight="600" letter-spacing="1" fill="white">M PHOTO-</text>
                    <text x="44" y="31" font-family="sans-serif" font-size="10" font-weight="600" letter-spacing="1" fill="white">GRAPHY</text>
                </svg>

                <!-- Timber Alliance -->
                <svg class="h-10 w-auto opacity-60 transition hover:opacity-100" viewBox="0 0 130 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 34 L12 20 L16 20 L16 10 L24 10 L24 20 L28 20 Z" fill="white"/>
                    <path d="M20 10 L14 18 L26 18 Z" fill="white" opacity="0.6"/>
                    <text x="36" y="20" font-family="sans-serif" font-size="11" font-weight="700" letter-spacing="2" fill="white">TIMBER</text>
                    <text x="36" y="34" font-family="sans-serif" font-size="10" letter-spacing="2" fill="white" opacity="0.7">ALLIANCE</text>
                </svg>
            </div>
        </div>
    </section>
</template>

<style scoped>
.marquee-track {
    animation: marquee 25s linear infinite;
}

.marquee-track:hover {
    animation-play-state: paused;
}

@keyframes marquee {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}
</style>
