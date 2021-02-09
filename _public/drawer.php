<?php if ($Me->auth) : ?>


    <?php if ($menukey == "support") : ?>
        <!-- chat footer -->
        <div class="chatFooter mb-10">
            <form>
                <a href="javascript:;" class="btn btn-icon btn-text-secondary rounded">
                    <ion-icon name="camera"></ion-icon>
                </a>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" placeholder="Type a message...">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <button type="button" class="btn btn-icon btn-primary rounded">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </button>
            </form>
        </div>
        <!-- * chat footer -->
    <?php else : ?>


        <?php if ($UserInfo->root == "sales") : ?>


            <!-- App Bottom Menu Sales -->
            <div class="appBottomMenu">
                <a href="/dashboard/fund" class="item <?= ($menukey == 'fund') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="arrow-down-outline"></ion-icon>
                        <strong>Fund</strong>
                    </div>
                </a>
                <a href="/dashboard/marketplace" class="item <?= ($menukey == 'marketplace') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <strong>Marketplace</strong>
                    </div>
                </a>
                <a href="/dashboard" class="item">
                    <div class="col">
                        <div class="action-button large">
                            <ion-icon name="speedometer-outline" size="large"></ion-icon>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/orders" class="item <?= ($menukey == 'orders') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="fast-food-outline"></ion-icon>
                        <strong>Orders & Sales</strong>
                    </div>
                </a>
                <a href="/dashboard/settings" class="item <?= ($menukey == 'settings') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="settings-outline"></ion-icon>
                        <strong>Settings</strong>
                    </div>
                </a>
            </div>
            <!-- * App Bottom Menu Sales -->

            <!-- Send Action Sheet -->
            <div class="modal fade action-sheet" id="AddFund" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white">Add Fund</h5>
                        </div>
                        <div class="modal-body">
                            <div class="action-sheet-content">
                                <form action="/payments/addfund" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <?= $Self->tokenize() ?>
                                    <div class="form-group basic">
                                        <label class="label" for="amount">Enter Amount</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="amount"><?= $LocationInfo->currency_code ?></span>
                                            </div>
                                            <input type="number" min="<?= min_funding_amount ?>" class="form-control form-control-lg" placeholder="0" name="amount" id="amount" autocomplete="off" required aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="method">Select Payment Method</label>
                                            <select class="form-control custom-select" id="method" name="method">
                                                <option value="paystack">Online Payment (Instant)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group basic">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                                            <ion-icon name="card-outline"></ion-icon> Add Fund
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Send Action Sheet -->


            <!-- Withdraw Action Sheet -->
            <div class="modal fade action-sheet" id="WithdrawFund" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white">Withdraw Money</h5>
                        </div>
                        <div class="modal-body">
                            <div class="action-sheet-content">
                                <form>


                                    <div class="form-group basic">
                                        <label class="label" for="amount">Enter Amount</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="amount"><?= $LocationInfo->currency_code ?></span>
                                            </div>
                                            <input style="font-size:200%;" type="number" min="<?= min_withdrawal_amount ?>" class="form-control form-control-lg" placeholder="0" name="amount" id="amount" autocomplete="off" required aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="text11d">Bank Account</label>
                                            <input type="email" class="form-control" id="text11d" placeholder="Enter IBAN">
                                            <i class="clear-input">
                                                <ion-icon name="close-circle"></ion-icon>
                                            </i>
                                        </div>
                                    </div>


                                    <div class="form-group basic">
                                        <button type="button" class="btn btn-primary btn-block btn-lg" data-dismiss="modal">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Withdraw Action Sheet -->


            <!-- Exchange Action Sheet -->
            <div class="modal fade action-sheet" id="TransferFund" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title text-white">Transfer Fund</h5>
                        </div>
                        <div class="modal-body">
                            <div class="action-sheet-content">
                                <form action="/payments/transfer" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <?= $Self->tokenize() ?>

                                    <div class="form-group basic">
                                        <label class="label" for="receipient_id">Receipient Account</label>
                                        <input type="text" style="font-size:200%;" class="form-control form-control-lg" pattern="\d*" id="receipient_id" name="receipient" placeholder="Reciepient's ID">
                                        <i class="clear-input">
                                            <ion-icon name="person-outline"></ion-icon>
                                        </i>

                                        <div class="listview image-listview media inset mb-2 m-0 p-0 ">
                                            <li id="ReceipientInfo" class="d-none"></li>
                                        </div>

                                    </div>
                                    <div class="form-group basic">
                                        <label class="label">Enter Amount</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="amount_on_transfer"><?= $LocationInfo->currency_code ?></span>
                                            </div>
                                            <input type="number" min="<?= min_transfer_amount ?>" style="font-size:200%;" class="form-control form-control-lg" name="amount" id="amount_on_transfer" placeholder="0" required aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group basic">
                                        <button type="submit" id="TransferBtn" class="btn btn-primary btn-block btn-lg" disabled>Transfer Fund</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Exchange Action Sheet -->

        <?php endif;  ?>

        <?php if ($UserInfo->root == "logistics") : ?>
            <!-- App Bottom Menu Sales -->
            <div class="appBottomMenu">
                <a href="/dashboard/#" class="item <?= ($menukey == 'pick-up') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="basket-outline"></ion-icon>
                        <strong>Pick up</strong>
                    </div>
                </a>
                <a href="/dashboard/#" class="item <?= ($menukey == 'deliver') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <strong>Deliver</strong>
                    </div>
                </a>
                <a href="/dashboard" class="item">
                    <div class="col">
                        <div class="action-button large">
                            <ion-icon name="speedometer-outline" size="large"></ion-icon>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/orders" class="item <?= ($menukey == 'orders') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="fast-food-outline"></ion-icon>
                        <strong>Orders</strong>
                    </div>
                </a>
                <a href="/dashboard/settings" class="item <?= ($menukey == 'settings') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="settings-outline"></ion-icon>
                        <strong>Settings</strong>
                    </div>
                </a>
            </div>
            <!-- * App Bottom Menu Sales -->

        <?php endif;  ?>

        <?php if ($UserInfo->root == "merchant") : ?>
            <!-- App Bottom Menu Merchant -->
            <div class="appBottomMenu">
                <a href="/dashboard/add" class="item <?= ($menukey == 'add') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="add-outline"></ion-icon>
                        <strong>Add</strong>
                    </div>
                </a>
                <a href="/dashboard/statistics" class="item <?= ($menukey == 'statistics') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <strong>Statistics</strong>
                    </div>
                </a>
                <a href="/dashboard" class="item">
                    <div class="col">
                        <div class="action-button large">
                            <ion-icon name="speedometer-outline" size="large"></ion-icon>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/orders" class="item <?= ($menukey == 'orders') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="fast-food-outline"></ion-icon>
                        <strong>Orders & Sales</strong>
                    </div>
                </a>
                <a href="/dashboard/settings" class="item <?= ($menukey == 'settings') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="settings-outline"></ion-icon>
                        <strong>Settings</strong>
                    </div>
                </a>
            </div>
            <!-- * App Bottom Menu Merchant -->
        <?php endif;  ?>

        <?php if ($UserInfo->root == "networks") : ?>
            <!-- App Bottom Menu Networks -->
            <div class="appBottomMenu">
                <a href="/dashboard/networks" class="item <?= ($menukey == 'networks') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="apps-outline"></ion-icon>
                        <strong>Networks</strong>
                    </div>
                </a>
                <a href="/dashboard/#" class="item <?= ($menukey == 'geneology') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="people-outline"></ion-icon>
                        <strong>Geneology</strong>
                    </div>
                </a>
                <a href="/dashboard" class="item">
                    <div class="col">
                        <div class="action-button large">
                            <ion-icon name="speedometer-outline" size="large"></ion-icon>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/#" class="item <?= ($menukey == '') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="fast-food-outline"></ion-icon>
                        <strong>Levels</strong>
                    </div>
                </a>
                <a href="/dashboard/settings" class="item <?= ($menukey == 'settings') ? 'active' : '' ?>">
                    <div class="col">
                        <ion-icon name="settings-outline"></ion-icon>
                        <strong>Settings</strong>
                    </div>
                </a>
            </div>
            <!-- * App Bottom Menu Networks -->
        <?php endif;  ?>



    <?php endif; ?>

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="<?= $UserInfo->avatar ?>" class="imaged  w36">
                        </div>
                        <div class="in">
                            <strong><?= "{$UserInfo->fullname}({$UserInfo->accid})" ?></strong>
                            <div class="text-muted"><?= $UserInfo->email ?></div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <!-- balance -->
                    <div class="sidebar-balance">
                        <div class="listview-title">Live Balance</div>
                        <div class="in">
                            <h1 class="amount"><?= $Core->ToMoney($Wallet->balance) ?></h1>
                        </div>
                    </div>
                    <!-- * balance -->

                    <!-- Action Menu Buttons -->
                    <?php if ($UserInfo->root == "logistics") : ?>
                        <!-- action group -->
                        <div class="action-group">
                            <a href="/dashboard/withdraw" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="arrow-down-outline"></ion-icon>
                                    </div>
                                    Withdraw
                                </div>
                            </a>

                            <a href="/dashboard/orders" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="bad-handle-outline"></ion-icon>
                                    </div>
                                    Orders
                                </div>
                            </a>
                        </div>
                        <!-- * action group -->
                    <?php endif; ?>


                    <?php if ($UserInfo->root == "sales") : ?>
                        <!-- action group -->
                        <div class="action-group">
                            <a href="/dashboard/deposit" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="wallet-outline"></ion-icon>
                                    </div>
                                    Fund
                                </div>
                            </a>
                            <a href="/dashboard/withdraw" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="arrow-down-outline"></ion-icon>
                                    </div>
                                    Withdraw
                                </div>
                            </a>
                            <a href="/dashboard/marketplace" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="basket-outline"></ion-icon>
                                    </div>
                                    Sales
                                </div>
                            </a><a href="/dashboard/order" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </div>
                                    Sales
                                </div>
                            </a>
                        </div>
                        <!-- * action group -->
                    <?php endif; ?>


                    <?php if ($UserInfo->root == "merchant") : ?>
                        <!-- action group -->
                        <div class="action-group">
                            <a href="/dashboard/add" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="add-outline"></ion-icon>
                                    </div>
                                    Add
                                </div>
                            </a>
                            <a href="/dashboard/withdraw" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="arrow-down-outline"></ion-icon>
                                    </div>
                                    Withdraw
                                </div>
                            </a>
                            <a href="/dashboard/orders" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="basket-outline"></ion-icon>
                                    </div>
                                    Orders
                                </div>
                            </a>
                        </div>
                        <!-- * action group -->
                    <?php endif; ?>

                    <?php if ($UserInfo->root == "network") : ?>
                        <!-- action group -->
                        <div class="action-group">
                            <a href="/dashboard/withdraw" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="arrow-down-outline"></ion-icon>
                                    </div>
                                    Withdraw
                                </div>
                            </a>
                            <a href="/dashboard/networks" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="apps-outline"></ion-icon>
                                    </div>
                                    Network
                                </div>
                                <a href="/dashboard/exchange" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="repeat-outline"></ion-icon>
                                        </div>
                                        Exchange
                                    </div>
                                </a>
                        </div>
                        <!-- * action group -->
                    <?php endif; ?>
                    <!-- Action Menu Buttons -->



                    <!-- Platform Main Menus -->
                    <?php if ($UserInfo->root == "sales") : ?>
                        <!-- menu -->
                        <div class="listview-title mt-1">Menu</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a href="/dashboard/marketplace" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="stats-chart-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Marketplaces
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/orders" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="fast-food-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Orders & Sales
                                        <span class="badge badge-danger">0</span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <!-- * menu -->
                    <?php endif; ?>

                    <?php if ($UserInfo->root == "merchant") : ?>
                        <!-- menu -->
                        <div class="listview-title mt-1">Menu</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a href="/dashboard/marketplace" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="stats-chart-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Add Products
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/marketplace" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="stats-chart-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Remove Products
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/orders" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="fast-food-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Orders & Sales
                                        <span class="badge badge-danger">0</span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <!-- * menu -->
                    <?php endif; ?>

                    <?php if ($UserInfo->root == "network") : ?>
                        <!-- menu -->
                        <div class="listview-title mt-1">Menu</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a href="/dashboard/networks" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="apps-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        My Network
                                        <span class="badge badge-primary"><?= $Core->MyTotalNetwork($UserInfo->accid) ?></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- * menu -->
                    <?php endif; ?>

                    <?php if ($UserInfo->root == "logistics") : ?>
                        <!-- menu -->
                        <div class="listview-title mt-1">Menu</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a href="/dashboard/marketplace" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="stats-chart-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Logistics Info
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/orders" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="fast-food-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Available Orders
                                        <span class="badge badge-danger">0</span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <!-- * menu -->
                    <?php endif; ?>
                    <!-- Platform Main Menus -->


                    <!-- others -->
                    <div class="listview-title mt-1">Others</div>
                    <ul class="listview flush transparent no-line image-listview">
                    <li>
                            <a href="/dashboard/profile" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="person-circle-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Profile
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/accounts" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Bank Account
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/settings" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="settings-sharp"></ion-icon>
                                </div>
                                <div class="in">
                                    Settings
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/support" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-sharp"></ion-icon>
                                </div>
                                <div class="in">
                                    Help & Support
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/tutorials" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="play-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Tutorials
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/stories" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    News & Stories
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="/auth/logout" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Switch Platforms</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="/dashboard/sales/switch" class="item">
                                <div class="icon-box bg-<?= ($UserInfo->root == "sales") ? 'success' : 'primary' ?>">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                </div>
                                <div class="in">Sales & Marketing</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/network/switch" class="item">
                                <div class="icon-box bg-<?= ($UserInfo->root == "network") ? 'success' : 'primary' ?>">
                                    <ion-icon name="apps-outline"></ion-icon>
                                </div>
                                <div class="in">Networking & Referrals</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/merchant/switch" class="item">
                                <div class="icon-box bg-<?= ($UserInfo->root == "merchant") ? 'success' : 'primary' ?>">
                                    <ion-icon name="medkit-outline"></ion-icon>
                                </div>
                                <div class="in">Merchant & Sellers</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/logistics/switch" class="item">
                                <div class="icon-box bg-<?= ($UserInfo->root == "logistics") ? 'success' : 'primary' ?>">
                                    <ion-icon name="airplane-outline"></ion-icon>
                                </div>
                                <div class="in">Delivery & Logistics</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/artisan/switch" class="item">
                                <div class="icon-box bg-<?= ($UserInfo->root == "artisan") ? 'success' : 'primary' ?>">
                                    <ion-icon name="build-outline"></ion-icon>
                                </div>
                                <div class="in">Artisans & Servicemen</div>
                            </a>
                        </li>
                    </ul>

                    <!-- Location -->
                    <div class="listview-title mt-1">Switch Location</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="/dashboard/locations" class="item">
                                <div class="icon-box bg-danger">
                                    <ion-icon name="location-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Change Location
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * Location -->

                    <div class="listview-title mt-1"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

<?php endif; ?>