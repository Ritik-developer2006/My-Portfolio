<!-- jQuery first -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap & other plugins -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/animatedModal.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/lity.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/jquery.mb.YTPlayer.min.js"></script>

<!-- Your main JS -->
<script src="js/main.js"></script>

<!-- Customizer (optional) -->
<script src="customizer/main.js"></script>

<!-- Your custom JS -->
<script src="js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.ripples@0.6.3/dist/jquery.ripples.min.js"></script>
<script>
    $(function() {

        if (typeof $.fn.ripples !== 'function') {
            console.error('Ripples plugin still not available');
            return;
        }

        const $body = $('body');

        $body.ripples({
            resolution: 600,
            dropRadius: 25,
            perturbance: 0.04
        });

        // Auto waves
        // setInterval(() => {
        //   $body.ripples(
        //     'drop',
        //     Math.random() * window.innerWidth,
        //     Math.random() * window.innerHeight,
        //     30,
        //     0.03
        //   );
        // }, 2500);

        // Click waves
        $body.on('click', e => {
            $body.ripples('drop', e.pageX, e.pageY, 40, 0.04);
        });

    });
</script>
</body>

</html>