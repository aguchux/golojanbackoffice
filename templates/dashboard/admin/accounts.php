        <!-- Wallet Card -->
        <div class="section pt-5">
            <div class="wallet-card">


                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Registered Accounts</span>
                        <h1 class="total"> <?= $Core->AdminCountAccount() ?></h1>
                    </div>
                    <div class="right">
                        <strong class="text-success">0</strong>
                    </div>
                </div>
                <!-- * Balance -->

            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section mt-2 mb-2">

            <div class="section-title">Users & Accounts</div>
            <div class="card p-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">User.ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col" class="text-right">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($user = mysqli_fetch_object($AdminListAccount)): ?>
                            <tr>
                                <th scope="row"><?= $user->accid ?></th>
                                <td><?= $user->fullname ?></td>
                                <td><?= $user->level ?></td>
                                <td class="text-right"><?= $Core->ToMoney($Core->Wallet($user->accid)->open) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- * Stats -->