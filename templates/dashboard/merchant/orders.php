        <!-- Wallet Card -->
        <div class="section pt-1">
            <div class="wallet-card">

                
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Recent Orders</span>
                        <h1 class="total"><?= $Core->ToMoney(0) ?></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-toggle="modal" data-target="#">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->

            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Open Balance</div>
                        <div class="value text-success"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Closed Balance</div>
                        <div class="value text-danger"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Store Capacity</div>
                        <div class="value"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Volume Stocked</div>
                        <div class="value"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->