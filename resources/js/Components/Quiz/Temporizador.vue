<template>
    <div class="w-full relative text-brand-base">
        <div class="z-0 absolute bg-brand-main"
        style="height:2px; bottom:0; left:0;"
        :style="{width: `${(this.aSeconds / totalSeconds) * 100}%`}"
        ></div>
        <span class="z-50" v-html="aCounter"></span>
    </div>
</template>

<script>
// Adiciona o zero quando necessário
var addZero = function(data) {
  return (data < 10) ? '0' + data : data;
};

export default {
    props: {
        hours: {type: Number, default: 0},
        minutes: {type: Number, default: 0},
        seconds: {type: Number, default: 0}
    },
    data() {
        return {
            mhour: 0,
            mminute: 0,
            msecond: 0,

            hour: 0,
            minute: 0,
            second: 0,
            milisecond: 0,

            started: false,
            interval: '',
            counter: '',
            vcode: 3,
            totalSeconds: 0
        }
    },

    mounted(){

        this.hour = this.$props.hours
        this.minute = this.aMinutes //this.$props.minutes
        this.second = this.aSeconds//this.$props.seconds

        this.mhour = this.$props.hours
        this.mminute = this.aMinutes// this.$props.minutes
        this.msecond = this.aSeconds// this.$props.seconds

        this.totalSeconds = (parseInt(this.minute) * 60) + parseInt(this.second)

        this.count()
    },
    computed: {

        aMinutes: function(){
            return this.minutes
        },
        aSeconds: function(){
            return this.seconds
        },

        aCounter: function() {
            var hour = addZero(this.hour);
            var minute = addZero(this.minute);
            var second = addZero(this.second);
            var milisecond = addZero(this.milisecond);

            return this.counter = minute + ':' + second;
        }
    },
    emits: ['finaly-timer'],
    methods: {

        count: function() {
            var self = this;
            self.started = true;

            if (this.mhour > 0 || this.mminute > 0 || this.msecond > 0) {
                self.stopCount();
                self.interval = setInterval(function() {
                    self.temporizer();
                }, 1000);
            } else {
                self.started = false;
                alert('Informe quanto tempo deseja temporizar!');
            }

            return self.counter;
        },
        stopCount: function() {
            if (this.interval !== '') {
                clearInterval(this.interval);
                this.interval = '';
            }
        },
        reset: function() {
            this.stopCount();
            this.mhour = 0;
            this.mminute = 0;
            this.msecond = 0;
            this.hour = 0;
            this.minute = 0;
            this.second = 0;
            this.milisecond = 0;
            this.started = false;
        },
        mark: function() {
            store.commit('mark', { m: this.minute, s: this.second, ms: this.milisecond });
        },
        temporizer: function() {
            if (this.hour > 0 || this.minute > 0 || this.second > 0) {
                if (this.second === 0 && this.minute === 0 && this.hour > 0) {
                    this.minute = 60;
                    this.hour -= 1;
                }
                if (this.second === 0 && this.minute > 0) {
                    this.second = 60;
                    this.minute -= 1;
                }
                this.second = (this.second === 0) ? 60 : this.second;
                this.second -= 1;

                localStorage.setItem('question_time', JSON.stringify({ m: this.minute, s: this.second, onde: 'temporizer'}));
            }

            if (this.hour === 0 && this.minute === 0 && this.second === 0){
                this.$emit('finaly-timer')
                this.reset();

                this.hour = this.$props.hours
                this.minute = this.$props.minutes
                this.second = this.$props.seconds

                this.mhour = this.$props.hours
                this.mminute = this.$props.minutes
                this.msecond = this.$props.seconds

                this.totalSeconds = (parseInt(this.minute) * 60) + parseInt(this.second)



                this.count()
            }
        }
  },
  watch: {
    tipo: function() {
      this.reset();
    },
    mhour: function(val) {
      this.hour = parseInt(val, 10);
    },
    mminute: function(val) {
      this.minute = parseInt(val, 10);
    },
    msecond: function(val) {
      this.second = parseInt(val, 10);
    },




  }
}
</script>

<style>

</style>
