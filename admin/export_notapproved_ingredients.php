<?php
    include("connections.php");
    require_once("./dompdf/autoload.inc.php");

    use Dompdf\Dompdf;
    extract($_POST);
    
    $dompdf = new Dompdf();
    $sql = "SELECT * FROM food_ingredients WHERE approved = 'no' or approved = 'waiting'";
        $query = mysqli_query($link, $sql);
        $html ='';
        $html.= '
            <h2 style="text-align: center;">List Not Approved Ingredients</h2>
            <table style ="width :100%; border-collapse: collapse;">
            <tr>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">ID</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Food Ingredient</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left">Approved</th>
            </tr>
        ';
        if(mysqli_num_rows($query) > 0) {
            foreach($query as $data) {
                $html .= '
                    <tr>
                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["id"] . '</td>
                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["food_ingredient"] . '</td>
\                    <td style ="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data["approved"] . '</td>
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
    $dompdf->stream("ListNotApprovedIngredient.pdf");
?>


