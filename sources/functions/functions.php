<?php

// Paramètres de connexion à la base de données (à adapter en fonction de votre environnement);

define('HOST', 'localhost');
define('USER', 'root');
define('DBNAME', 'links_manager_dev');
define('PASSWORD', 'root'); // windows (Mamp le mot de passe c'est 'root')

/**
 * Fonction de connexion à la base de données
 *
 * @return \PDO
 */
function db_connect(): PDO
{
    try {
        /**
         * Data Source Name : chaine de connexion à la base de données
         * Elle permet de renseigner le domaine du serveur de la base de données, le nom de la base de données cible et l'encodage de données pendant leur transport
         * @var string
         */
        $dsn =  'mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8';

        return new PDO($dsn, USER, PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (\PDOException $ex) {
        echo sprintf('La demande de connexion à la base de donnée a échouée avec le message %s', $ex->getMessage());
        exit(0);
    }
}


/**
 * Fonction qui permet de récupérer le tableau des enregistrements de la table des liens
 * @return array
 */
function get_all_link()
{
    $db = db_connect();

    $sql = <<<EOD
    SELECT
        *
    FROM
        `links`
    EOD;
    // $sql = "SELECT * FROM `links`";
    $linksStmt = $db->query($sql);
    $linksStmt->execute();
    $links = $linksStmt->fetchAll(PDO::FETCH_ASSOC);

    return $links;
}
// var_dump(get_all_link());

/**
 * Fonction qui permet de récupérer un enregistrement à partir de son identifiant dans la table des liens
 * @param integer $link_id
 * @return array
 */
function get_link_by_id($link_id)
{
    $db = db_connect();

    $sql = <<<EOD
    SELECT
        *
    FROM
        `links`
    WHERE link_id = $link_id
    EOD;
    // $sql = "SELECT * FROM `links`";
    $linksIdStmt = $db->query($sql);
    $linksIdStmt->execute();
    $linksId = $linksIdStmt->fetchAll(PDO::FETCH_ASSOC);

    return $linksId;
}
// var_dump(get_link_by_id(3));


/**
 * Fonction qui permet de modifier un enregistrement dans la table des liens
 * @param array $data: ['link_id' => 1, 'title' => 'MDN', 'url' => 'https://developer.mozilla.org/fr/']
 * @return bool
 */
function update_link($data)
{
    // TODO implement function
}


// fonction qui verifi si les champs sont bien defini et pas vide
function get_verify(){
    return(isset($_POST['title']) and !empty($_POST['title']) and isset($_POST['url']) and !empty($_POST['url']));
}

/**
 * Fonction qui permet de d'enregistrer un nouveau lien dans la table des liens
 * @param array $data: ['title' => 'MDN', 'url' => 'https://developer.mozilla.org/fr/']
 * @return bool
 */
$data = [];
function create_link($data)
{
    if(get_verify()){
        $db = db_connect();
        $title = $_POST['title'];
        $url = $_POST['url'];

        $data = "INSERT INTO links (title, url) VALUES ('$title', '$url')";
        $db->exec($data);
        echo "bon";
        header('Location: http://localhost:8888/souabe_raphael_eval_php/sources/');
    }
}
create_link($data);

/**
 * Fonction qui permet de supprimer l'enregistrement dont l'identifiant est $linl_id dans la table des liens
 *@param integer $link_id
 * @return bool
 */
function delete_link($link_id)
{
    $db = db_connect();

    $sql = <<<EOD
    DELETE FROM `links`

    WHERE `link_id` = $link_id
    EOD;
    $deleteStmt = $db->query($sql);
    $deleteStmt->execute();
    $delete = $deleteStmt->fetchAll(PDO::FETCH_ASSOC);

    return $delete;
}
// $link_id = $id;
// delete_link($link_id);