<!-- Write your Controller code here. You should rename this file. -->
<?php

require '../utilities/Connector.php';
require '../models/Person.php';

class PersonController {

    public function create($post){
        if(!empty($post['name']) && !empty($post['age']) && !empty($post['balance']) && !empty($post['image'])) {
            $person = new Person($post);
            $person = base64_encode(serialize($person));

            $database = Connector::get_instance();
            $pdo = $database->get_pdo();
            $sql = "INSERT INTO `people` (`people`) VALUES ('${person}')";
            $query = $pdo->prepare($sql);
        
        if($query->execute()) {
            header('Location: ../views/index.php?add=success');
            exit();
        } else {
            header('Location: ../views/add-object.php?db=failed');
            exit();
            }
        } else {
            header('Location: ../views/add-object.php?add=failed');
            exit();
        } 
    }

    public function read() {

        $database = Connector:: get_instance();
        $pdo = $database->get_pdo();
        $sql = "SELECT * FROM `people`";
        $query = $pdo->prepare($sql);
        $query->execute();
        $people = $query->fetchAll();

        foreach ($people as $i => $row) {
            $person = base64_decode($row['people']);
            $person = unserialize($person);
            $people[$i]['people'] = $person;
        }
        return $people;
    }

    public function update($post) {

        $key = $post['id'];

        if(!empty($post['name']) && !empty($post['age']) && !empty($post['balance']) && !empty($post['image'])) {

            $person = new Person ($post);
            $person = base64_encode(serialize($person));

            $database = Connector::get_instance();
            $pdo = $database->get_pdo();
            $sql = "UPDATE `people` SET people = '${person}' WHERE id = '${key}'";
            $query = $pdo->prepare($sql);
            
            if($query->execute()) {
                header('Location: ../views/index.php?update=success&key=' . $key);
                exit();
            } else {
                header('Location: ../views/index.php?db=failed');
                exit();
            }
        } 
        else {
            header('Location: ../views/index.php?edit=failed&key=' . $key);
            exit();
            }
        }
    
    public function delete($post) {

        $key = $post['id'];
        $database = Connector::get_instance();
        $pdo = $database->get_pdo();

        $sql = "DELETE FROM `people` WHERE id=${key}";
        $query = $pdo->prepare($sql);

        if($query->execute()) {
            header('Location: ../views/index.php?delete=success');
            exit();
        } else {
            header('Location: ../views/index.php?delete=failed&key=' . $key);
            exit();
        }
    }
}