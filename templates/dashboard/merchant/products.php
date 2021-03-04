<!-- Wallet Card -->
<div class="section  mt-4">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Total Added Products</span>
                <h1 class="total" id="xStoreTotal"><?= $Core->ToMoney($Core->AvailableStock($UserInfo->accid)) ?></h1>
            </div>
            <div class="right">
                <a href="#" data-toggle="modal" data-target="#SellNewItem" class="button">
                    <ion-icon name="add-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * Balance -->
    </div>
</div>
<!-- Wallet Card -->

<div class="section mt-2 mb-2">

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">STOCK LIST</th>
                    <th scope="col">-</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_object($MyProducts)) :
                    $Category = $Core->CategoryInfo($product->subcategory);
                ?>
                    <tr>
                        <th scope="row">
                            <div class="media left mr-2">
                                <img style="width:200px; margin:0 auto;" src="<?= $product->photo ?>">
                            </div>
                        </th>
                        <th scope="row">
                            <div class="card">
                                <div class="card-header">
                                    <span class="mr-5"><?= $product->name ?></span>
                                </div>
                                <div class="card-body">
                                    <div class="in">
                                        <h2 class="card-title"><?= $Core->ToMoney($product->bulkprice) ?> <strong class="text-primary">>></strong> <?= $Core->ToMoney($product->retailprice) ?> <strong class="text-primary">>></strong> <?= $Core->ToMoney($product->selling) ?> </h2>
                                        <p class="card-text"><?= $Category->category ?></p>
                                    </div>
                                </div>
                                <div class="card-footer">

                                    <div class="custom-control custom-switch text-left">
                                        <?php if ($Core->Submitted($product->id)) : $Submission = $Core->Submission($product->id); ?>
                                            <button class="btn btn-primary btn-sm xSubmitProduct" disabled>
                                                Submission: <?= $Submission->status ?>
                                            </button>
                                        <?php else : ?>
                                            <a href="/dashboard/merchant/products/<?= $product->id ?>/submit" class="btn btn-primary btn-sm xSubmitProduct" data-productid="<?= $product->id ?>">
                                                Submit Product
                                            </a>
                                        <?php endif; ?>
                                        <input type="checkbox" name="<?= $product->id ?>" class="custom-control-input AddToWarehouseBtn" <?= $product->approved ? "" : "disabled" ?> value="<?= $product->id ?>" id="<?= $product->id ?>" <?= $Core->RunSwitch($product->id, $UserInfo->accid);  ?> />
                                        <label class="custom-control-label" for="<?= $product->id ?>"></label>
                                    </div>
                                </div>
                            </div>


                        </th>
                        <th scope="row">
                            <a href="/dashboard/merchant/products/<?= $product->id ?>/delete" type="button" class="close text-danger xDeleteFeature text-dark">
                                <ion-icon name="close-outline"></ion-icon>
                            </a>
                            <a href="/dashboard/merchant/products/<?= $product->id ?>/edit" type="button" class="text-success close xDeleteFeature text-dark">
                                <ion-icon name="create"></ion-icon>
                            </a>
                        </th>
                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>

</div>