<template>

        <button @click="createPDF" class="text-grey-darkest font-bold inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
            <span>Lagre som PDF</span>
        </button>

</template>

<script>
    export default {
        props: ['message'],
        data () {
            return {
                toPdf: this.message,
            }
        },
        methods: {
            createPDF () {
                let pdfName = 'beskjed';
                let doc = new jsPDF();

                doc.setTextColor(100);
                doc.setFontSize(16);
                doc.text(10, 10, 'Til');
                doc.setFontSize(22);
                doc.setTextColor(0);
                doc.text(10, 20, this.toPdf.to);

                doc.setFontSize(16);
                doc.setTextColor(100);
                doc.text(10, 30, 'Fra');
                doc.setTextColor(0);
                doc.setFontSize(22);
                doc.text(10, 40, this.toPdf.from);

                doc.setFontSize(16);
                doc.setTextColor(100);
                doc.text(10, 50, 'Melding');
                doc.setFontSize(22);
                doc.setTextColor(0);

                let splitTitle = doc.splitTextToSize(this.toPdf.body, 180);
                doc.text(10, 60, splitTitle);

                doc.save(pdfName + '.pdf');
            }
        }
    }
</script>