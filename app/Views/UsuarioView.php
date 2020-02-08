<?php
 
namespace Views{
 
    require '../../vendor/autoload.php';
 
    class UsuarioView {
        public function index(){
            $usuarioModel = new \Models\Usuario();
            $usuarios = $usuarioModel->findAll();
 
            $templateTabela =   '<table>
                                    <theah>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Departamento</th>
                                    </theah>             
                                    <tbody>
                                        %1$s
                                        </tbody>
                                </table>';
 
            $templateLinha =    '<tr>
                                    <td>%1$s</td>
                                    <td>%2$s</td>
                                    <td>%3$s</td>
                                </tr>';
 
            $linhas = '';
            foreach ($usuarios as $usuario) {
                $linhas .= sprintf($templateLinha, $usuario->getId(), $usuario->getNome()), $usuario->getDepartamento());
            }
 
            $resultado = sprintf($templateTabela, $linhas);
 
            return $resultado;
        }
    }
}
 
?>
