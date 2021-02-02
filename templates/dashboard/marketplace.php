<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Available Store Capacity</span>
                <h1 class="total"><?= $Core->Naira($Wallet->balance) ?></h1>
            </div>
            <div class="right">
                <a href="#" class="button">
                    0
                </a>
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

    <div class="col-12 col-sm-12 col-md-6 col-lg-4 my-2">
        <ul class="listview image-listview text inset">

            <li>
                <a href="#" class="item">
                    <div class="media left mr-2">
                        <img style="width:100px" src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/J/U/115097_1582214778.jpg">
                    </div>
                    <div class="in right">
                        <div>Smart Intelligent Kids 10 inches Tablet</div>
                    </div>
                </a>
            </li>
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            <strong><?= $Core->Naira(50000) ?></strong>
                            <div class="text-muted">
                                Baby, Kids & Toys
                            </div>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="sms_notix" class="custom-control-input xNotix" value="1" id="sms_notix" <?= $UserInfo->sms_notix ? 'checked' : '' ?> />
                            <label class="custom-control-label" for="sms_notix"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-4 my-2">
        <ul class="listview image-listview text inset">

            <li>
                <a href="#" class="item">
                    <div class="media left mr-2">
                        <img style="width:100px" src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/H/W/168784_1596463472.jpg">
                    </div>
                    <div class="in right">
                        <div>Electric Motor Bike Glossy Ride-on</div>
                    </div>
                </a>
            </li>
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            <strong><?= $Core->Naira(50000) ?></strong>
                            <div class="text-muted">
                                Baby, Kids & Toys
                            </div>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="product[]" class="custom-control-input xNotix" value="1" id="sms_notix" <?= $UserInfo->sms_notix ? 'checked' : '' ?> />
                            <label class="custom-control-label" for="sms_notix"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>