<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>


    <table>
        <!-- 一層包tr -->
        <?php for ($i = 0; $i < 16; $i++) { ?>
            <tr>
                <!-- 一層包td -->
                <?php for ($j = 1; $j < 16; $j++) { ?>
                    <td style="background-color:#<?php printf("%X%X00%X%X", $j, $j, $i, $i) ?>"></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>

</html>