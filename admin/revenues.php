<?php
include "connections.php";
include "header.php";
?>
<style>
    .submit-btn {
        background: #2ee932;
        border: none;
        padding: 5px 19px;
        color: #fff;
        border-radius: 4px;
        font-size: 20px;
        cursor: pointer;
    }
    .submit-btn:hover {
        opacity: 0.8;
    }
</style>
<div class="col-lg-12">
    <h1 style="margin-bottom: 10px;">Doanh thu</h1>
    <div class="card">
        <div class="card-body">
            <?php
                $sql =mysqli_query($link, "SELECT SUM(total_price) AS total FROM `receipt_item`");
            ?>
            <p style="font-size: 25px;">Tổng doanh thu: <?php echo number_format($sql->fetch_object()->total, 0,',','.') . ' đ'; ?></p>
            <form class="form_export_pdf" action="./export_revenues.php" method="post">
                <input class="submit-btn" type="submit" value="Xuất PDF">
            </form>
        </div>
    </div>
</div>


<?php 
include "footer.php";
?>