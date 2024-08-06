<?php
include_once 'classes/personagem.php';
include_once 'classes/personagemCrud.php';
include_once 'classes/Conexao.php';

// function organizaCards()
// {
//     $counter = 0;
//     $personagemCrud = new PersonagemCrud();
//     $todosPersonagens = $personagemCrud->read();

//     echo '<ul class="ul1">';
//     foreach ($todosPersonagens as $key => $personagem) {

//         if ($counter > 0 && $counter % 4 == 0) {
//             echo '</ul><ul class="ul1">';
//         }

//         estruturaCard($personagem);

//         $counter++;
//     }

//     echo '</ul>';  
// }

// function estruturaCard(Personagem $personagem)
// {
//     echo '<div class="cards" style="margin-right: 15px; width: 23%">
//             <h2>' . htmlspecialchars($personagem->getNome()) . '</h2>
//             <div class="container">
//                 <a href="' . htmlspecialchars($personagem->getImagem()) . '">
//                     <button style="background-color: black; border: none;">
//                         <img src="' . htmlspecialchars($personagem->getImagem()) . '" alt="Avatar" class="" style="width: 100%; height: 100%; left: 50%; position: absolute; top: 50%; object-fit: cover; transform: translate(-50%, -50%);">
//                         <div class="overlay">
//                             <div class="text">Conhecer <br> Personagem</div>
//                         </div>
//                     </button>
//                 </a>
//             </div>';
//     if ($personagem->getCausaDaMorte() != null) {
//         echo '<p class="dead">Morto</p>';
//     } else {
//         echo '<p class="life">Vivo</p>';
//     }
//     echo '  <table>
//                 <tr valign="top">
//                     <th class="text-start fontCard">Nome</th>
//                     <td class="text-start fontCard">' . htmlspecialchars($personagem->getNome()) . '</td>
//                 </tr>
//                 <tr valign="top">
//                     <th class="text-start fontCard">Primeira aparição</th>
//                     <td class="text-start fontCard">' . htmlspecialchars($personagem->getPrimeiraAparicao()) . '</td>
//                 </tr>
//                 <tr valign="top">
//                     <th class="text-start fontCard">Maior feito</th>
//                     <td class="fontCard text-start">' . htmlspecialchars($personagem->getMaiorFeito()) . '</td>
//                 </tr>
//                 <tr valign="top">
//                     <th class="text-start fontCard">Quem é?</th>
//                     <td class="text-start fontCard">' . htmlspecialchars($personagem->getDescricao()) . '</td>
//                 </tr>';
//     if ($personagem->getCausaDaMorte() != null) {
//         echo '<tr valign="top">
//                 <th class="text-start fontCard">Causa da morte</th>
//                 <td class="text-start fontCard">' . htmlspecialchars($personagem->getCausaDaMorte()) . '</td>
//                 </tr>';
//     }
//     echo '      
//                 <button class="btn btn-secondary dropdown-toggle-split mt-1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
//                 <ul class="dropdown-menu">
//                     <li><a class="dropdown-item text-" href="#">Alterar</a></li>
//                     <li><a class="dropdown-item text-danger" href="exclusaoPersonagem.php?id='. $personagem->getId() . '">Excluir</a></li>
//                 </ul>
//     </table>
//                 </div>';
// }


// function consultaUpdate(int $id){
//     $sqlPersonagem = "SELECT * FROM cadastroPersonagem where id = $id";
//     // $result = Conexao::getConexao()->query($sqlPersonagem);
//     // $lista = $result->fetchAll(PDO::FETCH_ASSOC);

//     return $sqlPersonagem;
// } 