<?php
include_once 'Conexao.php';
include_once 'personagem.php';


class PersonagemCrud
{
    public function create(Personagem $personagem) {

        try {
            $sql = "INSERT INTO cadastroPersonagem (name, apparition, greatFeat, description, alive, causeOfDead, image)
                     VALUES (:nome, :aparicao, :maiorFeito, :descricao, :estadoVM, :causaDaMorte, :imagem)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $personagem->getNome());
            $p_sql->bindValue(":aparicao", $personagem->getPrimeiraAparicao());
            $p_sql->bindValue(":maiorFeito", $personagem->getMaiorFeito());
            $p_sql->bindValue(":descricao", $personagem->getDescricao());
            $p_sql->bindValue(":estadoVM", $personagem->getEstadoVM());
            $p_sql->bindValue(":causaDaMorte", $personagem->getCausaDaMorte());
            $p_sql->bindValue(":imagem", $personagem->getImagem());

            return $p_sql->execute();

        } catch (Exception $exception) {
            print "Erro ao inserir personagem: <br>{$exception}<br>";
        }
    }

    public function read() {

            $sql = "SELECT * FROM cadastroPersonagem ORDER BY name ASC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = [];
    
            foreach ($lista as $dado) {
                $f_lista[] = $this->listaPersonagens($dado);
            }
            return $f_lista;
    
    }

    public function update(Personagem $personagem) {

        try {
            $sql = "UPDATE cadastroPersonagem SET
                    name = :name,
                    apparition = :apparition,
                    greatFeat = :greatFeat,
                    description = :description,
                    alive = :alive,
                    causeOfDead = :causeOfDead,
                    image = :image
                    WHERE id = :id";
    
            $p_sql = Conexao::getConexao()->prepare($sql);

            var_dump([
                'id' => $personagem->getId(),
                'name' => $personagem->getNome(),
                'apparition' => $personagem->getPrimeiraAparicao(),
                'greatFeat' => $personagem->getMaiorFeito(),
                'description' => $personagem->getDescricao(),
                'alive' => $personagem->getEstadoVM(),
                'causeOfDead' => $personagem->getCausaDaMorte(),
                'image' => $personagem->getImagem()
            ]);

            $p_sql->bindValue(":id", $personagem->getId());
            $p_sql->bindValue(":name", $personagem->getNome());
            $p_sql->bindValue(":apparition", $personagem->getPrimeiraAparicao());
            $p_sql->bindValue(":greatFeat", $personagem->getMaiorFeito());
            $p_sql->bindValue(":description", $personagem->getDescricao());
            $p_sql->bindValue(":alive", $personagem->getEstadoVM(), PDO::PARAM_INT);
            $p_sql->bindValue(":causeOfDead", $personagem->getCausaDaMorte());
            $p_sql->bindValue(":image", $personagem->getImagem());

            var_dump($p_sql->execute());
            if ($p_sql->execute()) {
                echo "Personagem atualizado com sucesso.";
                return true;
            } else {
                echo "Erro ao atualizar personagem.";
                return false;
            }
        } catch (Exception $exception) {
            print "Ocorreu um erro ao tentar atualizar o personagem: <br> {$exception} <br>";
        }
    }
    

    public function delete(int $id) {
        try {
            $sql = "DELETE FROM cadastroPersonagem WHERE id = $id";

            Conexao::getConexao()->query($sql);

        } catch (Exception $exception) {
            echo "Erro ao excluir personagem: <br>{$exception}<br>";
        }
    }

    private function listaPersonagens($row) {
        $personagem = new Personagem();
        
        $personagem->setId($row['id']);
        $personagem->setNome($row['name']);
        $personagem->setPrimeiraAparicao($row['apparition']);
        $personagem->setMaiorFeito($row['greatFeat']);
        $personagem->setDescricao($row['description']);
        $personagem->setEstadoVM($row['alive']);
        $personagem->setCausaDaMorte($row['causeOfDead']);
        $personagem->setImagem($row['image']);

        return $personagem;
    }
    function consultaUpdate(int $id){
        $sqlPersonagem = "SELECT * FROM cadastroPersonagem where id = $id";
        $result = Conexao::getConexao()->query($sqlPersonagem);
        $lista = $result->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($lista as $dado) {
            $f_lista = $this->listaPersonagens($dado);
        }
        return $f_lista;
    } 
}
