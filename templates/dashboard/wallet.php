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
                <a href="#" class="button" data-toggle="modal" data-target="#StartUpgrade">
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
                    <strong>Withdraw</strong>
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
                <a href="/dashboard/accounts">
                    <div class="icon-wrapper bg-primary">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                    <strong>Banks</strong>
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
                <div class="smallvalue text-success"><?= $Core->ToMoney($Wallet->open) ?></div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Closed Balance</div>
                <div class="smallvalue text-danger"><?= $Core->ToMoney($Wallet->closed) ?></div>
            </div>
        </div>
    </div>

</div>
<!-- * Stats -->

<div class="section mt-2 mb-2">
    <div class="section-title text-center bg-primary rounded">Transactions & Payments</div>
    <div class="table-responsive mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Info</th>
                    <th scope="col" class="text-right">Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">44623</th>
                    <td>#50,000</td>
                    <td>Sales</td>
                    <td class="text-right"># 3,420.50</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>