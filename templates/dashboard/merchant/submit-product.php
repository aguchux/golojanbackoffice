<div class="section mt-2 mb-2">
    <form action="/merchants/<?= $ProductInfo->id ?>/submitproduct" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?= $Self->tokenize() ?>

        <div class="wallet-card">

            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox bg-primary">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Submit Product</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Product Number</strong>
                    <span><?= $ProductInfo->id ?></span>
                </li>
                <li>
                    <?= $ProductInfo->name ?>
                </li>
                <li>
                    <strong>Bulk Price<br /><small class="text-danger">Proposed to us (B2B)</small></strong>
                    <h3 class="m-0"><?= $Core->ToMoney($ProductInfo->bulkprice) ?></h3>
                </li>
                <li>
                    <strong>Retail Price<br /><small class="text-danger">Proposed to buyers (B2C)</small></strong>
                    <h3 class="m-0"><?= $Core->ToMoney($ProductInfo->retailprice) ?></h3>
                </li>
                <li>
                    <strong>Selling Price<br /><small class="text-danger">Final selling price</small></strong>
                    <h3 class="m-0"><?= $Core->ToMoney($ProductInfo->selling) ?></h3>
                </li>
            </ul>

        </div>
        <?php if ($Core->Submitted($ProductInfo->id)) : $Submission = $Core->Submission($ProductInfo->id); ?>
            <div class="form-group basic mb-5">
                <button class="btn btn-primary btn-block btn-lg xSubmitProduct" disabled>
                    Submission Status: <?= $Submission->status ?>
                </button>
            </div>
        <?php else : ?>
            <div class="form-group basic mb-5">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Request Approval</button>
            </div>
        <?php endif; ?>

    </form>
</div>