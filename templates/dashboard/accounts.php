<div class="section mt-3 p-2">
    <div class="listed-detail mt-3">
        <div class="icon-wrapper">
            <div class="iconbox">
                <ion-icon name="wallet-outline"></ion-icon>
            </div>
        </div>
        <h3 class="text-center mt-2">Bank Accounts<br /><small class="text-muted">Manage Accounts</small> </h3>
    </div>
</div>



<?php while ($banker = mysqli_fetch_object($Bankers)) : ?>
    <ul class="listview image-listview text inset my-3" id="BankerBox_<?= $banker->id ?>">
        <li>
            <div class="item">
                <div class="in">
                    <div class="left">
                        <?= $banker->bank_name ?>
                        <div class="text-muted">
                    <img class="imaged w48 left ml-0 mr-0" src="./_store/banks/<?= $Core->BankerInfo($banker->bank_code, "slug") ?>.png" alt=".">
                            <?= $banker->account_number ?>
                        </div>
                    </div>
                    <div class="custom-control custom-switch disabled" id="xCustomCheckBox_<?= $banker->id ?>">
                        <input type="checkbox" disabled='true' name="banker" value="<?= $banker->id ?>" class="custom-control-input DefultBankers disabled" id="banker_<?= $banker->id ?>" />
                        <label class="custom-control-label" for="banker_<?= $banker->id ?>"></label>
                    </div>
                    <div class="custom-control custom-switch d-none" id="xCustomCheckLoader_<?= $banker->id ?>">
                        <div class="spinner-border text-danger" role="status"></div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div><?= $banker->account_name ?></div>
                    <span class="text-danger DeleteBanker" id="<?= $banker->id ?>">Delete</span>
                </div>
            </a>
        </li>
    </ul>
<?php endwhile; ?>



<div class="section mt-3 mb-5 p-2">
    <div class="card">
        <div class="card-body pb-1">
            <form action="/payments/addaccount" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="saved_account_number" id="saved_account_number" required aria-required="true">
                <?= $Self->tokenize() ?>

                <div class="form-group basic">
                    <label class="label" for="accountnumber">Account Number</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <ion-icon name="keypad-outline"></ion-icon>
                            </span>
                        </div>
                        <input style="font-size:200%;" type="text" class="form-control form-control-lg" name="accountnumber" maxlength="10" placeholder="1234567890" id="accountnumber" autocomplete="off" required aria-required="true">
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="spinner-border text-primary float-right right d-none" id="xLoadingInAccount" role="status"></div>
                    <label class="label" for="xLoadAccountName">Select Banker</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                        </div>
                        <select class="form-control custom-select" id="xLoadAccountName" name="banker" required aria-required="true">
                            <option value=""> - Select Banker - </option>
                            <?php foreach ($ListBankers as $banker) : ?>
                                <option value="<?= $banker->code ?>"><?= $banker->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group basic d-none" id="xAccountNameDiv">
                    <label class="label" for="banker">Account Name</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </span>
                        </div>
                        <input style="font-size:200%;" readonly type="text" class="form-control form-control-lg" name="account_name" placeholder="" id="xAccountName" autocomplete="off" required aria-required="true" value="">
                    </div>
                </div>



                <div class="form-group basic">
                    <button type="submit" class="btn btn-primary btn-block disabled" id="xAccountAddButton" disabled='true'>
                        <ion-icon name="card-outline"></ion-icon> Add Bank Account
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>