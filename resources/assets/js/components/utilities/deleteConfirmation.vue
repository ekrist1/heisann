<template>
    <div>
        <p>
            <button class="font-bold text-grey-dark" @click.prevent="isActive = true">Slett</button>
        </p>

        <div class="fixed pin flex items-center" v-if="isActive">
            <div class="fixed pin bg-black opacity-75 z-10"></div>

            <div class="relative mx-6 md:mx-auto w-full md:w-1/2 lg:w-1/3 z-20 m-8">
                <div class="shadow-lg bg-white rounded-lg p-8">

                    <h1 class="text-center text-2xl text-green-dark">Vil du slette?</h1>

                    <div class="pt-6 pb-2 my-2">
                        <div class="mb-4">
                            <p>Denne oprasjonen kan ikke angres! Vennligst bekreft at du vil slette</p>
                        </div>

                        <div class="block md:flex items-center justify-between">
                            <div>
                                <button @click="performaction" class="bg-indigo-dark hover:bg-indigo text-white font-bold py-2 px-4" type="button">
                                    Slett
                                </button>
                            </div>

                            <div class="mt-4 md:mt-0">
                                <a @click="isActive = false" class="text-grey-dark font-bold cursor-pointer no-underline">Avbryt</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        props: ['deleteurl'],
        data() {
            return {
                url: this.deleteurl,
                isActive: false
            }
        },
        methods: {
            performaction: function () {
                axios.delete(this.url)
                .then(function (response) {
                    window.location.href = response.data.redirect;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },

    }
</script>