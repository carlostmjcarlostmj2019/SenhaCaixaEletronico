<?php
require("functions.php"):
// Defina a senha
$senha = "102030";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <title>Teclado Numérico</title>
    <style>
        body {
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Digite a sequência:</h1>
            <form method="post">
                <div class="form-group">
                    <input type="text" name="sequenciaDigitada" class="form-control" readonly>
					<br>
                </div>
                <div class="row">
                    <?php for ($i = 0; $i < 5; $i++) { ?>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-block mb-3" onclick="appendNumber('<?php echo $buttonValues[$i][0] . $buttonValues[$i][1]; ?>')">
                                <?php echo $buttonValues[$i][0] . " ou " . $buttonValues[$i][1]; ?>
                            </button>
                        </div>
                    <?php } ?>
                </div>
                <button type="button" class="btn btn-danger btn-block mb-3" onclick="clearInput()">C</button>
                <button type="submit" class="btn btn-success btn-block">Verificar</button>
            </form>
            <?php if (isset($message)) { ?>
                <div class="alert alert-<?php echo $alertType; ?>">
                    <?php echo $message; ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        let inputField = document.querySelector('input[name="sequenciaDigitada"]');
        let currentSequence = "";

        function appendNumber(number) {
            if (currentSequence.length < 12) {
                currentSequence += number;
                inputField.value = currentSequence;
            }
        }

        function clearInput() {
            currentSequence = "";
            inputField.value = '';
        }
    </script>
</body>
</html>
