        <!-- Wallet Card -->
        <div class="section pt-3">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Withdrawals</span>
                        <h1 class="total"><?= $Core->ToMoney($Core->AdminSumWithdrawals()) ?></h1>
                    </div>
                </div>
                <!-- * Balance -->

            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section mt-2 mb-2">

            <div class="section-title">Funds Withdrawals</div>
            <div class="card p-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Trx.ID</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($withdrawal = mysqli_fetch_object($AdminListWithdrawals)): ?>
                            <tr>
                                <th scope="row"><?= $withdrawal->transid ?></th>
                                <td><?= $Core->UserInfo($withdrawal->accid,"fullname") ?></td>
                                <td class="text-center"><?= $Core->ToMoney($withdrawal->amount) ?></td>
                                <td><?= $withdrawal->created ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- * Stats -->