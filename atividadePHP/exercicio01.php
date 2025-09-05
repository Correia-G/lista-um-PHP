<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios PHP</title>
</head>
<body>
    <h1>Exercícios PHP</h1>

    <!-- Exercício 1: Par ou Ímpar -->
    <h2>1. Verificar se o número é par ou ímpar</h2>
    <form method="POST" action="">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_par_impar">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_par_impar'])) {
            $numero = filter_var($_POST['numero'], FILTER_VALIDATE_INT);
            if ($numero === false) {
                echo "Número inválido!";
            } else {
                if ($numero % 2 == 0) {
                    echo "O número $numero é <strong>par</strong>.";
                } else {
                    echo "O número $numero é <strong>ímpar</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 2: Calcular a tabuada -->
    <h2>2. Calcular a tabuada de um número</h2>
    <form method="POST" action="">
        <label for="tabuada_numero">Digite um número:</label>
        <input type="number" id="tabuada_numero" name="tabuada_numero" required>
        <button type="submit" name="calcular_tabuada">Calcular Tabuada</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['calcular_tabuada'])) {
            $numero = filter_var($_POST['tabuada_numero'], FILTER_VALIDATE_INT);
            if ($numero === false) {
                echo "Número inválido!";
            } else {
                echo "Tabuada do $numero:<br>";
                for ($i = 1; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "$numero x $i = $resultado<br>";
                }
            }
        }
    }
    ?>

    <!-- Exercício 3: Positivo, negativo ou zero -->
    <h2>3. Informar se um número é positivo, negativo ou zero</h2>
    <form method="POST" action="">
        <label for="sinal_numero">Digite um número:</label>
        <input type="number" id="sinal_numero" name="sinal_numero" required>
        <button type="submit" name="verificar_sinal">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_sinal'])) {
            $numero = filter_var($_POST['sinal_numero'], FILTER_VALIDATE_FLOAT);
            if ($numero === false) {
                echo "Número inválido!";
            } else {
                if ($numero > 0) {
                    echo "O número $numero é <strong>positivo</strong>.";
                } elseif ($numero < 0) {
                    echo "O número $numero é <strong>negativo</strong>.";
                } else {
                    echo "O número é <strong>zero</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 4: Calcular fatorial -->
    <h2>4. Calcular o fatorial de um número</h2>
    <form method="POST" action="">
        <label for="fatorial_numero">Digite um número:</label>
        <input type="number" id="fatorial_numero" name="fatorial_numero" min="0" required>
        <button type="submit" name="calcular_fatorial">Calcular Fatorial</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['calcular_fatorial'])) {
            $numero = filter_var($_POST['fatorial_numero'], FILTER_VALIDATE_INT);
            if ($numero === false || $numero < 0) {
                echo "Número inválido! Digite um número inteiro não negativo.";
            } else {
                $fatorial = 1;
                for ($i = 1; $i <= $numero; $i++) {
                    $fatorial *= $i;
                }
                echo "O fatorial de $numero é $fatorial.";
            }
        }
    }
    ?>

    <!-- Exercício 5: Números amigos -->
    <h2>5. Verificar se dois números formam um número amigo</h2>
    <form method="POST" action="">
        <label for="amigo_num1">Primeiro número:</label>
        <input type="number" id="amigo_num1" name="amigo_num1" required>
        <br>
        <label for="amigo_num2">Segundo número:</label>
        <input type="number" id="amigo_num2" name="amigo_num2" required>
        <button type="submit" name="verificar_amigos">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_amigos'])) {
            $num1 = filter_var($_POST['amigo_num1'], FILTER_VALIDATE_INT);
            $num2 = filter_var($_POST['amigo_num2'], FILTER_VALIDATE_INT);
            
            if ($num1 === false || $num2 === false || $num1 <= 0 || $num2 <= 0) {
                echo "Números inválidos! Digite números inteiros positivos.";
            } else {
                // Função para calcular a soma dos divisores próprios
                function somaDivisores($n) {
                    $soma = 0;
                    for ($i = 1; $i <= $n/2; $i++) {
                        if ($n % $i == 0) {
                            $soma += $i;
                        }
                    }
                    return $soma;
                }
                
                $soma1 = somaDivisores($num1);
                $soma2 = somaDivisores($num2);
                
                if ($soma1 == $num2 && $soma2 == $num1) {
                    echo "Os números $num1 e $num2 são <strong>números amigos</strong>.";
                } else {
                    echo "Os números $num1 e $num2 <strong>não são amigos</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 6: Divisores de um número -->
    <h2>6. Exibir todos os divisores de um número</h2>
    <form method="POST" action="">
        <label for="divisor_numero">Digite um número:</label>
        <input type="number" id="divisor_numero" name="divisor_numero" required>
        <button type="submit" name="exibir_divisores">Exibir Divisores</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['exibir_divisores'])) {
            $numero = filter_var($_POST['divisor_numero'], FILTER_VALIDATE_INT);
            if ($numero === false || $numero <= 0) {
                echo "Número inválido! Digite um número inteiro positivo.";
            } else {
                $divisores = array();
                for ($i = 1; $i <= $numero; $i++) {
                    if ($numero % $i == 0) {
                        $divisores[] = $i;
                    }
                }
                echo "Divisores de $numero: " . implode(", ", $divisores);
            }
        }
    }
    ?>

    <!-- Exercício 7: Número perfeito -->
    <h2>7. Verificar se o número é perfeito</h2>
    <form method="POST" action="">
        <label for="perfeito_numero">Digite um número:</label>
        <input type="number" id="perfeito_numero" name="perfeito_numero" required>
        <button type="submit" name="verificar_perfeito">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_perfeito'])) {
            $numero = filter_var($_POST['perfeito_numero'], FILTER_VALIDATE_INT);
            if ($numero === false || $numero <= 0) {
                echo "Número inválido! Digite um número inteiro positivo.";
            } else {
                $somaDivisores = 0;
                for ($i = 1; $i <= $numero/2; $i++) {
                    if ($numero % $i == 0) {
                        $somaDivisores += $i;
                    }
                }
                
                if ($somaDivisores == $numero) {
                    echo "O número $numero é <strong>perfeito</strong>.";
                } else {
                    echo "O número $numero <strong>não é perfeito</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 8: Contar números pares -->
    <h2>8. Contar quantos números pares existem entre 1 e o número informado</h2>
    <form method="POST" action="">
        <label for="contar_pares_numero">Digite um número:</label>
        <input type="number" id="contar_pares_numero" name="contar_pares_numero" required>
        <button type="submit" name="contar_pares">Contar Pares</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['contar_pares'])) {
            $numero = filter_var($_POST['contar_pares_numero'], FILTER_VALIDATE_INT);
            if ($numero === false || $numero <= 0) {
                echo "Número inválido! Digite um número inteiro positivo.";
            } else {
                $contador = 0;
                for ($i = 1; $i <= $numero; $i++) {
                    if ($i % 2 == 0) {
                        $contador++;
                    }
                }
                echo "Existem $contador números pares entre 1 e $numero.";
            }
        }
    }
    ?>

    <!-- Exercício 9: Soma dos números entre dois valores -->
    <h2>9. Receber dois números e exibir a soma de todos os números entre eles</h2>
    <form method="POST" action="">
        <label for="soma_intervalo_num1">Primeiro número:</label>
        <input type="number" id="soma_intervalo_num1" name="soma_intervalo_num1" required>
        <br>
        <label for="soma_intervalo_num2">Segundo número:</label>
        <input type="number" id="soma_intervalo_num2" name="soma_intervalo_num2" required>
        <button type="submit" name="somar_intervalo">Somar Intervalo</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['somar_intervalo'])) {
            $num1 = filter_var($_POST['soma_intervalo_num1'], FILTER_VALIDATE_INT);
            $num2 = filter_var($_POST['soma_intervalo_num2'], FILTER_VALIDATE_INT);
            
            if ($num1 === false || $num2 === false) {
                echo "Números inválidos! Digite números inteiros.";
            } else {
                // Garantir que num1 seja o menor
                if ($num1 > $num2) {
                    $temp = $num1;
                    $num1 = $num2;
                    $num2 = $temp;
                }
                
                $soma = 0;
                for ($i = $num1 + 1; $i < $num2; $i++) {
                    $soma += $i;
                }
                
                echo "A soma dos números entre $num1 e $num2 é $soma.";
            }
        }
    }
    ?>

    <!-- Exercício 10: Sequência de Fibonacci -->
    <h2>10. Receber um número e exibir a sequência de Fibonacci até esse número</h2>
    <form method="POST" action="">
        <label for="fibonacci_limite">Digite o limite:</label>
        <input type="number" id="fibonacci_limite" name="fibonacci_limite" min="1" required>
        <button type="submit" name="gerar_fibonacci">Gerar Fibonacci</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['gerar_fibonacci'])) {
            $limite = filter_var($_POST['fibonacci_limite'], FILTER_VALIDATE_INT);
            if ($limite === false || $limite <= 0) {
                echo "Número inválido! Digite um número inteiro positivo.";
            } else {
                $a = 0;
                $b = 1;
                $sequencia = "0, 1";
                
                while ($a + $b <= $limite) {
                    $c = $a + $b;
                    $sequencia .= ", $c";
                    $a = $b;
                    $b = $c;
                }
                
                echo "Sequência de Fibonacci até $limite: $sequencia";
            }
        }
    }
    ?>

    <!-- Exercício 11: Palíndromo -->
    <h2>11. Verificar se uma palavra é um palíndromo</h2>
    <form method="POST" action="">
        <label for="palindromo_palavra">Digite uma palavra:</label>
        <input type="text" id="palindromo_palavra" name="palindromo_palavra" required>
        <button type="submit" name="verificar_palindromo">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_palindromo'])) {
            $palavra = $_POST['palindromo_palavra'];
            if (empty(trim($palavra))) {
                echo "Por favor, digite uma palavra.";
            } else {
                $palavraInvertida = strrev($palavra);
                
                if (strtolower($palavra) == strtolower($palavraInvertida)) {
                    echo "A palavra '$palavra' é um <strong>palíndromo</strong>.";
                } else {
                    echo "A palavra '$palavra' <strong>não é um palíndromo</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 12: Contar vogais -->
    <h2>12. Receber uma string e exibir a quantidade de vogais</h2>
    <form method="POST" action="">
        <label for="vogais_texto">Digite um texto:</label>
        <input type="text" id="vogais_texto" name="vogais_texto" required>
        <button type="submit" name="contar_vogais">Contar Vogais</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['contar_vogais'])) {
            $texto = $_POST['vogais_texto'];
            if (empty(trim($texto))) {
                echo "Por favor, digite um texto.";
            } else {
                $vogais = array('a', 'e', 'i', 'o', 'u');
                $contador = 0;
                
                for ($i = 0; $i < strlen($texto); $i++) {
                    $caractere = strtolower($texto[$i]);
                    if (in_array($caractere, $vogais)) {
                        $contador++;
                    }
                }
                
                echo "O texto '$texto' possui $contador vogais.";
            }
        }
    }
    ?>

    <!-- Exercício 13: Converter Celsius para Fahrenheit -->
    <h2>13. Converter graus Celsius para Fahrenheit</h2>
    <form method="POST" action="">
        <label for="celsius_temp">Temperatura em Celsius:</label>
        <input type="number" id="celsius_temp" name="celsius_temp" step="0.1" required>
        <button type="submit" name="converter_temperatura">Converter</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['converter_temperatura'])) {
            $celsius = filter_var($_POST['celsius_temp'], FILTER_VALIDATE_FLOAT);
            if ($celsius === false) {
                echo "Temperatura inválida!";
            } else {
                $fahrenheit = ($celsius * 9/5) + 32;
                echo "$celsius °C = $fahrenheit °F";
            }
        }
    }
    ?>

    <!-- Exercício 14: Ano bissexto -->
    <h2>14. Verificar se um ano é bissexto</h2>
    <form method="POST" action="">
        <label for="bissexto_ano">Digite um ano:</label>
        <input type="number" id="bissexto_ano" name="bissexto_ano" min="0" required>
        <button type="submit" name="verificar_bissexto">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_bissexto'])) {
            $ano = filter_var($_POST['bissexto_ano'], FILTER_VALIDATE_INT);
            if ($ano === false || $ano < 0) {
                echo "Ano inválido!";
            } else {
                $bissexto = false;
                
                if ($ano % 4 == 0) {
                    if ($ano % 100 == 0) {
                        if ($ano % 400 == 0) {
                            $bissexto = true;
                        }
                    } else {
                        $bissexto = true;
                    }
                }
                
                if ($bissexto) {
                    echo "O ano $ano é <strong>bissexto</strong>.";
                } else {
                    echo "O ano $ano <strong>não é bissexto</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 15: Calcular IMC -->
    <h2>15. Calcular IMC a partir do peso e altura e exibir a categoria</h2>
    <form method="POST" action="">
        <label for="imc_peso">Peso (kg):</label>
        <input type="number" id="imc_peso" name="imc_peso" step="0.1" min="0" required>
        <br>
        <label for="imc_altura">Altura (m):</label>
        <input type="number" id="imc_altura" name="imc_altura" step="0.01" min="0" required>
        <button type="submit" name="calcular_imc">Calcular IMC</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['calcular_imc'])) {
            $peso = filter_var($_POST['imc_peso'], FILTER_VALIDATE_FLOAT);
            $altura = filter_var($_POST['imc_altura'], FILTER_VALIDATE_FLOAT);
            
            if ($peso === false || $altura === false || $peso <= 0 || $altura <= 0) {
                echo "Valores inválidos!";
            } else {
                $imc = $peso / ($altura * $altura);
                
                $categoria = "";
                if ($imc < 18.5) {
                    $categoria = "Abaixo do peso";
                } elseif ($imc < 25) {
                    $categoria = "Peso normal";
                } elseif ($imc < 30) {
                    $categoria = "Sobrepeso";
                } elseif ($imc < 35) {
                    $categoria = "Obesidade grau I";
                } elseif ($imc < 40) {
                    $categoria = "Obesidade grau II";
                } else {
                    $categoria = "Obesidade grau III";
                }
                
                echo "Seu IMC é " . number_format($imc, 2) . " - $categoria";
            }
        }
    }
    ?>

    <!-- Exercício 16: Verificar se pode votar -->
    <h2>16. Receber nome e idade e informar se a pessoa pode votar</h2>
    <form method="POST" action="">
        <label for="votar_nome">Nome:</label>
        <input type="text" id="votar_nome" name="votar_nome" required>
        <br>
        <label for="votar_idade">Idade:</label>
        <input type="number" id="votar_idade" name="votar_idade" min="0" required>
        <button type="submit" name="verificar_voto">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verificar_voto'])) {
            $nome = $_POST['votar_nome'];
            $idade = filter_var($_POST['votar_idade'], FILTER_VALIDATE_INT);
            
            if (empty(trim($nome)) || $idade === false || $idade < 0) {
                echo "Dados inválidos!";
            } else {
                if ($idade < 16) {
                    echo "$nome, com $idade anos, <strong>não pode votar</strong>.";
                } elseif ($idade < 18 || $idade >= 70) {
                    echo "$nome, com $idade anos, <strong>pode votar</strong> (voto facultativo).";
                } else {
                    echo "$nome, com $idade anos, <strong>deve votar</strong> (voto obrigatório).";
                }
            }
        }
    }
    ?>

    <!-- Exercício 17: Validar data -->
    <h2>17. Receber uma data (dia, mês, ano) e validar se é uma data válida</h2>
    <form method="POST" action="">
        <label for="data_dia">Dia:</label>
        <input type="number" id="data_dia" name="data_dia" min="1" max="31" required>
        <br>
        <label for="data_mes">Mês:</label>
        <input type="number" id="data_mes" name="data_mes" min="1" max="12" required>
        <br>
        <label for="data_ano">Ano:</label>
        <input type="number" id="data_ano" name="data_ano" min="0" required>
        <button type="submit" name="validar_data">Validar Data</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['validar_data'])) {
            $dia = filter_var($_POST['data_dia'], FILTER_VALIDATE_INT);
            $mes = filter_var($_POST['data_mes'], FILTER_VALIDATE_INT);
            $ano = filter_var($_POST['data_ano'], FILTER_VALIDATE_INT);
            
            if ($dia === false || $mes === false || $ano === false) {
                echo "Valores inválidos!";
            } else {
                if (checkdate($mes, $dia, $ano)) {
                    echo "A data $dia/$mes/$ano é <strong>válida</strong>.";
                } else {
                    echo "A data $dia/$mes/$ano é <strong>inválida</strong>.";
                }
            }
        }
    }
    ?>

    <!-- Exercício 18: Maior de três números -->
    <h2>18. Receber 3 números e informar qual é o maior</h2>
    <form method="POST" action="">
        <label for="maior_num1">Primeiro número:</label>
        <input type="number" id="maior_num1" name="maior_num1" required>
        <br>
        <label for="maior_num2">Segundo número:</label>
        <input type="number" id="maior_num2" name="maior_num2" required>
        <br>
        <label for="maior_num3">Terceiro número:</label>
        <input type="number" id="maior_num3" name="maior_num3" required>
        <button type="submit" name="encontrar_maior">Encontrar Maior</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['encontrar_maior'])) {
            $num1 = filter_var($_POST['maior_num1'], FILTER_VALIDATE_FLOAT);
            $num2 = filter_var($_POST['maior_num2'], FILTER_VALIDATE_FLOAT);
            $num3 = filter_var($_POST['maior_num3'], FILTER_VALIDATE_FLOAT);
            
            if ($num1 === false || $num2 === false || $num3 === false) {
                echo "Números inválidos!";
            } else {
                $maior = $num1;
                
                if ($num2 > $maior) {
                    $maior = $num2;
                }
                
                if ($num3 > $maior) {
                    $maior = $num3;
                }
                
                echo "O maior número é $maior.";
            }
        }
    }
    ?>

</body>
</html>