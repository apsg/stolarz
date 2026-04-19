<script setup lang="ts">
import { reactive } from 'vue';
import { Phone, LucideMail } from 'lucide-vue-next';
import { useScrollReveal } from '@/composables/useScrollReveal';

const { scrollRef } = useScrollReveal();

const form = reactive({
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    service: '',
});
</script>

<template>
    <section id="contact" class="relative min-h-[600px] py-20">
        <div class="absolute inset-0">
            <img
                src="https://images.unsplash.com/photo-1448375240586-882707db888b?w=1920&q=80"
                alt="Misty forest background"
                class="h-full w-full object-cover"
            />
            <div class="absolute inset-0 bg-black/50" />
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                :ref="scrollRef"
                class="scroll-reveal mx-auto max-w-2xl rounded-2xl bg-white p-8 shadow-2xl lg:p-12"
            >
                <h2
                    class="mb-8 text-2xl font-bold text-timber-charcoal uppercase"
                >
                    SKONTAKTUJ SIĘ Z NAMI
                </h2>

                <form @submit.prevent>
                    <div class="mb-4">
                        <label
                            class="mb-1 block text-sm font-semibold tracking-wider text-timber-charcoal/70 uppercase"
                        >
                            Imię i nazwisko
                        </label>
                        <input
                            v-model="form.firstName"
                            type="text"
                            placeholder="Imię i nazwisko"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            class="mb-1 block text-sm font-semibold tracking-wider text-timber-charcoal/70 uppercase"
                        >
                            Email
                        </label>
                        <input
                            v-model="form.email"
                            type="email"
                            placeholder="Email"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            class="mb-1 block text-sm font-semibold tracking-wider text-timber-charcoal/70 uppercase"
                        >
                            Telefon
                        </label>
                        <input
                            v-model="form.phone"
                            type="tel"
                            placeholder="Telefon"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            class="mb-1 block text-sm font-semibold tracking-wider text-timber-charcoal/70 uppercase"
                        >
                            Wiadomość
                        </label>
                        <textarea
                            v-model="form.message"
                            type="tel"
                            placeholder="Wpisz wiadomość"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        ></textarea>
                    </div>

                    <div class="flex flex-col items-stretch gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <button
                            type="submit"
                            class="bg-timber-terracotta hover:bg-timber-terracotta-hover w-full rounded-full px-12 py-3 font-semibold tracking-wider text-white uppercase transition sm:w-auto"
                        >
                            SUBMIT
                        </button>

                        <div
                            class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm text-timber-charcoal/70"
                        >
                            <span>Skontaktuj się z nami bezpośrednio:</span>
                            <a href="tel:664014532" class="inline-flex items-center gap-2">
                                <Phone class="text-timber-terracotta h-4 w-4 shrink-0" />
                                <span class="font-semibold">664&nbsp;014&nbsp;532</span>
                            </a>
                            <a href="mailto:stolarzpj@wp.pl" class="inline-flex items-center gap-2 min-w-0">
                                <LucideMail class="text-timber-terracotta h-4 w-4 shrink-0" />
                                <span class="font-semibold break-all">stolarzpj@wp.pl</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
