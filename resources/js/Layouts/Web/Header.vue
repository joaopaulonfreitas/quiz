<template>
    <header class="w-full" :class="pClass">
        <slot />
    </header>
</template>

<script>
export default {
    props: {
        pClass: String
    }
}
</script>

<style>

</style>
