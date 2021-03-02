        <!-- Wallet Card -->
        <div class="section pt-3">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Transfers</span>
                        <h1 class="total"><?= $Core->ToMoney($Core->AdminSumTransfers()) ?></h1>
                    </div>
                </div>
                <!-- * Balance -->

            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section mt-2 mb-2">

            <div class="section-title">Funds Transfers</div>
            <div class="card p-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Trx.ID</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($transfer = mysqli_fetch_object($AdminListTransfers)) : ?>
                                <tr>
                                    <th scope="row"><?= $transfer->transid ?></th>
                                    <td><?= $Core->UserInfo($transfer->accid_from, "fullname") ?></td>
                                    <td><?= $Core->UserInfo($transfer->accid_to, "fullname") ?></td>
                                    <td class="text-center"><?= $Core->ToMoney($transfer->amount) ?></td>
                                    <td><?= $transfer->created ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- * Stats -->