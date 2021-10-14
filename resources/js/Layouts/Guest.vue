<template>
    <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-brand-base"> -->
    <div class="min-h-screen flex flex-col items-center sm:pt-0 bg-brand-base"
        style="
            background-image: url('images/bg-login.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 23%"
    >
        <div class="w-full bg-brand-main">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-4 md:py-6 text-center">
                <Link href="/" class="inline-block">
                    <!-- <Logomarca class="w-36 fill-current text-white" /> -->
                    <Image name="LetsCelebrate" class="w-full max-h-14 md:max-h-16 fill-current text-white" />
                </Link>
            </div>
        </div>

        <div class="flex-1 w-full py-0 md:py-2 lg:py-4 flex flex-col">
            <slot />
        </div>
    </div>
</template>

<script>
import Image from '@/Components/Images/Index.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Image,
        Link,
    }
}
</script>
