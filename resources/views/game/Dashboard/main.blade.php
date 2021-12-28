<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <!--<button id="start-game" class="start-game">Начать игру</button>-->
   <script type="text/javascript">
        let start = document.getElementById('start-game');
        start.onclick = function() { // перезапишет существующий обработчик
            console.log('Нажали');
            //let xhr = new XMLHttpRequest();
            //xhr.open('GET', '/api', false);
            //xhr.send();
          };

    </script>
</body>
</html>
