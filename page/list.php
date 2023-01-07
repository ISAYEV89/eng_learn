<?php
require_once __DIR__ . '/../include/header.php';
require_once __DIR__ . '/../include/auth.php';

$row = $db->prepare("SELECT * FROM `word` WHERE `u_id` = '$u_id'");
$row->execute();

?>

<div class="container">
    <div class="row block">

        <div class="wui-content ">


            <div class="page">
                <div class="page-header">
                    <div>Sözlər</div>
                    <div>
                        <a class="btn btn-add btn-success" href="<?php echo $site_url; ?>page/add.php"> <i
                                class="fa fa-plus"></i> Əlavə et </a></div>
                </div>
                <div class="page-main overflow">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/s</th>
                            <th>Eng</th>
                            <th>Az</th>
                            <th>Toplam</th>
                            <th>Düz</th>
                            <th>Səhv</th>
                            <th>Faiz</th>
                            <th>Status</th>
                            <th>Emeliyyat</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $s = 0;
                        while ($e = $row->fetch(PDO::FETCH_ASSOC)) {
                            $s++
                            ?>
                            <tr>
                                <td><?php echo $s ?></td>
                                <td><?php echo $e['en_word'] ?></td>
                                <td><?php echo $e['az_word'] ?></td>
                                <td><?php echo $e['count'] ?></td>
                                <td><?php echo $e['true_count'] ?></td>
                                <td><?php echo $e['false_count'] ?></td>
                                <td><?php echo $e['percent'] ?></td>
                                <td><?php echo $e['s_id'] ?></td>

<!--                                <td><i class="status-icon fa fa-toggle---><?php //echo ($e['s_id'] == 1) ? 'on' : 'off'; ?><!--"></i> </td>-->

                                <td>
                                    <a class="edit-icon" href="<?php echo $site_url ?>page/edit.php?id=<?php echo $e['id']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="delete-icon deleteItem"  href="<?php echo $site_url ?>page/delete.php?delete=<?php echo $e['id']; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>





                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>
</div>
<?php require_once __DIR__ . '/../include/footer.php' ?>


