<template>
    <div class="text-center">
        <pulseloader :loading="loading"></pulseloader>
        <p class="text-xs mt-2" v-if="!showButton">{{ message }}. Ikke mottatt? <span><a class="text-blue font-bold" @click="generateToken">send på nytt</a></span></p>
        <button v-if="showButton" @click="generateToken" class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 mt-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/>
            </svg>
            <span>Send meg engangskode</span>
        </button>
    </div>
</template>

<script>
    import Pulseloader from './utilities/Pulseloader.vue'

    export default {
        components: { Pulseloader },
        data() {
            return {
                showButton: true,
                loading: false,
                message: '',
            }
        },
        methods: {
            generateToken() {
                this.loading = true;
                axios.get('/dashboard/sendtoken')
                    .then(response => {
                        this.displaySuccessMessage(response.data);
                        this.showButton = false;
                        this.loading = false
                    })
                    .catch(error => {
                        this.loading = false
                    });
            },
            displaySuccessMessage(message){
                this.message = message;
            }

        }
    }
</script>