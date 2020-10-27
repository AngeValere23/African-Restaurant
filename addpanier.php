<?php
include 'master_page/head.php';
include 'master_page/_header.php';
$json = array('error' => true);
if(isset($_GET['id'])){
    //var_dump($_GET);
    
    $reqproduct = $db->prepare("SELECT id FROM products WHERE id = :id");
    $reqproduct->execute(array('id' => $_GET['id']));
    $product = $reqproduct->fetchAll(PDO::FETCH_OBJ);
    //var_dump($product);
    if(empty($product)){
		$json['message'] = "Ce produit n'existe pas";
    }
    $panier->add($product[0]->id);
    echo' 
    
    <!-- EMPTY CART -->
    <section>
        <div class="card card-default">
            <div class="card-block">
                <strong></strong><br>
                Le produit a bien été ajouté à votre panier<br>
                Cliquez <a href="panier.php">ici</a> pour voir le panier.<br>
            </div>
        </div>
    </section>
    <!-- /EMPTY CART -->
    ';
    
}else{
    die('Le produit n\'existe pas..!');
}
?>