
<div class="section mb-1 p-2">

    <form action="/payments/withdrawal/<?= $WithdrawalInfo->id ?>/finalize" method="POST" autocomplete="off">
        <?= $Self->tokenize() ?>

        <div class="splash-page p-2 mt-5 mb-0">

            <div class="transfer-verification">
                <div class="transfer-amount">
                    <span class="caption">Amount</span>
                    <h2><?= $Core->ToMoney($WithdrawalInfo->amount) ?></h2>
                </div>
                <div class="from-to-block mb-5">
                    <div class="item text-left">
                        <img src="<?= $Core->UserInfo($WithdrawalInfo->accid, "avatar") ?>" class="imaged w48">
                        <strong><?= $Core->UserInfo($WithdrawalInfo->accid, "fullname") ?> (<?= $WithdrawalInfo->accid ?>)</strong>
                    </div>
                    <div class="item text-right">
                        <img src="./_store/imgs/bank.png" class="imaged w48">
                        <strong><?= $BankInfo->bank_name ?> (<?= $BankInfo->account_number ?>)</strong>
                    </div>
                    <div class="arrow"></div>
                </div>
            </div>
            <h2 class="mb-2 mt-2">Verify this Withdrawal</h2>
            <p>
                We sent OTP to your Mobile to confirm you are the one withdrawing <strong class="text-primary"><?= $Core->ToMoney($WithdrawalInfo->amount) ?></strong> to your bank account.
            </p>
        </div>


        <div class="card bg-transparent">
            <div class="card-body pb-1 text-center">
                <div class="form-group basic">
                    <input type="number" required aria-required="true" class="form-control verification-input" id="otp" name="otp" placeholder="••••••"  maxlength="<?= withdrawal_otp_code_digits ?>" autocomplete="off">
                </div>
                <a href="javascript:;" class="btn-link text-muted" id="xResendWithDrawalOTP" data-withid="<?= $WithdrawalInfo->id ?>">Click to Resend OTP</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg my-5">Confirm OTP & Continue</button>

    </form>
</div>