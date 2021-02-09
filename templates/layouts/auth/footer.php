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

        <!-- DialogIconedSuccess -->
        <div class="modal fade dialogbox" id="ModalSuccessDialog" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-success">
                        <ion-icon name="checkmark-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Success</h5>
                    </div>
                    <div class="modal-body" id="DialogSuccessMessage">Your payment has been sent.</div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade dialogbox" id="ModalFailedDialog" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                    </div>
                    <div class="modal-body" id="DialogFailedMessage">There is something wrong.</div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedSuccess -->


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
        <script src="<?= $assets ?>js/base.js?var=<?= time() ?>"></script>

        <?php if (isset($Self->data['toast'])) : 
            $Toast = $Self->getToast();
            ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    let status = "<?= $Toast->error ?>";
                    if (status == 'success') {
                        $('#DialogSuccessMessage').html("<?= $Toast->toast ?>");
                        $('#ModalSuccessDialog').modal('show');
                    } else if (status == 'danger') {
                        $('#DialogFailedMessage').html("<?= $Toast->toast ?>");
                        $('#ModalFailedDialog').modal('show');
                    }
                });
            </script>
        <?php
            $Self->removedata("toast");
        endif; ?>
        </body>

        </html>