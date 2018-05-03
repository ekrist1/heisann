<template>

</template>
<script>

    import Form from 'form-backend-validation';
    import Multiselect from 'vue-multiselect'

    export default {
        components: { Multiselect },
        props: ['method', 'action', 'group', 'users'],

        data() {
            return {
                form: new Form({
                    name: '',
                    email: '',
                    description: '',
                    user_group: [],
                }),
                options: this.users,
                message: '',

            }
        },
        mounted() {
            if (!_.isEmpty(this.group)) {
                _.assign(this.form, this.group);
            }
        },
        methods: {
            submit() {
                this.form[this.method](this.action)
                    .then(response => {
                        window.location.href = response.redirect;
                    })
                    .catch(response => {
                        this.displayErrorMessage('Noe gikk galt :( prøv på nytt igjen');
                    });
                window.scrollTo(0, 0);
            },
            displayErrorMessage(message) {
                this.message = message;
                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.message = '';
                }, 4000);
            },

        }

    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>