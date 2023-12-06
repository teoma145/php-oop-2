<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__.'/genre.php';
include __DIR__.'/product.php';
class Movie extends product{
    private int $id;
    private string $title;
    private string $overview;
    private string $vote_average;
    private string $poster_path;    
    private string $original_language;
    public array $genres;

    function __construct($id,$title,$overview,$vote_average,$poster_path,$original_language,$genres,$quantity,$price){
        parent::__construct($price,$quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote_average;
        $this->poster_path = $poster_path;
        $this->original_language = $original_language;
        $this->genres = $genres; 
    }
    public function getVote(){
        $vote=ceil($this->vote_average/2);
        $template = '<p>';
        for($n = 1 ;$n <= 5; $n++){
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';

        }
        $template .= "</p>";
        
        return $template;
        
    }
    public function getGenr(){
        
        $templategen = '<p>';
        for($n = 0 ;$n < count($this->genres); $n++){
            $templategen .= '<span>'.$this->genres[$n]->name.'- </span>';

        }
        $templategen .= "</p>";
        
        return $templategen;
        
    }
    public function printcard(){
        if(ceil($this->vote_average) < 7){
            try{
                $this->setDis(10);

            }catch(Exception $e){
                $error = 'Eccezione'.$e->GetMessage();
            }
        }
        $sconto = $this->GetDis();
        $image = $this->poster_path;
        $title = $this->title;
        $content = $this->overview;
        $custom = $this->vote_average;
        $genres = $this->GetGenr();
        $original_language = $this->original_language;
        $template = $this->getVote();
        $price=$this->price;
        $quantity =$this->quantity;
        
        include __DIR__.'/../Views/card.php';
    }
    public static function fetchAll(){
    $movieString = file_get_contents(__DIR__.'/movie_db.json');
    $movieList = json_decode($movieString,true);
    
    $movies = [];
    $genres = Genre::fetchAll();
    foreach ($movieList as $item){
    $moviegenres= [];
    
    for($i=0;$i < count($item['genre_ids']);$i++){
        $index=rand(0,count($genres)-1);
        $rand_genre=$genres[$index];
        $moviegenres[]=$rand_genre;
    }
    $quantity = rand(0,100);
    $price = rand(5,200);
    $movies[]= new Movie($item['id'],$item['title'],$item['overview'],$item['vote_average'],$item['poster_path'],$item['original_language'],$moviegenres,$quantity,$price);
    }
    return $movies;
    }
   
}

//$Babylon = New Movie('1',"Babylon A.D.","A veteran-turned-mercenary is hired to take a young woman with a secret from post-apocalyptic Eastern Europe to New York City.",5.601,"https://image.tmdb.org/t/p/w342/kt9nqD0uOar8IVE9191HXhWOXKI.jpg",);
//var_dump($Babylon);




?>
