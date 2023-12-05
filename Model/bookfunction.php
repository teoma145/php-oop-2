<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__.'/genre.php';
include __DIR__.'/product.php';
class Book extends product{
    private int $id;
    private string $title;
    private string $isbn;
    private string $authors;
    private string $thumbnailUrl;    
    private string $longDescription;
    

    function __construct($_id,$title,$isbn,$authors,$thumbnailUrl,$longDescription,$quantity,$price){
        parent::__construct($price,$quantity);
        $this->id = $_id;
        $this->title = $title;
        $this->isbn = $isbn;
        $this->authors = is_array($authors) ? implode(', ', $authors) : $authors;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->longDescription = $longDescription;
        
    }
    
   
    public function printcardbook(){
        $sconto = $this->setDis($this->title);
        $image = $this->thumbnailUrl;
        $title = $this->title;
        $content = $this->isbn;
        $custom = $this->authors;
        $template = $this->longDescription;
        $price=$this->price;
        $quantity =$this->quantity;
        
        include __DIR__.'/../Views/card.php';
    }
    public static function fetchAll(){
    $BookString = file_get_contents(__DIR__.'/books_db.json');
    $BookList = json_decode($BookString,true);
    
    $Books = [];
    
    foreach ($BookList as $item){
    $quantity = rand(0,100);
    $price = rand(5,200);
    $Books[]= new Book($item['_id'],$item['title'],$item['isbn'],$item['authors'],$item['thumbnailUrl'],$item['longDescription'],$quantity,$price);
    }
    return $Books;
    }
   
}

//$Babylon = New Movie('1',"Babylon A.D.","A veteran-turned-mercenary is hired to take a young woman with a secret from post-apocalyptic Eastern Europe to New York City.",5.601,"https://image.tmdb.org/t/p/w342/kt9nqD0uOar8IVE9191HXhWOXKI.jpg",);
//var_dump($Babylon);




?>

