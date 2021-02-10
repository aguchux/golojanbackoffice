<!-- Send Action Sheet -->
<div class="modal fade action-sheet inset" id="AddFund" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Add Fund</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="/payments/addfund" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <?= $Self->tokenize() ?>
                        <div class="form-group basic">
                            <label class="label" for="amount">Enter Amount</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="amount"><?= $LocationInfo->currency_code ?></span>
                                </div>
                                <input type="number" min="<?= min_funding_amount ?>" class="form-control form-control-lg" placeholder="0" name="amount" id="amount" autocomplete="off" required aria-required="true">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="method">Select Payment Method</label>
                                <select class="form-control custom-select" id="method" name="method">
                                    <option value="paystack">Online Payment (Instant)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                <ion-icon name="card-outline"></ion-icon> Add Fund
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Send Action Sheet -->

<!-- Withdraw Action Sheet -->
<div class="modal fade action-sheet inset" id="WithdrawFund" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Withdraw Money</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="/payments/withdrawfund" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <?= $Self->tokenize() ?>
                        <div class="form-group basic">
                            <label class="label" for="amount">Enter Amount</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="amount"><?= $LocationInfo->currency_code ?></span>
                                </div>
                                <input style="font-size:200%;" type="number" min="<?= min_withdrawal_amount ?>" max="<?= $Wallet->open ?>" class="form-control form-control-lg" placeholder="0" name="amount" id="amount" autocomplete="off" required aria-required="true">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="method">Destination Account</label>
                                <select required aria-required="true" class="form-control custom-select" id="account" name="account">
                                    <option value=""> - Select Account - </option>
                                    <?= $Core->LoadAccountsToSelect($UserInfo->accid) ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group basic">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Withdraw Money</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Withdraw Action Sheet -->


<!-- Exchange Action Sheet -->
<div class="modal fade action-sheet inset" id="TransferFund" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white">Transfer Fund</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="/payments/transfer" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <?= $Self->tokenize() ?>

                        <div class="form-group basic">
                            <label class="label" for="receipient_id">Receipient Account</label>
                            <input type="text" style="font-size:200%;" class="form-control form-control-lg" pattern="\d*" id="receipient_id" name="receipient" placeholder="Reciepient's ID">
                            <i class="clear-input">
                                <ion-icon name="person-outline"></ion-icon>
                            </i>

                            <div class="listview image-listview media inset mb-2 m-0 p-0 ">
                                <li id="ReceipientInfo" class="d-none"></li>
                            </div>

                        </div>
                        <div class="form-group basic">
                            <label class="label">Enter Amount</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="amount_on_transfer"><?= $LocationInfo->currency_code ?></span>
                                </div>
                                <input type="number" min="<?= min_transfer_amount ?>" max="<?= $Wallet->open ?>" style="font-size:200%;" class="form-control form-control-lg" name="amount" id="amount_on_transfer" placeholder="0" required aria-required="true">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <button type="submit" id="TransferBtn" class="btn btn-primary btn-block btn-lg" disabled>Transfer Fund</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Exchange Action Sheet -->

<!-- * Sell Item Action Sheet -->
<div class="modal fade action-sheet inset" id="SellNewItem" tabindex="-1" role="dialog">
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
                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="bulkprice">Bulk Price</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="bulkpriceinput"><?= $LocationInfo->currency_code ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" placeholder="Bulk">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
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

                            <div class="row">

                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3 mb-2">
                                    <div class="custom-file-upload" id="custom-file-upload-1">
                                        <input type="file" name="productphotos[]" id="productphotos1" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="1">
                                        <label for="productphotos1">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-1">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3 mb-2">
                                    <div class="custom-file-upload" id="custom-file-upload-2">
                                        <input type="file" name="productphotos[]" id="productphotos2" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="2">
                                        <label for="productphotos2">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-2">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                    <div class="custom-file-upload" id="custom-file-upload-3">
                                        <input type="file" name="productphotos[]" id="productphotos3" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="3">
                                        <label for="productphotos3">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-3">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                    <div class="custom-file-upload" id="custom-file-upload-4">
                                        <input type="file" name="productphotos[]" id="productphotos4" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="4">
                                        <label for="productphotos4">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-4">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="form-group basic mb-5">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Submit Product</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Sell Item Action Sheet -->



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