<?php
include_once 'classes/personagem.class.php';
function insertDB(Personagem $personagem)
{
    $nome = $personagem->getNome();
    $aparicao = $personagem->getPrimeiraAparicao();
    $maiorFeito = $personagem->getMaiorFeito();
    $descricao = $personagem->getDescricao();
    $estadoVM = $personagem->getEstadoVM();
    $causaDaMorte = $personagem->getCausaDaMorte();
    $imagem = $personagem->getImagem();

    $sql = "INSERT INTO cadastroPersonagem (name, apparition, greatFeat, description, alive, causeOfDead, image)
                VALUES ('$nome', '$aparicao', '$maiorFeito', '$descricao', '$estadoVM', '$causaDaMorte', '$imagem')";

    if (connect($sql) == true) {
        echo "Cadastro $nome efetuado com sucesso!";
    }else {
        echo "Tentativa de cadastro deu erro.";
    }
}

function organizaCards()
{
    $minId = selectMaxMin('min');
    $maxId = selectMaxMin('max');

    $counter = 0;

    echo '<ul>';
    for ($id = $minId; $id <= $maxId; $id++) {

        $confereQuery = "SELECT id FROM db_SystemCharacters.cadastroPersonagem WHERE id = $id";
        $confereResult = connect($confereQuery);

        if ($confereResult->num_rows > 0) {

            $name = queryInfo('name', $id);
            $apparition = queryInfo('apparition', $id);
            $greatFeat = queryInfo('greatFeat', $id);
            $description = queryInfo('description', $id);
            $alive = queryInfo('alive', $id);
            $causeOfDead = queryInfo('causeOfDead', $id);
            $image = queryInfo('image', $id);

            if ($counter > 0 && $counter % 4 == 0) {
                echo '</ul><ul>';
            }

            estruturaCard($name, $apparition, $greatFeat, $description, $alive, $causeOfDead, $image);

            $counter++;
        }
    }
    echo '</ul>';
}
function selectMaxMin(string $maxMin)
{
    $maxMinIdQuery = "SELECT $maxMin(id) as $maxMin FROM db_SystemCharacters.cadastroPersonagem";
    $maxMinIdResult = connect($maxMinIdQuery);
    $maxMinIdRow = mysqli_fetch_assoc($maxMinIdResult);
    $maxMinId = $maxMinIdRow[$maxMin];

    return $maxMinId;
}
function queryInfo(string $column, int $id)
{
    $query = "SELECT $column FROM db_SystemCharacters.cadastroPersonagem WHERE id = $id";
    $result = connect($query);
    $row = $result->fetch_assoc();
    $column = $row[$column];

    return $column;
}
function estruturaCard($name, $apparition, $greatFeat, $description, $alive, $causeOfDead, $image)
{
    echo '<div class="cards" style="margin-right: 15px; width: 23%">
            <h2>' . htmlspecialchars($name) . '</h2>
            <div class="container">
                <a href="' . htmlspecialchars($image) . '">
                    <button style="background-color: black; border: none;">
                        <img src="' . htmlspecialchars($image) . '" alt="Avatar" class="" style="width: 100%; height: 100%; left: 50%; position: absolute; top: 50%; object-fit: cover; transform: translate(-50%, -50%);">
                        <div class="overlay">
                            <div class="text">Conhecer <br> Personagem</div>
                        </div>
                    </button>
                </a>
            </div>';
    if ($causeOfDead != null) {
        echo '<p class="dead">Morto</p>';
    } else {
        echo '<p class="life">Vivo</p>';
    }
    echo '  <table>
                <tr valign="top">
                    <th class="text-start fontCard">Nome</th>
                    <td class="text-start fontCard">' . htmlspecialchars($name) . '</td>
                </tr>
                <tr valign="top">
                    <th class="text-start fontCard">Primeira aparição</th>
                    <td class="text-start fontCard">' . htmlspecialchars($apparition) . '</td>
                </tr>
                <tr valign="top">
                    <th class="text-start fontCard">Maior feito</th>
                    <td class="fontCard text-start">' . htmlspecialchars($greatFeat) . '</td>
                </tr>
                <tr valign="top">
                    <th class="text-start fontCard">Quem é?</th>
                    <td class="text-start fontCard">' . htmlspecialchars($description) . '</td>
                </tr>';
    if ($causeOfDead != null) {
        echo '<tr valign="top">
                <th class="text-start fontCard">Causa da morte</th>
                <td class="text-start fontCard">' . htmlspecialchars($causeOfDead) . '</td>
                </tr>';
    }
    echo '  </table>
                </div>';
}
function changeBoolForLiveOrDead($bool)
{
    if ($bool == 1) {
        return 'Vivo';
    } else {
        return 'Morto';
    }
}
?>