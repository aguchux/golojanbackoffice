<?php if ($TransferInfo->status == "completed") : ?>
    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-success">
                    <ion-icon name="send-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-success">Transfer Completed</h3>
        </div>
    </div>
<?php elseif ($TransferInfo->status == "failed") : ?>

    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-danger">
                    <ion-icon name="send-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-danger">Transfer Failed</h3>
        </div>
    </div>
<?php elseif ($TransferInfo->status == "cancelled") : ?>
    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-danger">
                    <ion-icon name="send-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-danger">Transfer Cancelled</h3>
        </div>
    </div>
<?php endif; ?>



<div class="section mb-5 p-2 row">

    <div class="col-12 col-md-6 col-lg-6 col-sm-12 text-center" style="width: 100%; margin: 0 auto;">
        <?php if ($TransferInfo->status == "completed") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction</span>
                            <strong><?= $TransferInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Account Debited</span>
                            <strong><?= $Core->UserInfo($TransferInfo->accid_from, "fullname") ?>(<?= $TransferInfo->accid_from ?>)</strong>
                        </li>                        <li>
                            <span>Account Funded</span>
                            <strong><?= $Core->UserInfo($TransferInfo->accid_to, "fullname") ?>(<?= $TransferInfo->accid_to ?>)</strong>
                        </li>
                        <li>
                            <span>Amount Sent</span>
                            <strong><?= $Core->ToMoney($TransferInfo->amount) ?></strong>
                        </li>
                        <li>
                            <span>Balance</span>
                            <strong><?= $Core->ToMoney($Wallet->open) ?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        <?php elseif ($TransferInfo->status == "failed") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction </span>
                            <strong><?= $TransferInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Amount</span>
                            <strong><?= $Core->ToMoney($TransferInfo->amount) ?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        <?php elseif ($TransferInfo->status == "cancelled") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction</span>
                            <strong><?= $TransferInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Amount</span>
                            <strong><?= $Core->ToMoney($TransferInfo->amount) ?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="my-3">
            <a href="/dashboard" class="btn btn-primary btn-block btn-lg" value="1">
                <ion-icon name="chevron-back-outline"></ion-icon> Return to Dashboard
            </a>
        </div>
    </div>



</div>