        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Merchants</span>
                        <h1 class="total">0</h1>
                    </div>
                </div>
                <!-- * Balance -->


                <!-- Wallet Footer -->
                <div class="wallet-footer">


                    <div class="item">
                        <a href="/dashboard/hunter/new-merchant">
                            <div class="icon-wrapper bg-secondary">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            <strong>Add Merchant</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="/dashboard/hunter/merchants">
                            <div class="icon-wrapper bg-secondary">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                            <strong>Merchants</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="/dashboard/hunter/submissions">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="cloud-upload-outline"></ion-icon>
                            </div>
                            <strong>Submissions</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="/dashboard/hunter/products">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="cloud-upload-outline"></ion-icon>
                            </div>
                            <strong>Products</strong>
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
                        <div class="value"><?= $Core->MerchantCountAccount($UserInfo->accid) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Total Online</div>
                        <div class="value text-success">0</div>
                    </div>
                </div>
            </div>







        </div>
        <!-- * Stats -->