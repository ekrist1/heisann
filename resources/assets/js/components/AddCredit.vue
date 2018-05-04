<template>
    <div>
        <h3 class="w-full text-center mb-6">Saldo på konto: {{ credit }}</h3>

        <h4 class="w-full text-center">Velg beløp du ønsker å fylle opp kontoen med</h4>
        <p class="text-xs text-center w-full mb-6">(alle beløp eksklusive transaksjonsgebyr - 25%)</p>

        <div class="mb-4">
            <input type="radio" id="one" :value=100 v-model="amount">
            <label for="one">100 kr</label>

            <input type="radio" id="two" :value=200 v-model="amount">
            <label for="one">200 kr</label>

            <input type="radio" id="three" :value=300 v-model="amount">
            <label for="one">300 kr</label>

            <input type="radio" id="four" :value=400 v-model="amount">
            <label for="one">400 kr</label>

            <input type="radio" id="five" :value=500 v-model="amount">
            <label for="one">500 kr</label>

            <input type="radio" id="thousand" :value=1000 v-model="amount">
            <label for="one">1000 kr</label>
        </div>

        <div>
            <payment :name="name" :description="description" :stripekey="stripekey" :email="email" :amount="amount">
                <p slot="button_name">Betal</p>
            </payment>
        </div>
    </div>

</template>

<script>
    import Form from 'form-backend-validation';
    import Payment from './utilities/Payment';
    import moment from 'moment';
    export default {
        components: { Payment },
        props: ['initialcredit','stripekey', 'email', 'name', 'description'],

        data () {
                return {
                    amount: 100,
                    credit: this.initialcredit
                }
            },
        created() {
            this.$on('paid', function (amount) {
                this.credit = parseInt(amount) + parseInt(this.credit);
            })

    }

    }
</script>
