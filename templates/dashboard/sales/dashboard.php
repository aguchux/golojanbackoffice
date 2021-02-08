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
                        <a href="#" data-toggle="modal" data-target="#AddFund">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            <strong>Add Fund</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#WithdrawFund">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Withdraw Fund</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#TransferFund">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Transfer</strong>
                        </a>
                    </div>
                    
                    <div class="item">
                        <a href="<?= basedomain . "{$UserInfo->accid}" ?>" target="_blank">
                            <div class="icon-wrapper bg-dark">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>My Shop</strong>
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



        <!-- Stats -->
        <div class="section">
            <div class="row mt-2 mb-4">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Referred By</div>
                        <div class="value"><?= $Core->getReferrer($UserInfo->accid) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Sponsored By</div>
                        <div class="value"><?= $Core->getSponsor($UserInfo->accid) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->









        