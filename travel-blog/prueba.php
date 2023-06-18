<!DOCTYPE html>
<html>
<head>
    <title>Div Flotante</title>
    <style>
        /* Estilos para el fondo negro */
        #fondoNegro {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }

        /* Estilos para el div flotante */
        #divFlotante {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }
    </style>
</head>
<body>
    <button id="btnMostrar" onclick="mostrarDivFlotante()">Mostrar Div Flotante</button>
    <div id="fondoNegro" onclick="ocultarDivFlotante()"></div>
    <div id="divFlotante">
        <h2>Div Flotante</h2>
        <p>¡Hola! Soy un div flotante.</p>
        <button onclick="ocultarDivFlotante()">Cerrar</button>
    </div>

    <script>
        function mostrarDivFlotante() {
            var fondoNegro = document.getElementById('fondoNegro');
            var div = document.getElementById('divFlotante');
            var btnMostrar = document.getElementById('btnMostrar');
            fondoNegro.style.display = 'block';
            div.style.display = 'block';
            btnMostrar.style.display = 'none';
        }

        function ocultarDivFlotante() {
            var fondoNegro = document.getElementById('fondoNegro');
            var div = document.getElementById('divFlotante');
            var btnMostrar = document.getElementById('btnMostrar');
            fondoNegro.style.display = 'none';
            div.style.display = 'none';
            btnMostrar.style.display = 'block';
        }
    </script>
</body>
</html>
