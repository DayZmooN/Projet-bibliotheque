<?php
session_start();
require_once './auth.php';

if (isset($_POST['submit'])) {
    $ISBN = ($_POST['ISBN']);
    $image = ($_POST['image']);
    $title = ($_POST['title']);
    $author = ($_POST['author']);
    $editor = ($_POST['editor']);
    $collection = ($_POST['collection']);
    $publication_date = ($_POST['publication_date']);
    $genre = ($_POST['genre']);
    $id_category = ($_POST['id_category']);
    $summary = ($_POST['summary']);
    $addreq = $db->prepare("INSERT INTO `book`(`ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`) VALUES (:ISBN, :image, :title, :author, :editor, :collection, :publication_date, :genre, :id_category, :summary)");
    $addreq->bindParam('ISBN', $ISBN, PDO::PARAM_STR);
    $addreq->bindParam('image', $image, PDO::PARAM_STR);
    $addreq->bindParam('title', $title, PDO::PARAM_STR);
    $addreq->bindParam('author', $author, PDO::PARAM_STR);
    $addreq->bindParam('editor', $editor, PDO::PARAM_STR);
    $addreq->bindParam('collection', $collection, PDO::PARAM_STR);
    $addreq->bindParam('publication_date', $publication_date, PDO::PARAM_STR);
    $addreq->bindParam('genre', $genre, PDO::PARAM_STR);
    $addreq->bindParam('id_category', $id_category, PDO::PARAM_INT);
    $addreq->bindParam('summary', $summary, PDO::PARAM_STR);
    $addreq->execute();

    $_SESSION['sucess'] = "Produit ajouté avec succès !";
    header('Location: ./article.php');
    exit();
}

include './header-admin.php';
?>

<h1 class="multiTitre">formulaire ajout de livre</h1>

<form id="formulaireAjout" action="" method="POST">
    <div id="formGauche">
        <div class="titre-auteur">
            <label for="title"></label>
            <input class="tripleInput" type="text" name="title" id="title" placeholder="TITRE">

<h1 class="multiTitre">edit catégories</h1>

<h2 class="titleEditCategory">Modification de <?= $category['libel_category'] ?></h2>

<div id="editCategorie">

    <form class="edit" action="" method="post">
        
        
            <input class="editCat" type="text" name="libel_category" value="<?= $category['libel_category'] ?>">
            <input class="editSlugCat" type="text" name="libel_slug" value="<?= $category['libel_slug'] ?>">
        
            <input class="subEditCat" type="submit" name="submitEdit" value="Modifier">
        

        <div id="genreChoice">
            <label for="genre"></label>
            <input type="text" name="genre" id="genre" placeholder="indiquez le genre">
        </div>
    </div>

    <div id="droite">
        <div class="resume">
            <label for="summary">Résumé</label>
            <textarea type="text" name="summary" id="summary"></textarea>
        </div>

    </form>

</div>

<?php include './includeClose.php'  ?>