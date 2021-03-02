<div class="section mt-2 mb-2">
    <form action="/merchants/<?= $ProductInfo->id ?>/deleteitem" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?= $Self->tokenize() ?>

        <div class="wallet-card">

            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox bg-danger">
                        <ion-icon name="trash-outline"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Delete Product</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Product Number</strong>
                    <span><?= $ProductInfo->id ?></span>
                </li>
                <li>
                    <strong>Product Name</strong>
                    <span><?= $ProductInfo->name ?></span>
                </li>
                <li>
                    <strong>Selling Amount</strong>
                    <h3 class="m-0"><?= $Core->ToMoney($ProductInfo->selling) ?></h3>
                </li>
            </ul>


        </div>

        <div class="form-group basic mb-5">
            <button type="submit" class="btn btn-danger btn-block btn-lg">Delete Product</button>
        </div>
    </form>
</div>