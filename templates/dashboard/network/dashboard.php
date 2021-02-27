        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Recruitment</span>
                        <h1 class="total"><?= $Core->MyTotalNetwork($UserInfo->accid) ?></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button flashbutton_level_<?= $UserInfo->level ?>" data-toggle="modal" data-target="#depositActionSheet">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->


                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="/dashboard/network/networks">
                            <div class="icon-wrapper bg-primary">
                                <ion-icon name="apps-outline"></ion-icon>
                            </div>
                            <strong>Network</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/dashboard/network/referrals">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                            <strong>Referrals</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/dashboard/tutorials">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="play-outline"></ion-icon>
                            </div>
                            <strong>Learn</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/dashboard/tools">
                            <div class="icon-wrapper bg-secondary">
                                <ion-icon name="flag-outline"></ion-icon>
                            </div>
                            <strong>My Tools</strong>
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
                        <div class="title">Expected Bonus</div>
                        <div class="value text-primary"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Paid Bonus</div>
                        <div class="value text-primary"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
            </div>


        </div>
        <!-- * Stats -->

        <!-- Stats -->
        <div class="section">

            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Next Bonus</div>
                        <div class="value text-success"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Incoming Bonus</div>
                        <div class="value text-danger"><?= $Core->ToMoney(0) ?></div>
                    </div>
                </div>
            </div>


        </div>
        <!-- * Stats -->


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Referred By</div>
                        <div class="value"><?= $Core->getReferrer($UserInfo->accid) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Sponsored By</div>
                        <div class="value"><?= $Core->getSponsor($UserInfo->accid) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->

        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">My Network</div>
                        <div class="value"><?= $Core->MyTotalNetwork($UserInfo->accid) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">My Referrals</div>
                        <div class="value"><?= $Core->MyReferrals($UserInfo->accid) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->

        <!-- Stats -->
        <div class="section mb-5">
            <div class="row mt-2">
                <div class="col-12 table-responsive">

                    <table class="table table-stripped rounded table-bordered w-100">
                        <tr scope="col" class="bg-primary">
                            <td>LEVEL</td>
                            <td>NETWORK</td>
                            <td>REFERRALS</td>
                            <td>BONUS</td>
                        </tr>
                        <tr scope="row">
                            <td>1</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 1)) ?>/2</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 1, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>2</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 2)) ?>/4</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 2, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>3</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 3)) ?>/8</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 3, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>4</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 4)) ?>/16</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 4, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>5</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 5)) ?>/32</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 5, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>6</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 6)) ?>/64</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 6, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>7</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 7)) ?>/128</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 7, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                        <tr scope="row">
                            <td>8</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 8)) ?>/256</td>
                            <td><?= count($Core->MyNetwork($UserInfo->accid, 8, "referrer")) ?></td>
                            <td><?= $Core->ToMoney(0) ?></td>
                        </tr>
                    </table>


                </div>

                <div class="col-12 ">

                </div>

            </div>
        </div>
        <!-- * Stats -->