<template>
    <article class="w-full p-3" v-for="(question, index) in questions" :key="index" v-show="index === 0">

        <h5 class="question font-bold text-left mb-3">{{question.question}}</h5>

        <ul class="answers flex flex-col  justify-start space-y-2 text-left mb-3 py-4 border-bottom border-gray-300">

            <li v-for="(answer, index) in question.options" :key="index">
                <span
                    class="inline-block py-2 px-4 bg-gray-200 hover:bg-brand-base hover:text-white cursor-pointer transition rounded text-xs font-semibold"
                    :class="{'bg-brand-base text-white': answerSelected.answer == answer.id}"
                    @click.prevent="onAnswerSelected(question, answer)"
                >
                    {{answer.text}}
                </span>
            </li>

        </ul>

        <BreezeButton @click.prevent="onSubmit">Confirmar</BreezeButton>

    </article>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'

export default {

    components: {
        BreezeButton
    },

    props: {
         questions: Array,
         questionAnswered: Number
    },

    emits: ['answer-selected', 'answered-submit'],

    data() {
        return {
            answerSelected: {
                question: Number,
                answer: Number
            }
        }
    },

    methods: {
        onAnswerSelected(question, answer){
            this.answerSelected.question = question.id,
            this.answerSelected.answer = answer.id;
            this.$emit('answer-selected', this.answerSelected)
        },

        onSubmit(){
            this.$emit('answered-submit', this.answerSelected)
        },
    }
}
</script>
