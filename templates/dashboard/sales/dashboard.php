        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
<<<<<<< HEAD

                
=======
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Unclaimed Balance</span>
<<<<<<< HEAD
                        <h1 class="total"><?= $Core->ToMoney($Wallet->balance) ?></h1>
=======
                        <h1 class="total"><?= $Core->Naira($Wallet->balance) ?></h1>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                    </div>
                    <div class="right">
                        <a href="#" class="button flashbutton" data-toggle="modal" data-target="#depositActionSheet">
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
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            <strong>Sell Item</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Transfer</strong>
                        </a>
                    </div>
                    
                    <div class="item">
                        <a href="#">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>My Shop</strong>
                        </a>
                    </div>



                </div>
                <!-- * Wallet Footer -->
<<<<<<< HEAD


=======
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Open Balance</div>
<<<<<<< HEAD
                        <div class="value text-success"><?= $Core->ToMoney($Wallet->open) ?></div>
=======
                        <div class="value text-success"><?= $Core->Naira($Wallet->open) ?></div>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Closed Balance</div>
<<<<<<< HEAD
                        <div class="value text-danger"><?= $Core->ToMoney($Wallet->closed) ?></div>
=======
                        <div class="value text-danger"><?= $Core->Naira($Wallet->closed) ?></div>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Store Capacity</div>
<<<<<<< HEAD
                        <div class="value"><?= $Core->ToMoney($StoreInfo->capacity) ?></div>
=======
                        <div class="value"><?= $Core->Naira($StoreInfo->capacity) ?></div>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Volume Stocked</div>
<<<<<<< HEAD
                        <div class="value"><?= $Core->ToMoney($Core->StockVolume($UserInfo->accid)) ?></div>
=======
                        <div class="value"><?= $Core->Naira($Core->StockVolume($UserInfo->accid)) ?></div>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
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



        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-12 table-responsive">

                    <table class="table table-stripped rounded table-bordered w-100">
                        <tr scope="col" class="bg-primary">
                            <td>LEVEL</td>
                            <td>NETWORK</td>
                            <td>REFERRALS</td>
                            <td>BONUS</td>
                        </tr>
                        <tr scope="row">
                            <td>1</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 1)) ?>/2</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 1, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>2</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 2)) ?>/4</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 2, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>3</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 3)) ?>/8</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 3, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>4</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 4)) ?>/16</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 4, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>5</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 5)) ?>/32</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 5, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>6</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 6)) ?>/64</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 6, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>7</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 7)) ?>/128</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 7, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                        <tr scope="row">
                            <td>8</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 8)) ?>/256</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 8, "referrer")) ?></td>
<<<<<<< HEAD
                            <td><?= $Core->ToMoney(0) ?></td>
=======
                            <td><?= $Core->Naira(0) ?></td>
>>>>>>> bc07935548b9fb826a350c2b01059d96c4aa6975
                        </tr>
                    </table>


                </div>

                <div class="col-12 ">

                </div>

            </div>
        </div>
        <!-- * Stats -->


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2 mb-4">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">My Network</div>
                        <div class="value"><?= $Core->MyTotalNetwork($UserInfo->accid) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">My Referrals</div>
                        <div class="value"><?= $Core->MyReferrals($UserInfo->accid) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->