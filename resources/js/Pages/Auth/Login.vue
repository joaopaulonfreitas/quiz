<template>
    <Head title="Log in" />

    <BreezeValidationErrors class="mb-4" />

    <div class="w-full max-w-6xl mx-auto sm:px-6 lg:px-8 text-center flex-1 flex items-center">

        <div v-if="status" class="flex-1 mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="flex-1 flex items-center">

            <div class="flex-1 text-center">
                <Image name="WinstonNewRecord" class="w-auto h-full max-h-80 fill-current text-white"/>
            </div>

            <div class="flex-1 flex flex-col space-y-6">
                <h2 class="text-white text-3xl font-bold uppercase">Lorem ipsum dolor sit amet,  consectetur adipiscing elit.  Cura</h2>

                <form @submit.prevent="submit">
                    <div class="text-left">
                        <BreezeLabel for="email" value="E-mail" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4 text-left">
                        <BreezeLabel for="password" value="Senha"/>
                        <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <BreezeButton class="ml-4 py-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Começar Agora
                        </BreezeButton>
                    </div>
                </form>

                <p class="text-gray-100">OU</p>

                <div>

                    <Link :href="route('register')" class="ml-4 text-sm text-gray-100 border border-gray-100 py-3 px-6 rounded">
                        Cadastre-se
                    </Link>

                </div>
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
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import Image from '@/Components/Images/Index.vue'

import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
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
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
