
<?php require 'rb.php';

R::setup('mysql:host=127.0.0.1;dbname=red',
    'redd','redd');


//R::wipe('houserent','user');


//Create house rental posting object

//create user object
$user = R::dispense( 'user' ); // create user table object
//$user->ID = 1;
$user->name = 'Elon';
$user->age = 99;
//$user->gender = 'M';
//$user->IP = '192.168.1.1';
//$user->firstsignedon = 'Aug 25 2015'
//$user->Posts;

R::store( $user );  //store user into database

$bob = R::dispense('user');
$bob->lastname = 'Hank';
R::store ($bob);

//coolbeans

//we havent figured out redbean yet. Ruby on rails is much faster.


$houserent = R::dispense( 'houserent' ); // create object
//$houserent->ID = 1;
$houserent->title = 'Non-smoking room for two';
$houserent->description = 'The best darn house';
$houserent->price = 10;
/*$houserent->squarefeet = 700;
$houserent->restrictions = 'no pets';
$houserent->address = '888 glover';
$houserent->city = 'Surrey';
$houserent->province = 'BC';
$houserent->MoveInDate = 'Aug 25 2015';
$houserent->timePost='1995-12-05 19:00:00';*/



R::store( $houserent );//stores into database
$user->Posts = $houserent;


/*
foreach ($user as $b){
    print_r($b) ;
    echo $user->ownPosts;
}*/


//$user->post = $houserent; //connect the two objects


//$keys = $a->related($user, "ID" );


$houserent = R::findAll('houserent');
foreach($houserent as $house) {
    echo $house->title." ".$house->price." ".$house->squarefeet." ".$house->restrictions." ".$house->city." ".$house->MoveInDate;
    echo "<br>";
    echo "This post was made on ".$house->timePost;
    echo "<br>";
}

echo "<br><br><br>";


$user = R::findAll('user');
foreach($user as $u) {
    echo $u->name." ".$u->post;
    echo "<br>";
}

echo "<br><br><br>";





//CREATE SEARCH PART OF APPLICATION


$sf = '600'; //variable set for squarefeet

$search  = R::find( 'houserent', ' squarefeet > '.$sf );   //find squarefeet based on variable
//print_r($book);

foreach ($search as $a){
    //$b = explode("/:/",$a);
    echo $a;
}



R::close();



?>



