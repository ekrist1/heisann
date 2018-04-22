<script>
    import Form from 'form-backend-validation';
    import Pulseloader from './utilities/Pulseloader.vue';
    import Tabs from './utilities/Tabs.vue';

    export default {
        components: { Pulseloader, Tabs },
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
                tabnames: [
                    {id: 0, name: 'Ny melding',},
                    {id: 1, name: 'Sikkerhet'},
                ],
                selectedContentTab: 'Ny melding'

            }
        },
        created() {
         this.refresh();
        },
        mounted() {
            this.$eventHub.$on('showTabContentIndex', this.showTabContentIndex)
        },
        methods: {
            showTabContentIndex (tab) {
                this.selectedContentTab = tab.name
            },
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
                    .catch(error => {
                        this.loading = false;
                        if (error.response.status === 419) {
                            alert('Du har vært for lenge inaktiv. Du må sende skjemaet på nytt');
                            window.location.reload(true);
                        }
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
                }, 3600000);
            }
        }
    }
</script>
