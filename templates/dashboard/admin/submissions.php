        <!-- Wallet Card -->
        <div class="section pt-5">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Submissions</span>
                        <h1 class="total"><?= $Core->AdminCountSubmissions() ?></h1>
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
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($submission = mysqli_fetch_object($AdminListSubmissions)) : ?>
                                <tr>
                                    <th scope="row"><?= $submission->id ?></th>
                                    <td><?= $Core->UserInfo($submission->accid, "fullname") ?></td>
                                    <td><?= $Core->ProductsInfo($submission->productid, "name") ?></td>
                                    <td class="text-center"><?= $Core->ToMoney($Core->ProductsInfo($submission->productid, "bulkprice")) ?></td>
                                    <td><?= $submission->created ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- * Stats -->