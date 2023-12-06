<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__.'/Views/header.php';
include __DIR__.'/Model/Book.php';
$Books = Book::fetchAll();

?>

<section class="container">
    <h2>Book</h2>
    <div class="row">
    <?php foreach($Books as $Book) 
    $Book->printcard($Book->formatCard());
    
    ?>
</div>
</section>


<?php
include __DIR__.'/Views/footer.php';
?>
