<?php if ($WithdrawalInfo->status == "completed") : ?>
    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-success">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-success">Withdrawal Completed</h3>
        </div>
    </div>
<?php elseif ($WithdrawalInfo->status == "success") : ?>
    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-success">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-success">Withdrawal Completed</h3>
        </div>
    </div>
<?php elseif ($WithdrawalInfo->status == "failed") : ?>

    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-danger">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-danger">Withdrawal Failed</h3>
        </div>
    </div>
<?php elseif ($WithdrawalInfo->status == "cancelled") : ?>
    <div class="section p-2">
        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox bg-danger">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2 text-danger">Withdrawal Cancelled</h3>
        </div>
    </div>
<?php endif; ?>



<div class="section mb-5 p-2 row">

    <div class="col-12 col-md-6 col-lg-6 col-sm-12 text-center" style="width: 100%; margin: 0 auto;">
        <?php if ($WithdrawalInfo->status == "completed") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction</span>
                            <strong><?= $WithdrawalInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Account Debited</span>
                            <strong><?= $Core->UserInfo($WithdrawalInfo->accid, "fullname") ?>(<?= $WithdrawalInfo->accid ?>)</strong>
                        </li>
                        <li>
                            <span>Amount Withdrawn</span>
                            <strong><?= $Core->ToMoney($WithdrawalInfo->amount) ?></strong>
                        </li>
                        <li>
                            <span>Sent to</span>
                            <strong><?= $BankInfo->bank_name ?> (<?= $BankInfo->account_number ?>)</strong>
                        </li>
                        <li>
                            <span>Balance</span>
                            <strong><?= $Core->ToMoney($Wallet->open) ?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        <?php elseif ($WithdrawalInfo->status == "success") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction</span>
                            <strong><?= $WithdrawalInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Account Debited</span>
                            <strong><?= $Core->UserInfo($WithdrawalInfo->accid, "fullname") ?>(<?= $WithdrawalInfo->accid ?>)</strong>
                        </li>
                        <li>
                            <span>Amount Withdrawn</span>
                            <strong><?= $Core->ToMoney($WithdrawalInfo->amount) ?></strong>
                        </li>
                        <li>
                            <span>Sent to</span>
                            <strong><?= $BankInfo->bank_name ?> (<?= $BankInfo->account_number ?>)</strong>
                        </li>
                        <li>
                            <span>Balance</span>
                            <strong><?= $Core->ToMoney($Wallet->open) ?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        <?php elseif ($WithdrawalInfo->status == "failed") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction </span>
                            <strong><?= $WithdrawalInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Amount Withdrawn</span>
                            <strong><?= $Core->ToMoney($WithdrawalInfo->amount) ?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        <?php elseif ($WithdrawalInfo->status == "cancelled") : ?>
            <div class="card">
                <div class="card-body pb-1">
                    <ul class="listview simple-listview no-space mt-3">
                        <li>
                            <span>Transaction</span>
                            <strong><?= $WithdrawalInfo->transid ?></strong>
                        </li>
                        <li>
                            <span>Amount Withdrawn</span>
                            <strong><?= $Core->ToMoney($WithdrawalInfo->amount) ?></strong>
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