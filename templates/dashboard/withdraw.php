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