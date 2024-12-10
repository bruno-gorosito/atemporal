<template>
    <Header />
    <main class="container mx-auto">
        <slot />
    </main>
</template>

<script setup>
import Header from '@/Components/Header.vue';
</script>