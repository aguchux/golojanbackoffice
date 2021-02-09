<div class="section p-2">

    <div class="listed-detail mt-3">
        <div class="icon-wrapper">
            <div class="iconbox">
                <ion-icon name="card-outline"></ion-icon>
            </div>
        </div>
        <h3 class="text-center mt-2">Funding Details</h3>
    </div>


</div>


<div class="section mb-5 p-2 row">
    <form action="/payments/<?= $FundingInfo->id ?>/paynow" method="POST" class="col-12 col-md-6 col-lg-6 col-sm-12 text-center" style="width: 100%; margin: 0 auto;">
        <?= $Self->tokenize() ?>

        <div class="card">
            <div class="card-body pb-1">

                <ul class="listview simple-listview no-space mt-3">
                    <li>
                        <span>Transaction</span>
                        <strong><?= $FundingInfo->transid ?></strong>
                    </li>
                    <li>
                        <span>Destination</span>
                        <strong><?= $Core->UserInfo($FundingInfo->to_accid,"fullname") ?>(<?= $FundingInfo->to_accid ?>)</strong>
                    </li>
                    <li>
                        <span>Amount</span>
                        <strong><?= $Core->ToMoney($FundingInfo->amount) ?></strong>
                    </li>
                </ul>
            </div>
        </div>


        <div class="mt-5 d-lg-none d-md-none">
            <img src="/_store/imgs/paybar-lg.png" class="imaged w-50">
        </div>

        <div class="mt-5 d-none d-lg-block d-xl-block d-md-block">
            <img src="/_store/imgs/paybar-lg.png" class="imaged w-25">
        </div>

        <div class="my-3">
            <button type="submit" name="paynow" class="btn btn-primary btn-block btn-lg" value="1">
                <ion-icon name="card-outline"></ion-icon> Continue Payment
            </button>
        </div>
        <div class="my-3">
            <button type="submit" name="cancelnow" class="btn btn-danger btn-block btn-lg" value="1">
            <ion-icon name="close-circle-outline"></ion-icon> Cancel Payment
            </button>
        </div>


    </form>



</div>