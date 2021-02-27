        <!-- Wallet Card -->
        <div class="section pt-3">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Deposits</span>
                        <h1 class="total"><?= $Core->ToMoney($Core->AdminSumDeposits()) ?></h1>
                    </div>
                </div>
                <!-- * Balance -->

            </div>
        </div>
        <!-- Wallet Card -->

        <!-- Stats -->
        <div class="section mt-2 mb-2">

            <div class="section-title">Fund Deposits</div>
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
                            <?php while($deposit = mysqli_fetch_object($AdminListDeposits)): ?>
                            <tr>
                                <th scope="row"><?= $deposit->transid ?></th>
                                <td><?= $Core->UserInfo($deposit->accid,"fullname") ?></td>
                                <td class="text-center"><?= $Core->ToMoney($deposit->amount) ?></td>
                                <td><?= $deposit->date_created ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- * Stats -->