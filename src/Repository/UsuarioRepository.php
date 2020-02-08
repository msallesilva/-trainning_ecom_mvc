<?php 

namespace Repository{

    require '../../vendor/autoload.php';    

    use \PDO;
    use \Models\BaseModel;
    use \Models\Usuario;
    use \Repository\BaseRepository;
    use \Repository\Contracts\BaseRepositoryInterface;    

    class UsuarioRepository extends BaseRepository implements BaseRepositoryInterface
    {    
        public function find($id)
        {
            $stmt = $this->connection->prepare('
                SELECT 
                    id_usuario, 
                    nome,
                    sobrenome,
                    email,
                    nascimento,
                    ativo
                FROM usuarios
                WHERE id_usuario = :id_usuario
            ');
            $stmt->bindParam(':id_usuario', $id);
            $stmt->execute();
                    
            $stmt->setFetchMode(PDO::FETCH_INTO, new Usuario());
            return $stmt->fetch();
        }

        public function findAll()
        {
            $stmt = $this->connection->prepare('
                SELECT id_usuario,nome,sobrenome,email,nascimento,ativo FROM usuarios
            ');
            $stmt->execute();            
            $usuarios = $stmt->fetchAll();

            $result = [];
            if($usuarios) {
                foreach($usuarios as $usuario) {
                    $result[$usuario['id_usuario']] = new Usuario($usuario['id_usuario'], 
                    $usuario["nome"],$usuario["sobrenome"],$usuario["email"],$usuario["nascimento"],$usuario["ativo"]);
                }
            }
            return $result;
            
        }

        public function save(BaseModel $usuario)
        {
            $this->beginTransaction();            

            // Se existir Id, é uma alteração
            if (!empty($usuario->id)) {
                return $this->update($usuario);
            }

            $stmt = $this->connection->prepare('
                INSERT INTO usuarios 
                    (nome,sobrenome,email,nascimento,ativo) 
                VALUES 
                    (:nome,:sobrenome,:email,:nascimento,:ativo)
            ');        
            $stmt->bindParam(':nome', $usuario->nome); 
            $stmt->bindParam(':sobrenome', $usuario->sobrenome); 
            $stmt->bindParam(':email', $usuario->email); 
            $stmt->bindParam(':nascimento', $usuario->nascimento);
            $stmt->bindParam(':ativo', $usuario->ativo);              
            $stmt->execute();
            $id = $this->connection->lastInsertId();
            return $id;
        }

        public function update(BaseModel $usuario)
        {
            if (!isset($usuario->id_usuario)) {
                throw new \LogicException(
                    'Usuario não exite.'
                );
            }
            $stmt = $this->connection->prepare('
                UPDATE cargo
                SET nome = :nome, sobrenome = :sobrenome, email = :email, nascimento = :nascimento,  ativo = :ativo,                        
                WHERE id_usuario = :id_usuario
            ');
            
            $stmt->bindParam(':nome', $usuario->nome); 
            $stmt->bindParam(':sobrenome', $usuario->sobrenome); 
            $stmt->bindParam(':email', $usuario->email); 
            $stmt->bindParam(':nascimento', $usuario->nascimento);
            $stmt->bindParam(':ativo', $usuario->ativo);   
            return $stmt->execute();
        }    
    }
}
?>