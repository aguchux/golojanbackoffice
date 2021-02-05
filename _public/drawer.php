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


        <!-- App Bottom Menu -->
        <div class="appBottomMenu">

            <a href="/dashboard/networks" class="item <?= ($menukey == 'networks') ? 'active' : '' ?>">
                <div class="col">
                    <ion-icon name="apps-outline"></ion-icon>
                    <strong>Networks</strong>
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
        <!-- * App Bottom Menu -->

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
                            <strong><?= $UserInfo->fullname ?></strong>
                            <div class="text-muted"><?= $UserInfo->accid ?></div>
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
                            <h1 class="amount"><?= $Core->Naira($Wallet->balance) ?></h1>
                        </div>
                    </div>
                    <!-- * balance -->

                    <!-- action group -->
                    <div class="action-group">
                        <a href="/dashboard/deposit" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                                Deposit
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
                        <a href="/dashboard/networks" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="apps-outline"></ion-icon>
                                </div>
                                Network
                            </div>
                        </a>
                        <a href="/dashboard/orders" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                Sales
                            </div>
                        </a>
                    </div>
                    <!-- * action group -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Menu</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="/dashboard" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="pie-chart-outline"></ion-icon>
                                </div>
                                <div class="in">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/networks" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="apps-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Network
                                    <span class="badge badge-primary"><?=$Core->MyTotalNetwork($UserInfo->accid) ?></span>
                                </div>
                            </a>
                        </li>
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
                        <li>
                            <a href="/dashboard/transactions" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Transactions
                                </div>
                            </a>
                        </li>


                    </ul>
                    <!-- * menu -->

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
                    <div class="listview-title mt-1"> --- </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

<?php endif; ?>