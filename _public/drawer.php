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


        <!-- App Bottom Menu Sales -->
        <div class="appBottomMenu">
            <a href="#" data-toggle="modal" data-target="#AddFund" class="item <?= ($menukey == 'fund') ? 'active' : '' ?>">
                <div class="col">
                    <ion-icon name="add-outline"></ion-icon>
                    <strong>Add Fund</strong>
                </div>
            </a>
            <a href="#" data-toggle="modal" data-target="#WithdrawFund" class="item <?= ($menukey == 'withdrawal') ? 'active' : '' ?>">
                <div class="col">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                    <strong>Withdraw Money</strong>
                </div>
            </a>
            <a href="/dashboard" class="item">
                <div class="col">
                    <div class="action-button large">
                        <ion-icon name="speedometer-outline" size="large"></ion-icon>
                    </div>
                </div>
            </a>
            <a href="#" data-toggle="modal" data-target="#TransferFund" class="item <?= ($menukey == 'orders') ? 'active' : '' ?>">
                <div class="col">
                    <ion-icon name="swap-vertical"></ion-icon>
                    <strong>Tranfer Money</strong>
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
                    <?php if ($UserInfo->root == "sales") : ?>
                        <!-- action group -->
                        <div class="action-group">

                            <a href="/dashboard/marketplaces" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="stats-chart-outline"></ion-icon>
                                    </div>
                                    Warehouse
                                </div>
                            </a>

                            <a href="/dashboard/orders" class="action-button">
                                <div class="in">
                                    <div class="iconbox">
                                        <ion-icon name="fast-food-outline"></ion-icon>
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
                            <a href="/dashboard/network/networks" class="action-button">
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

                    <?php if ($UserInfo->root == "pos") : ?>
                    <?php endif; ?>
                    <!-- Action Menu Buttons -->

                    <!-- Platform Main Menus -->
                    <div class="listview-title mt-1">Platform Menu</div>
                    <?php if ($UserInfo->root == "sales") : ?>
                        <!-- menu -->
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a href="/dashboard/sales/warehousing" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="stats-chart-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Warehouse
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
                        <ul class="listview flush transparent no-line image-listview">

                            <li>
                                <a href="/dashboard/merchant/products" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        My Products
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/merchant/orders" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Orders & Sales
                                        <span class="badge badge-danger">0</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/merchant/warehousing" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Warehousing
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/merchant/transactions" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Transactions
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/merchant/reviews" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Reviews & Ratings
                                    </div>
                                </a>
                            </li>


                            <li>
                                <a href="/dashboard/merchant/store" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Store Settings
                                    </div>
                                </a>
                            </li>


                        </ul>
                        <!-- * menu -->
                    <?php endif; ?>

                    <?php if ($UserInfo->root == "network") : ?>
                        <!-- menu -->
                        <ul class="listview flush transparent no-line image-listview">

                            <li>
                                <a href="/dashboard/network/networks" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        My Network
                                        <span class="badge badge-primary"><?= $Core->MyTotalNetwork($UserInfo->accid) ?></span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/network/referrals" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Referrals
                                        <span class="badge badge-success"><?= $Core->MyReferrals($UserInfo->accid) ?></span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/network/commissions" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Commissions
                                    </div>
                                </a>
                            </li>


                        </ul>
                        <!-- * menu -->
                    <?php endif; ?>

                    <?php if ($UserInfo->root == "logistics") : ?>
                        <!-- menu -->
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

                    <?php if ($UserInfo->root == "pos") : ?>
                        <!-- menu -->
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Sales Desk
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Transactions
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Customers
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Sales Team
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Sales Report
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Manage Products
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="/dashboard/pos/" class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Settings & Setup
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
                            <a href="/dashboard/wallet" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Wallet
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="/dashboard/accounts" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Bank Account
                                </div>
                            </a>
                        </li>

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
                                    <ion-icon name="newspaper-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    News & Stories
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="flag-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Marketing Tools
                                </div>
                            </a>
                        </li>

                    </ul>
                    <!-- * others -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Switch Business Platforms</div>
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
                            <a href="/dashboard/pos/switch" class="item">
                                <div class="icon-box bg-<?= ($UserInfo->root == "pos") ? 'success' : 'primary' ?>">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </div>
                                <div class="in">Point Of Sale Systems</div>
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
                        <li>
                            <a href="/auth/logout" class="item">
                                <div class="icon-box bg-danger">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
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