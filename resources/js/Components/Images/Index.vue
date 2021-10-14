<template>
  <component :is="name" v-bind="$props" />
</template>

<script>

// Import Images
import LetsCelebrate from '@/Components/Images/LetsCelebrate.vue'
import WinstonNewRecord from '@/Components/Images/WinstonNewRecord.vue'
import Voucher from '@/Components/Images/Voucher.vue'
import Register from '@/Components/Images/Register.vue'
import HowToParticipate from '@/Components/Images/HowToParticipate.vue'
import Winner from '@/Components/Images/Winner.vue'

export default {
    components: {
        LetsCelebrate,
        WinstonNewRecord,
        Voucher,
        Register,
        HowToParticipate,
        Winner
    },
    props: {
        name: {String, required: true}
    }
}
</script>

<style>

</style>
