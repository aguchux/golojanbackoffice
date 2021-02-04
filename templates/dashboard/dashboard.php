        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Unclaimed Balance</span>
                        <h1 class="total"><?= $Core->Naira($Wallet->balance) ?></h1>
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
                        <a href="#" data-toggle="modal" data-target="#withdrawActionSheet">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            <strong>Deposit</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
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
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Transfer</strong>
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
                        <div class="value text-success"><?= $Core->Naira($Wallet->open) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Closed Balance</div>
                        <div class="value text-danger"><?= $Core->Naira($Wallet->closed) ?></div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Store Capacity</div>
                        <div class="value"><?= $Core->Naira($StoreInfo->capacity) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Volume Stocked</div>
                        <div class="value"><?= $Core->Naira($Core->StockVolume($UserInfo->accid)) ?></div>
                    </div>
                </div>
            </div>



        </div>
        <!-- * Stats -->



        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-12 table-responsive">

                    <table class="table tabel-dark table-stripped table-bordered w-100">
                        <tr class="bg-info">
                            <td>LEVEL</td>
                            <td>REFERRALS</td>
                            <td>COMMISSION</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 1)) ?>/2</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 2)) ?>/4</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 3)) ?>/8</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 4)) ?>/16</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 5)) ?>/32</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 6)) ?>/64</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 7)) ?>/128</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 8)) ?>/256</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>

                    </table>


                </div>

                <div class="col-12 ">

                </div>

            </div>
        </div>
        <!-- * Stats -->