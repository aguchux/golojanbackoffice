        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Unclaimed Balance</span>
                        <h1 class="total"><?= $Core->ToMoney($Wallet->balance) ?></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button flashbutton_level_<?= $UserInfo->level ?>" data-toggle="modal" data-target="#depositActionSheet">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->


                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#SellNewItem">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="basket-outline"></ion-icon>
                            </div>
                            <strong>Pick Up</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="bicycle-outline"></ion-icon>
                            </div>
                            <strong>Deliver</strong>
                        </a>
                    </div>                    
                    <div class="item">
                        <a href="#">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Open Balance</div>
                        <div class="value text-success"><?= $Core->ToMoney($Wallet->open) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Closed Balance</div>
                        <div class="value text-danger"><?= $Core->ToMoney($Wallet->closed) ?></div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Store Capacity</div>
                        <div class="value"><?= $Core->ToMoney($StoreInfo->capacity) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Volume Stocked</div>
                        <div class="value"><?= $Core->ToMoney($Core->StockVolume($UserInfo->accid)) ?></div>
                    </div>
                </div>
            </div>



        </div>
        <!-- * Stats -->


