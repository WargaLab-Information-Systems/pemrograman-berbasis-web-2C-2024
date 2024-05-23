<div class="container sidebar-active">
    <div class="data">
        <h1>Profil</h1>
        <table class="rapih">
            <tr>
                <td colspan="3">
                    <div class="gambar">
                        <?php if(!empty($_SESSION['user']['foto'])) {?>
                            <img src="./../img/<?= $_SESSION['user']['foto']?>" alt="">
                        <?php } else { ?>
                            <img src="./../img/profil.png" alt="">
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td> : </td>
                <td><?= $_SESSION['user']['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td> : </td>
                <td><?= $_SESSION['user']['email']; ?></td>
            </tr>
            <tr>
                <td>No Telpon</td>
                <td> : </td>
                <td><?= $_SESSION['user']['no_telp']; ?></td>
            </tr>
        </table>
    </div>
</div>