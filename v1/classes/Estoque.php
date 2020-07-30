<?php

    class Estoque
    {
        public function mostrar()
        {
            //cria conexão
            $con = new PDO('mysql: host=localhost; dbname=filial;','root','');

            //realiza consulta ao Banco de Dados
            $sql = "SELECT * FROM estoque ORDER BY id ASC";
            $sql = $con->prepare($sql);
            $sql->execute();

            $resultados = array();

            //Armazena Consulta
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $resultados[] = $row;
            }

            if(!$resultados){
                //Cria Excption
                throw new Exception("Nenhum Produto no Estoque!");
            }
            
            return $resultados;
        }
    }