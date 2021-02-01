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
                        <h1 class="amount">N 0.00</h1>
                    </div>
                </div>
                <!-- * balance -->

                <!-- action group -->
                <div class="action-group">
                    <a href="#" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            Deposit
                        </div>
                    </a>
                    <a href="#" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            Withdraw
                        </div>
                    </a>
                    <a href="#" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="apps-outline"></ion-icon>
                            </div>
                            Network
                        </div>
                    </a>
                    <a href="#" class="action-button">
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
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="pie-chart-outline"></ion-icon>
                            </div>
                            <div class="in">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="apps-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Network
                                <span class="badge badge-primary">256</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                            <ion-icon name="stats-chart-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Marketplaces
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                            <ion-icon name="fast-food-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Orders & Sales
                                <span class="badge badge-danger">256</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Transactions
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Cards
                            </div>
                        </a>
                    </li>


                </ul>
                <!-- * menu -->

                <!-- others -->
                <div class="listview-title mt-1">Others</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Profile
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="settings-sharp"></ion-icon>
                            </div>
                            <div class="in">
                                Settings
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="chatbubble-sharp"></ion-icon>
                            </div>
                            <div class="in">
                                Help & Support
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="play-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Tutorials
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
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