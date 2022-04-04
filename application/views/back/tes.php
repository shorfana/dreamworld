<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .dotted {
        border-top: 1px dotted;
        border-bottom: 1px dotted;
    }

    .header-text {
        font-size: 18px;
        padding-left: 120px;
        padding-bottom: 10px;
    }

    .head-table {
        /* page-break-inside: avoid; */
        width: 100%;
        border-collapse: collapse;
        /* border:0.5px solid; */
    }

    .p1 {
        /* padding-left: 5px;
        padding-right: 5px; */
        text-align: center;
    }

    hr {
        border-top: 1px dashed red;
    }

    .header-text-sm {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        padding-bottom: 5px;
    }

    .content-text {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
        text-align: center;
    }

    .footer-text {
        border-collapse: collapse;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .b {
        font-weight: bold;
    }

    .tx-r {
        text-align: right;
    }

    .piece-length {
        width: 35px;
        text-align: center;
    }

    .brd-t {
        border-top: 1px solid;
    }

    .grid-container {
        /* display: grid;
        grid-template-columns: auto auto;
        padding: 10px; */
        display: grid;
        display: grid;
        grid: auto auto / auto auto auto auto;
        grid-gap: 10px;
        background-color: green;
        padding: 10px;
    }

    .grid-item {
        /* padding: 20px; */
        font-size: 10px;
        /* text-align: center; */
    }

    .inline {
        float: left;
    }

    /* .bt-tbl{

    } */
</style>

<body style="width:75%;">

    <table border="1" class="content-text dotted head-table">
        <thead>
            <tr class="b">
                <td style="width:35px" rowspan="2" class="p1 b">NO.</td>
                <td style="width:120px" rowspan="2" class="p1 b">CORAK</td>
                <td style="width:30px" rowspan="2" class="p1 b">LBR</td>
                <td style="width:30px" rowspan="2" class="p1 b">GRD</td>
                <td style="width:80px" rowspan="2" class="p1 b">DESIGN-COLOR</td>
                <td style="width:30px" rowspan="2" class="p1 b">PCS</td>
                <td style="width:50px" rowspan="2" class="p1 b">TOTAL</td>
                <td style="text-align:center;" colspan="10" class="p1 b">PIECE LENGTH</td>
            </tr>
            <tr>
                <td class="b piece-length">1</td>
                <td class="b piece-length">2</td>
                <td class="b piece-length">3</td>
                <td class="b piece-length">4</td>
                <td class="b piece-length">5</td>
                <td class="b piece-length">6</td>
                <td class="b piece-length">7</td>
                <td class="b piece-length">8</td>
                <td class="b piece-length">9</td>
                <td class="b piece-length">10</td>
            </tr>
        </thead>
    </table>

    <!-- list data dari controller: dataStk, arrFilter, totalQty, totalSum -->
    <table border="1" class="content-text head-table">
        <?php
        foreach ($dataStk as $no => $stk) {
            $n = $no + 1;
            echo '<tr>';
            echo '<td style="width:35px; vertical-align:top">' . $n . '</td>';
            echo '<td style="word-wrap:break-word; width:120px;vertical-align:top">' . $stk['corak'] . '</td>';
            echo '<td style="width:30px;vertical-align:top">' . $stk['lbr'] . '</td>';
            echo '<td style="width:30px;vertical-align:top">' . $stk['grd'] . '</td>';
            echo '<td style="width:80px;vertical-align:top">' . $stk['dc'] . '</td>';
            echo '<td style="width:30px;vertical-align:top">' . $stk['qtyPl'] . '</td>';
            echo '<td style="width:50px;vertical-align:top">' . $stk['sumPl'] . '</td>';
            echo '<td style="width:375px;vertical-align:top">';

            // tabel untuk tampung data piece length berdasarkan banyak baris
            echo '<table border="1" class="content-text head-table">';
            $jmlQty = count($stk['pl']);
            // $div = 10;
            // $sBagi = $jmlQty % $div;
            // $row = (($jmlQty - $sBagi) / $div) + 1;

            echo "<tr>";
            // for ($i = 0; $i < $jmlQty; $i++) {
            //     if ($i % 10 == 0 and $i != 0) {
            //         echo "<td>" . $i . "<td></tr><tr>";
            //     } else {
            //         echo "<td>" . $i . "<td>";
            //     }
            // }
            if ($jmlQty <= 10) {
                $sisaCol = 10 - $jmlQty;
                for ($less = 0; $less < $jmlQty; $less++) {
                    echo "<td style='width:35px'>" . $stk['pl'][$less];
                }
                for ($sisaLess = 0; $sisaLess < $sisaCol; $sisaLess++) {
                    echo "<td style='width:35px'>";
                }
            } else {
                foreach ($stk['pl'] as $key => $val) { {
                        if ($key % 10 == 0 and $key != 0) {
                            echo "</tr><tr><td style='width:40px'>" . $val;
                        } else {
                            echo "<td style='width:40px'>" . $val;
                        }
                    }
                }
            }
            echo '</tr>';
            echo '</table>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </br>
    </br>
    </br>
    <table border="0" class="footer-text">
        <tr>
            <td colspan="6">Sub Total :</td>
        </tr>
        <tr>
            <td style="width:60px"></td>
            <td colspan="2" class="tx-r">GRADE</td>
            <td style="width: 120px;" class="tx-r">PCS</td>
            <td style="width: 120px;" class="tx-r">QTY</td>
            <td style="padding-left: 5px;">SATUAN</td>
        </tr>
        <?php
        // var_dump($dataStk);
        $groupingStk = [];
        foreach ($dataStk as $noDs => $valDs) {
            // echo $valDs['grd'];
            // echo "<br>";
            // echo $valDs['qtyPl'];
            // echo "<br>";
            // echo $valDs['sumPl'];
            // echo "<br>";

            $grp = ['grd' => $valDs['grd'], 'qty' => $valDs['qtyPl'], 'sum' => $valDs['sumPl']];

            if (isset($groupingStk['grd'])) {
                if (!in_array($valDs['grd'], $groupingStk['grd'])) {
                    array_push($groupingStk, $grp);
                    // array_push($groupingStk,$valDs['grd']);
                    // array_push($groupingStk,$valDs['qtyPl']);
                    // array_push($groupingStk,$valDs['sumPl']);
                }
            }
            // else{
            //     $groupingStk['qty'] += $valDs['qtyPl'];                
            //     $groupingStk['sum'] += $valDs['sumPl'];                
            // }
        }
        foreach ($groupingStk as $noGr => $valGr) {
            var_dump($valGr);
            echo "<br>";
            echo "<br>";
        }

        // foreach ($dataStk as $ds) {
        //     if (isset($groupingStk[$ds['grd']])){
        //         $groupingStk[$ds['grd']] += ['qty'=>$ds['qtyPl']];
        //         $groupingStk[$ds['grd']] += ['sum'=>$ds['sumPl']];
        //     }
        //     else{
        //         $groupingStk[$ds['grd']] = ['qty'=>$ds['qtyPl']];
        //         $groupingStk[$ds['grd']] = ['sum'=>$ds['sumPl']];
        //     }
        // }


        ?>
        <!-- <tr>
            <td></td>
            <td colspan="2" class="tx-r">A2</td>
            <td class="tx-r">59.00</td>
            <td class="tx-r">1.475.00</td>
            <td style="padding-left: 5px;">YARD</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" class="tx-r">B</td>
            <td class="tx-r">19.00</td>
            <td class="tx-r">475.00</td>
            <td style="padding-left: 5px;">YARD</td>
        </tr> -->
        <tr>
            <td colspan="3" class="tx-r b">Grand Total:</td>
            <td class="tx-r brd-t b"><?= $totalQty ?></td>
            <td class="tx-r brd-t b"><?= $totalSum ?></td>
            <td style="padding-left: 5px;" class="brd-t b">YARD</td>
        </tr>
    </table>



</body>

</html>