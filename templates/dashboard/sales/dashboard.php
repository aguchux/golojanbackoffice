<?php
$UserOrders = $Core->UserOrders($UserInfo->accid);
?>

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


    <div class="row mt-2">
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Store Capacity</div>
                <div class="smallvalue"><?= $Core->ToMoney($StoreInfo->capacity) ?></div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Volume Stocked</div>
                <div class="smallvalue"><?= $Core->ToMoney($Core->StockVolume($UserInfo->accid)) ?></div>
            </div>
        </div>
    </div>



</div>
<!-- * Stats -->





<div class="section mt-2 mb-2">
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