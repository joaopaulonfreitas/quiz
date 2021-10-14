<template>
    <Head title="Log in" />

    <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex-1 flex items-center">

        <div v-if="status" class="flex-1 mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="flex-1 flex flex-col space-y-2 md:flex-row items-center">

            <div class="flex-1 text-center">
                <Image name="WinstonNewRecord" class="w-auto h-full max-h-32 md:max-h-80 fill-current text-white"/>
            </div>

            <div class="flex-1 flex flex-col space-y-3">

                <h2 class="text-white text-lg md:text-3xl font-bold uppercase">
                    Lorem ipsum dolor sit amet,  consectetur adipiscing elit.  Cura
                </h2>

                <QuizValidationErrors class="mb-4" />

                <form @submit.prevent="submit" class="flex flex-col space-y-3">

                    <div class="text-left">
                        <BreezeLabel for="name" value="Nome" />
                        <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="nickname" />
                    </div>

                    <div class="text-left">
                        <BreezeLabel for="email" value="E-mail" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <BreezeButton class="ml-4 py-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Começar Agora
                        </BreezeButton>
                    </div>
                </form>

            </div>

        </div>




    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import QuizValidationErrors from '@/Components/ValidationErrorsQuiz.vue'
import Image from '@/Components/Images/Index.vue'

import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        QuizValidationErrors,
        Image,
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                name: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('start'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
