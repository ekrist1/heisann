<script>
    import Form from 'form-backend-validation';
    import Pulseloader from './utilities/Pulseloader.vue';

    export default {
        components: { Pulseloader },
        props: ['action', 'method', 'company_id'],
        data() {
            return {
                message: '',
                messageClass: '',
                fileNames: [],
                loading: false,
                form: new Form ({
                    emailto: '',
                    emailfrom: '',
                    mobile:'',
                    group: '',
                    country: 'NO',
                    from: '',
                    humantest: '',
                    message: '',
                    uuid: this.company_id,
                    attachments: [],
                }),

            }
        },
        created() {
         this.refresh();
        },
        methods: {
            attachDocuments: function(e) {
                this.fileNames = [];
                this.form.attachments =  e.target.files || e.dataTransfer.files;

                _.forEach(this.form.attachments, (file) => {
                    this.fileNames.push(file.name);
                    if(file.size > 104857600){
                        alert("Filen er for stor. Maks størrelse er 100MB!");
                        this.form.attachments = [];
                        this.fileNames = [];
                    }
                });

            },
            submitForm () {
                this.loading = true;
                this.form.submit('post', this.action)
                    .then(response => {
                        this.loading = false;
                        location.reload();
                        //window.location.href = response.redirect;
                    })
                    .catch(response => {
                        this.loading = false;
                        this.displayErrorMessage('Noe gikk galt :( prøv på nytt igjen');
                    });
                window.scrollTo(0, 0);
            },
            displayErrorMessage(message) {
                this.messageClass = 'notification is-warning';
                this.message = message;
                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.message = '';
                    this.messageClass = '';
                    this.displayZipError = '';
                }, 4000);
            },
            refresh() {
                setTimeout(() => {
                    window.location.reload(true);
                }, 60*60000);
            }
        }
    }
</script>
