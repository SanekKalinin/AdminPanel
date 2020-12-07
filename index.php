<!DOCTYPE html>
<html>
<head>
             <title>Админка</title>
             <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class='wrapper'>
                <main class='main' id='main'>
                                <?echo $echo;?>
                </main>
    </div>
    <div class='table'>
        <div class='table-wrapper'>
            <div class='table-title'>Статистика</div>
                <div class='table-content'>
                    <img src='stats.php' class='statistics-img'> <br>
                    Красный: просмотры <br>
                    Синий: комментарии <br>
                    1 шаг — 1 день
                </div>
            </div>
        </div>
    </div>
</body>
</html>