<?php
    include("connections.php");
    require_once("./dompdf/autoload.inc.php");

    use Dompdf\Dompdf;
    extract($_POST);
    
    $dompdf = new Dompdf();
    $sql = "SELECT * FROM receipt_item";
        $query = mysqli_query($link, $sql);
        $html ='';
        $html.= '
            <h2 style="text-align: center;">List Receipt Item</h2>
            <table style ="width :100%; border-collapse: collapse;">
            <tr>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">ID</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Receipt ID</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Item Name</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Item Price</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Quantity</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Total Price</th>
            </tr>
        ';
        if(mysqli_num_rows($query) > 0) {
            foreach($query as $data) {
                $html .= '
                    <tr>
                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["id"] . '</td>
                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["receipt_id"] . '</td>
\                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["item_name"] . '</td>
\                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["item_price"] . '</td>
\                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["quantity"] . '</td>
\                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["total_price"] . '</td>
\                    </tr>
                ';
            }
        } else {
            $html .= '
                <tr>
                    <td colspan ="4" style ="border: 1px solid #ddd; padding: 8px; text-align: left;">No data</td>
                </tr>
            ';
        }
    $html .= '</table>';
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "lnandscape");
    $dompdf->render();
    $dompdf->stream("ListReceiptItem.pdf");
?>


