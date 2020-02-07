<?php
 
namespace Views{
 
    require '../../vendor/autoload.php';
 
    class CargoView {
        public function index(){
            $cargoModel = new \Models\Cargo();
            $cargos = $cargoModel->findAll();
 
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
            foreach ($cargos as $cargo) {
                $linhas .= sprintf($templateLinha, $cargo->getId(), strtoupper($cargo->getNome()), $cargo->getDepartamento());
            }
 
            $resultado = sprintf($templateTabela, $linhas);
 
            return $resultado;
        }
    }
}
 
?>
