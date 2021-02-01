        <!-- app footer -->
        <div class="appFooter d-none">
            <div class="footer-title">
                Copyright © Ebonyi State Government, 2020. All Rights Reserved.
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

        <?php if (isset($BankerInfo->id)) : ?>
            <script>
                $(document).ready(function() {

                    $('#DateRanger').daterangepicker({
                        minDate: moment().subtract(4, 'years'),
                        maxDate: moment().add(4, 'years'),
                        timePicker: true,
                        startDate: moment().startOf('month'),
                        endDate: moment().endOf('month'),
                        locale: {
                            format: 'MM/DD/YYYY hh:mm A'
                        },
                        timeZone: 'Africa/Lagos',
                        firstDayOfWeek: 1,
                        autoApply: true,
                        separator: " To ",
                        "applyLabel": "Search Transactions",
                        "cancelLabel": "Cancel Search",
                        "fromLabel": "From",
                        "toLabel": "To",
                        ranges: {
                            'Last 2 days': [moment().subtract(1, 'days'), moment()],
                            'Last 7 days': [moment().subtract(6, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                    }, function(startDate, endDate, period) {
                        $.ajax('/ajax/<?= $BankerInfo->id ?>/<?= $BankerInfo->accountnumber ?>/' + startDate.toISOString() + '/' + endDate.toISOString() + '/transactions', {
                            type: 'GET',
                            processData: true,
                            async: true,
                            success: function(data, status, xhr) {
                                $("#transactions").html(data);
                                //var jData = JSON.parse(data);
                                //alert(data);
                            },
                            error: function(jqXhr, textStatus, errorMessage) {
                                //alert(jqXhr);
                            }
                        });


                    });

                });
            </script>

        <?php endif; ?>


        <script src="<?= $assets ?>js/base.js"></script>

        </body>

        </html>