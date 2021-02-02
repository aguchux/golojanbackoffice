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
                        <a href="#" class="button" data-toggle="modal" data-target="#depositActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="/dashboard/withdraw" data-toggle="modal" data-target="#withdrawActionSheet">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            <strong>Send</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="app-cards.html">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>Cards</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Exchange</strong>
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
                        <div class="title">Sales</div>
                        <div class="value"><?= $Core->Naira(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Commission</div>
                        <div class="value"><?= $Core->Naira(0) ?></div>
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
                            <td>0/2</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>0/4</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>0/8</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>0/16</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>0</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>0</td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td></td>
                            <td><?= $Core->Naira(0) ?></td>
                        </tr>
                    </table>


                </div>

                <div class="col-12 ">

                </div>

            </div>
        </div>
        <!-- * Stats -->