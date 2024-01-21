<?php require 'model/pdo.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<input type="submit" value="" id="myHeart" onclick="toggleHeartColor()">
<body>
 
</body>
<script>
                function toggleHeartColor() {
                    var heartButton = document.getElementById("heartButton");
                    heartButton.classList.toggle("red");
                }
            </script>
</html>