<?php

    class Categoria extends Conectar{

        public function  get_categoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function  get_categoria_x_id($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE est=1 AND cat_id = $id";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function  insert_categoria($cat_nombre,$cat_obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_categoria (cat_id,cat_nombre,cat_obs,est) VALUES (NULL, ?, ?, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cat_nombre);
            $sql->bindValue(2,$cat_obs);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function  update_categoria($cat_id,$cat_nombre,$cat_obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categoria set
            cat_nombre = ?,
            cat_obs = ?
            WHERE
            cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cat_nombre);
            $sql->bindValue(2,$cat_obs);
            $sql->bindValue(3,$cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function  delete_categoria($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categoria set
            est = '0'
            WHERE
            cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }




    }


?>