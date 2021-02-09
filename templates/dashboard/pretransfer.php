<div class="section p-2">
    <div class="listed-detail mt-3">
        <div class="icon-wrapper">
            <div class="iconbox bg-secondary">
                <ion-icon name="send-outline"></ion-icon>
            </div>
        </div>
        <h3 class="text-center mt-2">Confirm Transfer</h3>
    </div>
</div>

<div class="section">
    <form action="/payments/<?= $TransferInfo->id ?>/transfernow" method="POST" class="col-12 col-md-6 col-lg-6 col-sm-12 text-center" style="width: 100%; margin: 0 auto;">
        <?= $Self->tokenize() ?>

        <div class="splash-page mt-5 mb-5">

            <div class="transfer-verification">
                <div class="transfer-amount">
                    <span class="caption">Amount</span>
                    <h2><?= $Core->ToMoney($TransferInfo->amount) ?></h2>
                </div>
                <div class="from-to-block mb-5">
                    <div class="item text-left">
                        <img src="<?= $Core->UserInfo($TransferInfo->accid_from, "avatar") ?>" class="imaged w48">
                        <strong><?= $Core->UserInfo($TransferInfo->accid_from, "fullname") ?></strong>
                    </div>
                    <div class="item text-right">
                        <img src="<?= $Core->UserInfo($TransferInfo->accid_to, "avatar") ?>" class="imaged w48">
                        <strong><?= $Core->UserInfo($TransferInfo->accid_to, "fullname") ?></strong>
                    </div>
                    <div class="arrow"></div>
                </div>
            </div>
            <h2 class="mb-2 mt-2">Verify this Transaction</h2>
            <p>
                You are sending <strong class="text-primary"><?= $Core->ToMoney($TransferInfo->amount) ?></strong> to <?= $Core->UserInfo($TransferInfo->accid_to, "fullname") ?>. <br>Are you sure?
            </p>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <button type="submit" name="cancel" value="cancel" class="btn btn-lg btn-outline-secondary btn-block">Cancel</button>
            </div>
            <div class="col-6">
                <button type="submit" name="confirm" value="confirm" class="btn btn-lg btn-primary btn-block">Confirm</button>
            </div>
        </div>
    </form>
</div>