<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import TimberHeader from '@/components/landing/TimberHeader.vue'
import TimberHero from '@/components/landing/TimberHero.vue'
import TimberAbout from '@/components/landing/TimberAbout.vue'
import TimberFeatures from '@/components/landing/TimberFeatures.vue'
import TimberPortfolio from '@/components/landing/TimberPortfolio.vue'
import TimberPricing from '@/components/landing/TimberPricing.vue'
import TimberCraftsman from '@/components/landing/TimberCraftsman.vue'
import TimberTestimonials from '@/components/landing/TimberTestimonials.vue'
import TimberVideo from '@/components/landing/TimberVideo.vue'
import TimberClients from '@/components/landing/TimberClients.vue'
import TimberFaq from '@/components/landing/TimberFaq.vue'
import TimberContact from '@/components/landing/TimberContact.vue'
import TimberFooter from '@/components/landing/TimberFooter.vue'
</script>

<template>
    <Head title="Timber - Carpentry & Joinery">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="font-timber text-timber-charcoal">
        <TimberHeader />
        <TimberHero />
        <TimberAbout />
        <TimberFeatures />
        <TimberPortfolio />
        <TimberPricing />
        <TimberCraftsman />
        <TimberTestimonials />
        <TimberVideo />
        <TimberClients />
        <TimberFaq />
        <TimberContact />
        <TimberFooter />
    </div>
</template>
