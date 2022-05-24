<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    for ($i = 0; $i < 10; $i++) {
        echo "<div>$i</div>";   //雙引號才可以塞變數
    }
    ?>

    <table border="1">
        <!-- 因為這是在php裡面鑲html↓ 等於下面猜成三段  -->
        <?php for ($i = 1; $i < 10; $i++) : ?>
            <tr>
                <td><?= $i ?></td>
            </tr>
        <?php endfor ?>


        <?php for ($i = 1; $i < 10; $i++) { ?>
            <tr>
                <?php for ($j = 1; $j < 10; $j++) { ?>
                    <td><?= $i * $j ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>

</html>