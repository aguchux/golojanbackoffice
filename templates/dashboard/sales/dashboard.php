<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">


        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">New Orders</span>
                <h1 class="total"><?= $Core->ToMoney(0) ?></h1>
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
                <a href="/dashboard/sales/sell">
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
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
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
                <div class="title">Escrow Fund</div>
                <div class="smallvalue text-danger"><?= $Core->ToMoney(0) ?></div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Cancelled Orders</div>
                <div class="smallvalue">0</div>
            </div>
        </div>

    </div>


    <div class="row mt-2">
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Sales Count</div>
                <div class="smallvalue">0</div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Return Count</div>
                <div class="smallvalue">0</div>
            </div>
        </div>

    </div>



</div>
<!-- * Stats -->


<?php $UserOrders = $Core->UserOrders($UserInfo->accid) ?>
<div class="section mt-2 mb-5">
    <div class="section-title text-center bg-primary rounded">Current Orders & Sales</div>
    <div class="table-responsive mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-right">Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_object($UserOrders)) :  ?>
                    <tr>
                        <th scope="row">44623</th>
                        <td>Jane</td>
                        <td>User</td>
                        <td class="text-right">$ 3,420.50</td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>