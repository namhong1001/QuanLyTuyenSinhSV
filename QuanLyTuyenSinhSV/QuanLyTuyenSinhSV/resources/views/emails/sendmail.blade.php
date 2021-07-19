<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông báo trúng tuyển Đại học Đà Lạt</title>
</head>
<body>
    <?php
        $mail = DB::table('mail')->find(1);
    ?>
    <p> <?php echo $mail->tbtt ?> </p>
</body>
</html>
