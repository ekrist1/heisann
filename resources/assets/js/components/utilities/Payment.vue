<template>
    <div class="w-full">
        <div v-if="statusMessage" class="flex items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-4" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ statusMessage }}</p>
        </div>
        <pulseloader :loading="loading"></pulseloader>
        <div class="w-full text-center">
            <form action="/subscriptions" method="POST">
                <input type="hidden" name="stripeToken" v-model="stripeToken">
                <input type="hidden" name="stripeEmail" v-model="stripeEmail">

                <button type="submit" class="bg-blue-darker hover:bg-blue-dark text-white py-2 px-4 inline-flex items-center h-16 w-48" @click.prevent="pay">
                        <svg fill="#fff" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                        <span class="ml-2">
                            <slot name="button_name"></slot>
                        </span>
                        <svg fill="#FFFFFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"/>
                            <path d="M0-.25h24v24H0z" fill="none"/>
                        </svg>
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import Pulseloader from './Pulseloader.vue';
    export default {
        props: ['stripekey', 'email', 'name', 'description', 'amount'],
        components: { Pulseloader },
        data() {
            return {
                stripeEmail: '',
                stripeToken: '',
                statusMessage: '',
                coupon: '',
                showCouponInput: false,
                loading: false,
            };
        },
        created() {
            this.stripe = StripeCheckout.configure({
                key: this.stripekey,
                image: "/images/stripe.png",
                locale: "no",
                billingAddress: true,
                currency: "NOK",
                panelLabel: "Betal for",
                email: this.email,
                token: (token) => {
                    this.stripeToken = token.id;
                    this.stripeEmail = token.email;
                    this.loading = true;
                    axios.post('/dashboard/checkout',
                        {
                        stripeToken: this.stripeToken,
                        stripeEmail: this.stripeEmail,
                        amount: (this.amount * 100) * 1.25
                        })
                        .then(response => {
                            this.loading = false;
                            this.statusMessage = response.data;
                            this.$parent.$emit('paid', [this.amount]);
                        })
                        .catch(error => {
                            this.loading = false;
                            this.statusMessage = error.response.data;
                        });
                }
            });
        },
        methods: {
            pay() {
                this.stripe.open({
                    name: this.name,
                    description: this.description,
                    zipCode: true,
                    amount: (this.amount * 100) * 1.25,
                });
            },
        }
    }

</script>