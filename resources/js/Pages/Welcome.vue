<template>
    <Head title="Bem Vindo(a) ao Sorteio de 100 do Ifood! " />

    <ThemePage>

        <!-- HEADER -->
        <template #header >
            <div class="hidden md:flex max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 items-center py-6 font-a">

                <!-- MENU -->
                <div class="flex flex-1 space-x-6 items-center justify-center uppercase">

                    <Link href="#home" class="text-sm text-gray-100 font-bold border rounded-full hover:border-brand-main px-4 pt-0.5 transition">
                        Principal
                    </Link>
                    <Link href="#premio" class="text-sm text-gray-100 font-bold border rounded-full hover:border-brand-main px-4 pt-0.5 transition">
                        Prêmio
                    </Link>
                    <Link href="#como-participar" class="text-sm text-gray-100 font-bold border rounded-full hover:border-brand-main px-4 pt-0.5  transition">
                        Como Participar
                    </Link>
                    <Link href="#ganhadores" class="text-sm text-gray-100 font-bold border rounded-full hover:border-brand-main px-4 pt-0.5 transition">
                        Ganhadores
                    </Link>

                </div>

            </div>
        </template>

        <!-- CONTENT -->

        <section class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-start py-6">

            <div class="w-full flex flex-col md:flex-row items-center space-x-8">

                <div class="w-full flex-1">
                    <Image name="WinstonNewRecord" class="w-2/3 max-w-xs fill-current text-white mx-auto"/>
                </div>

                <div class="flex-1">

                    <div class="max-w-sm text-center md:text-left">

                        <h2 class="font-bold text-2xl lg:text-4xl uppercase md:text-justify text-brand-main">
                            Esta nova vitória significa<br />
                            <b class="font-bold text-xl lg:text-5xl">Muito para todos nós.</b>
                        </h2>

                        <p class="my-4 text-center md:text-left text-white text-lg lg:text-2xl uppercase font-bold lis">
                            E por isso convidamos você a jogar um
                            <b class="text-brand-main underline font-bold">Quiz Premiado</b>
                            (Bem facinho porque queremos que você ganhe!).
                        </p>
                    </div>

                </div>

            </div>
            <div class="w-full lg:pt-10 relative text-center flex">
                <Link :href="route('start')" class="w-auto lg:w-full max-w-xs text-center inline-block mx-auto bg-brand-main text-white text-xl transition px-10 pt-1.5 pb-1 rounded-full shadow-sm uppercase font-bold">
                    COMEÇAR
                </Link>

                <Image name="LetsCelebrate" class="w-auto max-h-14 md:max-h-16 fill-current text-white md:absolute bottom-0 right-0" />
            </div>
        </section>

        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col items-start">


                <header class="w-full">
                    <h2 class="w-auto inline-block font-bold text-2xl uppercase text-white
                    border border-brand-main rounded-full px-4 pt-0.5">
                        Premiação
                    </h2>
                </header>

                <div class="flex flex-col md:flex-row items-center py-10">
                    <div class="flex-1">

                        <h3 class="my-6 pr-6 text-white text-xl lg:text-5xl uppercase font-black text-justify">
                            <b class="text-brand-main font-black text-xl lg:text-5xl text-justify">
                            As primeiras 200 pessoas
                            </b>

                            <span class="text-brand-main font-black text-xl lg:text-3xl">
                                Que responderem corretamente às 3 perguntas
                            </span>
                            <span class="text-xl lg:text-3xl font-black">Ganham um voucher</span>
                            MULTICASH NO VALOR DE R$ 100!
                        </h3>

                    </div>
                    <div class="flex-1 text-center md:justify-end">
                        <Image name="Voucher" class="w-full max-h-60 fill-current text-white" />
                    </div>
                </div>

        </section>

        <section class="w-full">

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col items-center">

                <header class="w-full">
                    <h2 class="w-auto inline-block font-bold text-2xl uppercase text-white border border-brand-main rounded-full px-4 pt-0.5">
                        Como participar?
                    </h2>
                </header>

                <div class="flex-1 flex items-center text-center md:justify-center">

                    <article class="flex-1 flex items-center justify-center text-white border-r relative">

                        <div>
                            <!-- <img src="images/icon-user.png" alt="" title="" class="w-2/3 mx-auto"/> -->
                            <Image name="Register" class="w-auto fill-current text-white" />
                            <h5 class="uppercase pr-3 font-bold text-2xl">Cadastre-se</h5>
                        </div>
                        <div class="absolute inset-y-auto -right-10 w-20 bg-brand-base">
                            <img src="images/arrow-right.svg" class="my-2" />
                        </div>
                    </article>

                    <article class="flex-1 flex items-center justify-center text-white border-r relative">

                        <div class="items-center">
                            <!-- <img src="images/icon-question.png" alt="" title="" class="w-2/3 mx-auto"/> -->

                            <Image name="HowToParticipate" class="w-auto fill-current text-white" />
                            <h5 class="uppercase pr-3 font-bold text-2xl">Complete <br>nosso quiz</h5>
                        </div>

                        <div class="absolute inset-y-auto -right-10 w-20 bg-brand-base">
                            <img src="images/arrow-right.svg" class="my-2" />
                        </div>

                    </article>

                    <article class="flex-1 flex flex-col justify-center  text-white">
                        <!-- <img src="images/icon-winner.png" alt="" title="" class="w-2/3 mx-auto" /> -->
                        <Image name="Winner" class="w-auto fill-current text-white" />
                        <h5 class="uppercase font-bold text-2xl">Ganhe</h5>
                        <small class="font-medium uppercase text-xm">Se você for um dos 200 primeiros a preencher corretamente às respostas você ganhará um voucher de R$ 100,00 no iFood.</small>

                    </article>

                </div>

                <div class="w-full flex items-center justify-center space-x-4 pt-6">

                    <img src="images/arrow-right.svg" class="w-20"/>

                    <Link :href="route('start')" class="w-auto max-w-xs text-center inline-block bg-brand-main text-white text-xl transition px-10 pt-1.5 pb-1 rounded-full shadow-sm uppercase font-bold">
                                Participar Agora
                    </Link>

                    <img src="images/arrow-left.svg" class="w-20"/>

                </div>

            </div>

        </section>

        <section class="w-full">

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 flex flex-col items-center text-white">

                <h2 class="font-bold text-xs uppercase mb-8">Regulamento</h2>
                <div class="flex flex-col space-y-4 text-xs font-medium">
                    <p class="w-full">De 15 a 19/10/2021, Winston irá comemorar seu recorde de 2 bilhões de unidades vendidas, na plataforma WORKPLACE JTI.</p>
                    <p class="w-full">No dia 15/10/21 será divulgado no Workplace a ativação e link para acesso à plataforma. Serão 1000 participantes disputando 200 prêmios únicos, ou seja, cada participante somente poderá jogar e ganhar uma única vez. No dia 20/10/21, iremos divulgar os vencedores, que serão os 200 primeiros participantes cadastrados que responderem corretamente a 3 perguntas que iremos divulgar na plataforma como dito acima, a partir do dia 15/10/2021. Ao acessar a plataforma, o participante deve preencher seu nome e seu e-mail JTI.
                    Ao iniciar o quiz, vale prestar bastante atenção porque só será permitido jogar uma vez por cadastro. Após o cadastro realizado, o convidado responde às 03 (três) perguntas de múltipla escolha sequenciais. O tempo para responder a cada pergunta será de 45 segundos. Caso a pessoa não consiga finalizar no tempo pré-determinado ou responda de forma errada, será desclassificada. Caso o convidado acerte a pergunta dentro do tempo pré-estabelecido, seguirá para a segunda pergunta, depois terceira até concluir a fase final. Ao terminar as
                    03 perguntas do quiz, o convidado é direcionado por um botão para a plataforma de fotos Virtual Booth. Lá ele deve selecionar o seu template favorito, tirar uma foto (capriche no sorriso 2BNU!), e postar em seu perfil do Workplace. Os 200 primeiros colocados que acertarem as perguntas do quiz e fizerem a ativação de foto ganham um voucher MULTICASH no valor de R$ 100,00! Ao final da ação será produzido um vídeo que a equipe Winston receberá no Workplace e no grupo do WhatsApp.</p>
                    <p class="w-full">Sobre o MULTICASH:</p>
                    <p class="w-full">Cartão de benefícios do Grupo Pão de Açúcar, maior empresa varejista do país. Com o Cartão Multicash Virtual, os vencedores farão suas compras com toda comodidade através do e-commerce das lojas do Grupo Pão de Açúcar e lojas parceiras: www.clubeextra.com.br / www.paodeacucar.com.br / www.extra.com.br / www.pontofrio.com.br / www.casasbahia.com.br. O cartão é válido para utilização nas lojas físicas do Grupo Pão de Açúcar e no site ou lojas físicas do Assaí. Para utilizar basta inserir no campo da tela de pagamento, o código que estará no voucher recebido. Para efetuar o pagamento, será necessário utilizar a opção cartão de crédito. O saldo do Cartão Multicash deverá ser suficiente para pagamento de sua compra, pois o sistema não aceita a utilização de duas formas de pagamento na mesma transação. Limite de 1 (um) cartão por compra. Para consultar o saldo, o vencedor acessa o App ou site www.multibeneficiosgpa.com.br e clica em ACESSAR MINHA CONTA. Este saldo pode ser solicitado também na Central de Atendimento pelo telefone: (11) 3004 2022. O Cartão Multicash Virtual é ao portador e não é recarregável. Seu saldo não poderá ser cancelado, trocado, devolvido ou convertido em dinheiro. Não é possível a transferência de saldo para outro Cartão Presente. O Cartão Multicash Virtual será enviado ao e mail cadastrado em até 7 dias úteis após a confirmação do resgate e tem validade de 12 meses para uso. Na plataforma Winston 2BNU iremos divulgar os ganhadores e confirmação de veracidade da apuração.</p>
                    <p class="w-full">LET´S CELEBRATE! WINSTON 2BNU! E VAMOS RUMO AO NOSSO PRÓXIMO RECORDE!</p>

                </div>

            </div>

        </section>

    </ThemePage>

</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

import ThemePage from '@/Layouts/Web/ThemePage.vue'
import Image from '@/Components/Images/Index.vue'

export default {
    components: {
        Head,
        Link,
        ThemePage,
        Image,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>
