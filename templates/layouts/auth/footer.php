        <!-- app footer -->
        <div class="appFooter d-none">
            <div class="footer-title">
                Copyright © Golojan Technologies, 2020. All Rights Reserved.
            </div>
            Developed by <a href="#">Golojan</a>.
        </div>
        <!-- * app footer -->

        </div>
        <!-- * App Capsule -->

        <?php require_once DOT . "/_public/drawer.php"; ?>
        <?php require_once DOT . "/_public/modals.php"; ?>

        <!-- ///////////// Js Files ////////////////////  -->
        <!-- Jquery -->
        <script src="<?= $assets ?>js/lib/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap-->
        <script src="<?= $assets ?>js/lib/popper.min.js"></script>
        <script src="<?= $assets ?>js/lib/bootstrap.min.js"></script>
        <!-- Ionicons -->
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <!-- Owl Carousel -->
        <script src="<?= $assets ?>js/plugins/owl-carousel/owl.carousel.min.js"></script>
        <!-- Offline Js File -->
        <script src="<?= $assets ?>js/jquery.mask.js"></script>
        <script src="<?= $assets ?>js/lib/offline.min.js"></script>
        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous"></script>
        <!-- Base Js File -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
        <script src="<?= $assets ?>js/bootstrap-select.min.js"></script>
        <script src="<?= $assets ?>js/daterangepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js" integrity="sha512-OnkjbJ4TwPpgSmjXACCb5J4cJwi880VRe+vWpPDlr8M38/L3slN5uUAeOeWU2jN+4vN0gImCXFGdJmc0wO4Mig==" crossorigin="anonymous"></script>
        <script>
            var input = document.querySelector("#mobile");
            var iti = window.intlTelInput(input, {
                initialCountry: "ng",
                separateDialCode: true,
                onlyCountries: ["ng"],
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js",
            });
            // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
            window.iti = iti;
        </script>
        <script src="<?= $assets ?>js/base.js?var=<?= time() ?>"></script>

        </body>

        </html>