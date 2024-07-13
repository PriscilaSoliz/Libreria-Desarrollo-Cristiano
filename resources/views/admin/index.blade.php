@extends('adminlte::page')
@section('title', 'Bienvenidad')
@section('content_header')
    <h1 class="text-2xl font-bold text-center">Bienvenido a Recomendacion de Docentes</h1>
    <p class="text-center">#EstamosParaRecomendarte</p>
@stop

@section('content')
<div class="flex flex-col lg:flex-row items-center justify-center h-screen">
    <div class="lg:w-1/2">
        <div class="flex flex-col items-center justify-center">
            <h2 class="text-4xl font-bold mt-1 mb-2 text-white">¡Buscarayos!</h2>
            <p class="mb-2 text-white">Encuentra el Rayo: ⚡</p>
            <!-- Representación visual del tablero -->
            <div id="board" class="grid"
                style="grid-template-columns: repeat(4, minmax(0, 1fr)); grid-template-rows: repeat(4, minmax(0, 1fr)); gap: 1rem;">
                <!-- Se pueden agregar más celdas según sea necesario -->
                <!-- Ahora organizadas en una matriz de 4x4 -->
                @for ($row = 0; $row < 4; $row++)
                    @for ($col = 0; $col < 4; $col++)
                        <div onclick="revealCell(this)"
                            class="h-12 w-12 border border-gray-300 flex items-center justify-center cursor-pointer text-white">
                            <!-- Contenido de la celda -->
                        </div>
                    @endfor
                @endfor
            </div>

            <p id="result" class="mt-4 text-red font-bold text-white"></p>

            <button onclick="resetGame()" class="mt-4 p-2 bg-red-500 text-white rounded">Volver a Jugar (Buscarayos)</button>
        </div>
    </div>

    <script>
        let rows = 4;
        let cols = 4;
        let minePosition = Math.floor(Math.random() * (rows * cols)); // Posición aleatoria de la mina
        let attempts = 0;
        let gameOver = false;

        function revealCell(cell) {
            if (gameOver) return;

            const cellIndex = Array.from(cell.parentNode.children).indexOf(cell);

            if (cellIndex === minePosition) {
                gameOver = true;
                cell.innerHTML = '⚡'; // Símbolo para representar la mina
                document.getElementById('result').innerHTML = '¡Ganaste! Has encontrado el rayo ⚡.';
            } else {
                attempts++;
                cell.innerHTML = '✘'; // Otra representación visual, puedes personalizar esto
                document.getElementById('result').innerHTML = `Intentos: ${attempts}`;
            }
        }

        function resetGame() {
            gameOver = false;
            attempts = 0;
            minePosition = Math.floor(Math.random() * (rows * cols));

            // Reiniciar el contenido de las celdas
            const cells = document.querySelectorAll('#board div');
            cells.forEach(cell => {
                cell.innerHTML = '';
            });

            // Mensaje en el reinicio
            document.getElementById('result').innerHTML = '¡Vuelve a intentarlo!';
        }
    </script>



    <!-- Contenido del juego de 3 en línea -->
    <div class="lg:w-1/2 mt-4 lg:mt-0">
        <div class="flex flex-col items-center justify-center">
            <div class="text-4xl font-bold mt-4 mb-2 text-white">¡3 en línea!</div>

        <!-- Representación visual del tablero -->
        <div id="ticTacToeBoard" class="grid"
            style="grid-template-columns: repeat(3, minmax(0, 1fr)); grid-template-rows: repeat(3, minmax(0, 1fr)); gap: 1rem;">
            <!-- Se pueden agregar más celdas según sea necesario -->
            <!-- Ahora organizadas en una matriz de 3x3 -->
            @for ($row = 0; $row < 3; $row++)
                @for ($col = 0; $col < 3; $col++)
                    <div onclick="makeMove(this)"
                        class="h-12 w-12 border border-gray-300 flex items-center justify-center cursor-pointer text-white">
                        <!-- Contenido de la celda -->
                    </div>
                @endfor
            @endfor
        </div>

        <p id="ticTacToeResult" class="mt-4 text-red font-bold text-white"></p>

        <button onclick="resetTicTacToe()" class="mt-2 mb-4 p-2 bg-red-500 text-white rounded">Volver a Jugar (3 en
            línea)</button>
    </div>

    <script>
        let currentPlayer = 'X';
        let board = ['', '', '', '', '', '', '', '', ''];
        let gameActive = true;

        function makeMove(cell) {
            if (!gameActive) return;

            const cellIndex = Array.from(cell.parentNode.children).indexOf(cell);

            if (board[cellIndex] === '' && gameActive) {
                board[cellIndex] = currentPlayer;
                cell.innerHTML = currentPlayer;

                if (checkWinner()) {
                    document.getElementById('ticTacToeResult').innerHTML = `¡Ganó el jugador ${currentPlayer}!`;
                    gameActive = false;
                } else if (board.every(cell => cell !== '')) {
                    document.getElementById('ticTacToeResult').innerHTML = '¡Empate!';
                    gameActive = false;
                } else {
                    currentPlayer = currentPlayer === 'X' ? '⚡' : 'X';
                }
            }
        }

        function checkWinner() {
            const winningCombinations = [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8], // Filas
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8], // Columnas
                [0, 4, 8],
                [2, 4, 6] // Diagonales
            ];

            return winningCombinations.some(combination => {
                const [a, b, c] = combination;
                return board[a] && board[a] === board[b] && board[a] === board[c];
            });
        }

        function resetTicTacToe() {
            currentPlayer = 'X';
            board = ['', '', '', '', '', '', '', '', ''];
            gameActive = true;

            // Reiniciar el contenido de las celdas
            const cells = document.querySelectorAll('#ticTacToeBoard div');
            cells.forEach(cell => {
                cell.innerHTML = '';
            });

            // Mensaje en el reinicio
            document.getElementById('ticTacToeResult').innerHTML = '';
        }
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
