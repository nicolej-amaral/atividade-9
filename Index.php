<?php

include "infra/conexao.php";

$sql_clientes = "SELECT * FROM clientes ORDER BY nome";
$clientes = mysqli_query($conexao, $sql_clientes);

$sql_animais = "SELECT * FROM animais ORDER BY nome";
$animais = mysqli_query($conexao, $sql_animais);

$resultadoPesquisa = null;

if (isset($_GET["pesquisa"]) && $_GET["pesquisa"] != "") {

    $pesquisa = $_GET["pesquisa"];

    $sql = "SELECT clientes.nome AS cliente,
                   animais.id,
                   animais.nome AS animal,
                   animais.descricao,
                   animais.preco
            FROM clientes
            INNER JOIN animais
            ON clientes.id = animais.clientes_id
            WHERE clientes.nome LIKE '%$pesquisa%'";

    $resultadoPesquisa = mysqli_query($conexao, $sql);
}


$sqlAnimais = "SELECT * FROM animais";

$animais = mysqli_query($conexao, $sqlAnimais);

?>

<!DOCTYPE html>

<html class="html1" lang="pt-br">
<body>
<div class="container1">
<h2>Cadastrar clientes</h2>
<link rel="stylesheet" href="public/style.css">
<form action="public/clientes/cadastro.php" method="POST">

    <label>Nome:</label>

    <input
        type="text"
        name="nome"
        required
    >

    <br><br>

    <label>Email:</label>

    <input
        type="email"
        name="email"
        required
    >

    <br><br>

     <label>Telefone:</label>

    <input
        type="text"
        name="numero"
        required
    >

    <br><br>

    <button div= "botao" type="submit">
        Cadastrar cliente
    </button>

</form>
</div>



<hr>


<div class="container2">
<h2>Cadastrar animal</h2>

<form action="public/animais/cadastro.php" method="POST">

    <label>Nome do animal:</label>

    <input
        type="text"
        name="titulo"
        required
    >

    <br><br>


    <label>Descrição:</label>

    <input
        type="text"
        name="autor"
        required
    >

    <br><br>



    <label>Cliente:</label>

    <select name="clientes_id" required>

        <option value="">
            Selecione o cliente
        </option>

        <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>

            <option value="<?php echo $cliente["id"]; ?>">

                <?php echo $cliente["nome"]; ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    <button div= "botao" type="submit">
        Cadastrar animal
    </button>

</form>
</div>




<hr>


<div class="container3">
<h2>Pesquisar animais por cliente</h2>

<form method="GET">

    <input
        type="text"
        name="pesquisa"
        placeholder="Digite o nome do cliente"
        required
    >

    <button div= "botao" type="submit">
        Pesquisar
    </button>

</form>


<?php if ($resultadoPesquisa != null) { ?>

    <h2>Animais encontrados</h2>

    <table border="1" cellpadding="10">

        <tr>

            <th>Cliente</th>
            <th>Animal</th>
            <th>Descrição</th>

        </tr>


        <?php while ($animais = mysqli_fetch_assoc($resultadoPesquisa)) { ?>

            <tr>

                <td>
                    <?php echo $animais["cliente"]; ?>
                </td>

                <td>
                    <?php echo $animais["animal"]; ?>
                </td>

                <td>
                    <?php echo $animais["descricao"]; ?>
                </td>

        
                <td>

                    <a href="public/editar.php?id=<?php echo $animais["id"]; ?>">
                        Editar
                    </a>

                    |

                    <a
                        href="public/excluir.php?id=<?php echo $animais["id"]; ?>"
                        onclick="return confirm('Deseja excluir este animal do sistema?')"
                    >
                        Excluir
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

<?php } ?>
</div>

<hr>
<div class="container4">
<h2 class="titulo">Todos os animais</h2>
</div>
<div class="container5">

<table class="table" border="1" cellpadding="10">

    <tr>

        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
  

    </tr>


    <?php while ($animais = mysqli_fetch_assoc($animais)) { ?>

        <tr>

            <td>
                <?php echo $animais["id"]; ?>
            </td>

            <td>
                <?php echo $animais["nome"]; ?>
            </td>

            <td>
                <?php echo $animais["descricao"]; ?>
            </td>

           

            <td>

                <a href="public/editar.php?id=<?php echo $animais["id"]; ?>">
                    Editar
                </a>

                |

                <a
                    href="public/excluir.php?id=<?php echo $animais["id"]; ?>"
                    onclick="return confirm('Deseja excluir este animal do sistema?')"
                >
                    Excluir
                </a>

            </td>

        </tr>

    <?php } ?>

</table>
</div>

</body>

</html>