        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">System Balance</span>
                        <h1 class="total"><?= $Core->ToMoney($Core->AdminSumWallets()) ?></h1>
                    </div>
                </div>
                <!-- * Balance -->


                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="/dashboard/admin/accounts">
                            <div class="icon-wrapper bg-secondary">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                            <strong>Accounts</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/dashboard/admin/deposits">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            <strong>Deposits</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/dashboard/admin/withdrawals">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Withdrawals</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/dashboard/admin/transfers">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Transfers</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="/dashboard/admin/submissions">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="cloud-upload-outline"></ion-icon>
                            </div>
                            <strong>Submissions</strong>
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
                        <div class="title">Total Accounts</div>
                        <div class="value"><?= $Core->AdminCountAccount() ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Total Online</div>
                        <div class="value text-success">0</div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Open Balances</div>
                        <div class="value text-success"><?= $Core->ToMoney($Core->AdminSumOpenWallets()) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Closed Balances</div>
                        <div class="value text-danger"><?= $Core->ToMoney($Core->AdminSumClosedWallets()) ?></div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Total Orders</div>
                        <div class="value"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Total Sales</div>
                        <div class="value"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Cancelled Orders</div>
                        <div class="value">19,0000 @ <?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Returned Orders</div>
                        <div class="value">345,0000 @ <?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
            </div>









        </div>
        <!-- * Stats -->