<template>
    <Head title="Quiz" />

    <section class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex-1 flex items-center">

        <div class="flex-1 flex flex-col items-center bg-white shadown rounded-md overflow-hidden">

            <QuizValidationErrors class="mb-4" />

            <template v-if="questionAnswered.length < totalQuestions">

                <header class="w-full">
                    <h1 class="bg-brand-main text-white p-3 text-lg md:text-3xl font-bold uppercase">
                        Bem vindo(a) ao nosso quiz
                    </h1>
                </header>

                <!-- Cronometro -->
                <Temporizador :minutes="minutes" :seconds="seconds" @finaly-timer="onFinalyTimerSubmit"/>

                <!-- Progressbar -->
                <div class="progress w-full relative bg-gray-100 py-1 text-xs">
                    <div class="bar w-28 h-full bg-brand-base absolute inset-0"
                        :style="{width: `${(questionAnswered.length / totalQuestions) * 100}%`} "
                    ></div>
                    <div class="status">{{questionAnswered.length}} de {{totalQuestions}} perguntas respondidas</div>
                </div>

                <!-- Perguntas -->
                <Questions
                    :questions="remainingQuestions"
                    :questionAnswered="questionAnswered.length"
                    @answer-selected="onAnsweredSelected"
                    @answered-submit="onAnsweredSubmit"
                    />

            </template>

            <template v-else>
                <h1 class="font-bold py-3">Parabéns {{ $page.props.auth.user.name }}, você completou o Quiz e ganhou!</h1>
                <p>Para comemorar e receber seu prêmio troque com ajuda do Photobook na nossa área internet.</p>
                <p class="mb-3">A nossa equipe entrará em contato para confirmar sua premiação.</p>
            </template>

<!-- //
// <p>Para comemorar e receber seu prêmio troque com ajuda do Photobook na nossa área internet.</p>
// <p>A nossa equipe entrará em contato para confirmar sua premiação.</p>

// <h3>Que pena! Você não conseguiu completar nosso Quiz! Corretamente.</h3>
// <p>Muito obrigado pela sua participação.</p> -->

        </div>




    </section>
</template>

<script>
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeButton from '@/Components/Button.vue'
import QuizValidationErrors from '@/Components/ValidationErrorsQuiz.vue'

import { Head, Link } from '@inertiajs/inertia-vue3';

import Questions from '@/Components/Quiz/Questions.vue'
import Temporizador from '@/Components/Quiz/Temporizador.vue'

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        QuizValidationErrors,
        Head,
        Link,
        Questions,
        Temporizador
    },

    props: {
        questions: Array,
        status: String,
    },

    data() {
        return {
            minutes: 0,
            seconds: 10,

            totalQuestions: 0,
            questionAnswered: {},
            remainingQuestions: {},

            answerSelected: {
                question: '',
                answer: '',
                log: ''
            }
        }
    },

    mounted(){
        this.totalQuestions = this.$props.questions.length
        this.questionAnswered = this.$props.questions.filter((question) => question.answered)
        this.remainingQuestions = this.$props.questions.filter((question) => !question.answered)
    },

    methods: {

        onAnsweredSelected(answerSelected)
        {
            this.answerSelected = answerSelected
        },

        onAnsweredSubmit()
        {
            if(this.answerSelected.question && this.answerSelected.answer){

                this.$inertia.post(this.route('quiz.answer'),this.answerSelected,
                {
                    onFinish: () => {
                        let q = this.remainingQuestions.filter((question) => question.id === this.answerSelected.question)

                        if(q.length)
                            this.questionAnswered.push(q)

                        this.remainingQuestions = this.remainingQuestions.filter((question) => question.id !== this.answerSelected.question)
                        this.minutes = 1
                        this.seconds = 1
                    }
                })

            }
        },

        onFinalyTimerSubmit()
        {
            this.$inertia.post(this.route('quiz.answer'),{
                question: this.answerSelected.question || this.remainingQuestions[0].id,
                answer: this.answerSelected.answer || null,
                log: "Tempo esgotado"
            },
            {
                onFinish: () => {

                    let q = this.remainingQuestions.filter((question) => question.id === (this.answerSelected.question || this.remainingQuestions[0].id))

                    if(q.length)
                        this.questionAnswered.push(q)

                    this.remainingQuestions = this.remainingQuestions.filter((question) => question.id !== (this.answerSelected.question || this.remainingQuestions[0].id))
                    this.minutes = 0
                    this.seconds = 10
                }
            })
        },

        onRestart()
        {
            this.$inertia.post(this.route('quiz.delete'), {id: 2}, {
                onSuccess: () => {
                    this.totalQuestions = this.$props.questions.length
                    this.questionAnswered = this.$props.questions.filter((question) => question.answered)
                    this.remainingQuestions = this.$props.questions.filter((question) => !question.answered)
                }
            })
        }
    }
}
</script>


