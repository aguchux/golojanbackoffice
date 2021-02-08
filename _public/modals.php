<?php if ($menukey == "dashboard") : ?>

    <!-- * Sell Item Action Sheet -->
    <div class="modal fade action-sheet" id="SellNewItem" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Submit New Product</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="category">Select Category</label>
                                    <select class="form-control custom-select form-control-lg" id="category">
                                        <?= $Core->LoadCategories() ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label" for="title">Product Title/Name (120 chars)</label>
                                <div class="input-group mb-2">
                                    <input class="form-control form-control-lg" type="text" name="title" id="title" placeholder="Product Title/Name">
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label" for="description">Product Description(160 chars)</label>
                                <div class="input-group mb-2">
                                    <textarea class="form-control form-control-lg" name="description" id="description" placeholder="Product Description"></textarea>
                                </div>
                            </div>

                            <div class="form-group basic">

                                <div class="row">
                                    <div class="col-12 col-md-6 col-sm-12 col-lg-6">
                                        <label class="label" for="bulkprice">Bulk Price</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="bulkpriceinput"><?= $LocationInfo->currency_code ?></span>
                                            </div>
                                            <input type="number" class="form-control form-control-lg" placeholder="Bulk">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-12 col-lg-6">
                                        <label class="label" for="retailprice">Retail Price</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="retailpriceinput"><?= $LocationInfo->currency_code ?></span>
                                            </div>
                                            <input type="number" class="form-control form-control-lg" placeholder="Retail">
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group basic">
                                <button type="button" class="btn btn-primary btn-block btn-lg" data-dismiss="modal">Deposit</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Sell Item Action Sheet -->


<?php endif; ?>