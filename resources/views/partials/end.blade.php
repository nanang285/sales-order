<script>
    AOS.init();
</script>


<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#error-alert').fadeOut();
        }, 5000);
    });

    if ($('#error-validation').length) {
        setTimeout(function() {
            $('#error-validation').fadeOut();
        }, 5000);
    }
    
</script>

<script src="//cdn.ckeditor.com/4.25.0-lts/full/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        
</script>


</body>

</html>
