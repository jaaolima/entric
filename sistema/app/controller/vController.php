<?php
 
class VController extends Controller {

    function beforeAction () {

    }

    function distribuidores() {
        echo json_encode($this->VModel->getDistribuidores($_POST), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

    function gt_endereco_distribuidor() {
        $dados = $this->VModel->gt_endereco_distribuidor($_POST['id']);
        echo $dados;
    }

    function produtos() {

        $produtos = $this->VModel->gtProdutos();
        echo ' <table style="width:100%;border: 1px solid;border-collapse: collapse;">
                <tr>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Foto</th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Produto</th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Categoria</th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Tipo do Produto</th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Apresentação e Características </th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Volume total</th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Densidade calórica</th>
                    <th style="text-align: left;border: 1px solid; padding: 10px;">Kcal - CHO - PTN - LIP - Fibras</th>
                </tr>';

        if ($produtos){
            for ($t = 0; $t < count($produtos); $t++) {
                $foto = "";
                if (trim($produtos[$t]['foto']<>"")){
                    $foto = "<a href='".BASE_SISTEMA_URI.$produtos[$t]['foto']."' target='_blank'><img src='".BASE_SISTEMA_URI.$produtos[$t]['foto']."' width='100px' border='0'></a>";
                }

                $apresentacao = "-";
                $caracteristicas = "-";
                if ($produtos[$t]['via'] == "Enteral"){
                    $apresentacao = ($produtos[$t]['apres_enteral']<>""?implode(', ', json_decode($produtos[$t]['apres_enteral'], true)):"");
                    $caracteristicas = ($produtos[$t]['carac_enteral']<>""?implode(', ', json_decode($produtos[$t]['carac_enteral'], true)):"");
                }
                else if ($produtos[$t]['via'] == "Suplemento"){
                    $apresentacao = ($produtos[$t]['apres_oral']<>""?implode(', ', json_decode($produtos[$t]['apres_oral'], true)):"");
                    $caracteristicas = ($produtos[$t]['carac_oral']<>""?implode(', ', json_decode($produtos[$t]['carac_oral'], true)):"");
                }

                echo '<tr>
                        <td style="width:5%; text-align: left;border: 1px solid; padding: 10px;">'.$foto.'</td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Nome:</strong> '.$produtos[$t]['nome'].' <br><br>
                                                                                                    </td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Tipo do Categoria:</strong><br>'.($produtos[$t]['especialidade']<>""?implode(', ', json_decode($produtos[$t]['especialidade'], true)):"").'</td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Tipo do Produto:</strong><br>'.$produtos[$t]['via'].'</td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Apresentação:</strong><br>'.$apresentacao.' <br><br>
                                                                                                  <strong>Características:</strong><br> '.$caracteristicas.'
                        </td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Volume Total:</strong><br>'.$produtos[$t]['volume'].' 
                        </td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Densidade Calórica:</strong><br>'.$produtos[$t]['medida_dc'].' 
                        </td>
                        <td style="width:10%; text-align: left;border: 1px solid; padding: 10px;"><strong>Kcal:</strong><br>'.$produtos[$t]['kcal'].' <br><br>
                                                                                                    <strong>CHO:</strong><br>'.$produtos[$t]['cho'].' <br><br>
                                                                                                    <strong>PTN:</strong><br>'.$produtos[$t]['ptn'].' <br><br>
                                                                                                    <strong>LIP:</strong><br>'.$produtos[$t]['lip'].' <br><br>
                                                                                                    <strong>Fibras:</strong><br>'.$produtos[$t]['fibras'].' <br><br>
                        </td>
                    </tr>';
            }
        }

        echo    '</table> ';
    }

    function afterAction() {

    }
 
}