<script setup lang="ts">
import { reactive } from 'vue';
import { Phone } from 'lucide-vue-next';
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
                <h2 class="mb-8 text-2xl font-bold uppercase text-timber-charcoal">
                    MAKE AN APPOINTMENT
                </h2>

                <form @submit.prevent>
                    <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-semibold uppercase tracking-wider text-timber-charcoal/70">
                                First Name
                            </label>
                            <input
                                v-model="form.firstName"
                                type="text"
                                placeholder="First Name"
                                class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                            />
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold uppercase tracking-wider text-timber-charcoal/70">
                                Last Name
                            </label>
                            <input
                                v-model="form.lastName"
                                type="text"
                                placeholder="Last Name"
                                class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                            />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-semibold uppercase tracking-wider text-timber-charcoal/70">
                            Email
                        </label>
                        <input
                            v-model="form.email"
                            type="email"
                            placeholder="Email Address"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        />
                    </div>

                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-semibold uppercase tracking-wider text-timber-charcoal/70">
                            Phone Number
                        </label>
                        <input
                            v-model="form.phone"
                            type="tel"
                            placeholder="Phone Number"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        />
                    </div>

                    <div class="mb-6">
                        <label class="mb-1 block text-sm font-semibold uppercase tracking-wider text-timber-charcoal/70">
                            Carpenter Service
                        </label>
                        <select
                            v-model="form.service"
                            class="w-full rounded-lg border border-timber-charcoal/20 bg-white px-4 py-3 transition focus:border-timber-orange focus:outline-none"
                        >
                            <option value="">Select a service</option>
                            <option value="kitchen-design">Kitchen Design</option>
                            <option value="custom-furniture">Custom Furniture</option>
                            <option value="deck-construction">Deck Construction</option>
                            <option value="interior-finishing">Interior Finishing</option>
                            <option value="furniture-restoration">Furniture Restoration</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <button
                            type="submit"
                            class="rounded-full bg-timber-terracotta px-12 py-3 font-semibold uppercase tracking-wider text-white transition hover:bg-timber-terracotta-hover"
                        >
                            SUBMIT
                        </button>

                        <div class="flex items-center gap-3 text-sm text-timber-charcoal/70">
                            <span>Make an appointment by phone:</span>
                            <Phone class="h-4 w-4 text-timber-terracotta" />
                            <span class="font-semibold">2-583-018-36-28</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
