<template>
    <div>
        <div class="relative flex flex-col min-h-screen bg-brand-base sm:pt-0">

            <!-- Page Heading -->
            <WebHeader v-if="$slots.header" class="">
                <slot name="header" />
            </WebHeader>

            <!-- Page Content -->
            <main class="w-full flex flex-col flex-1">
                <slot />
            </main>

            <!-- Page Footer
            <footer class="w-full bg-black" v-if="$slots.footer">
                <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="footer" />
                </div>
            </footer> -->

        </div>
    </div>
</template>

<script>
import WebHeader from '@/Layouts/Web/Header.vue'

export default {
    components: {
        WebHeader
    }
}
</script>

<style>

</style>
