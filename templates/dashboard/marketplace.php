<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Available Store Capacity</span>
                <h1 class="total"  id="xStoreTotal"><?= $Core->Naira( (float) ($StoreInfo->capacity - $StoreInfo->store_total) ) ?></h1>
            </div>
            <div class="right">
                <a href="#" class="button" id="xStoreCount"><?= $StoreInfo->store_count ?></a>
            </div>
        </div>
        <!-- * Balance -->
        <!-- Wallet Footer -->
        <div class="wallet-footer row">
            <div class="form-group col-12">
                <h3 class="title col-12">Select Category</h3>
                <select class="form-control" style="width: 100%; font-size:20px" id="LoadCategories">
                    <?= $Core->LoadCategories($category) ?>
                </select>
            </div>
        </div>
        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Wallet Card -->


<div class="row mt-4">

    <?php while ($product = mysqli_fetch_object($Products)):
        $Category = $Core->CategoryInfo($product->category); 
        $StoreInfoProductArray = json_decode($StoreInfo->products);
        ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 my-2">
            <ul class="listview image-listview text inset">

                <li>
                    <a href="#" class="item">
                        <div class="media left mr-2">
                            <img style="width:100px" src="<?= $product->photo ?>">
                        </div>
                        <div class="in right">
                            <div><?= $product->name ?></div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="item">
                        <div class="in">
                            <div>
                                <strong><?= $Core->Naira($product->selling) ?></strong>
                                <div class="text-muted">
                                   <?= $Category->category ?>
                                </div>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="<?= $product->id ?>" class="custom-control-input AddToWarehouseBtn" value="<?= $product->id ?>" id="<?= $product->id ?>" <?= $Core->RunSwitch($product->id,$StoreInfoProductArray);  ?> />
                                <label class="custom-control-label" for="<?= $product->id ?>"></label>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    <?php endwhile; ?>


</div>