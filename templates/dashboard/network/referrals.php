<!-- Wallet Card -->
<div class="section  mt-4">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title" style="line-height: normal;">Total Referred</span>
                <h1 class="total"><?= $Core->MyReferrals($UserInfo->accid) ?></h1>
            </div>
            <div class="right">
                <a href="#" data-toggle="modal" data-target="#InvitePerson" class="button">
                    <ion-icon name="person-add-outline"></ion-icon>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Wallet Card -->

<div class="section mt-2 mb-2">
    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-stripped table-hovered">
                <thead>
                    <tr>
                        <th scope="col">-</th>
                        <th scope="col">Name</th>
                        <th scope="col">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($referral = mysqli_fetch_object($AccountReferrals)) :  ?>
                        <tr>
                            <th scope="row"><?= $referral->accid ?></th>
                            <td><?= $referral->fullname ?></td>
                            <td><?= date("jS M Y", strtotime($referral->created)) ?></td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>