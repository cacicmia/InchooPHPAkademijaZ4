<?php
/**
 * Created by PhpStorm.
 * User: mia
 * Date: 28.01.19.
 * Time: 08:22
 */
require "lib.php";
require "00.php";
$list=[];
while (true){
    printMenu();
    $input= trim(fgets(STDIN));

    switch($input){
        case 1:
            overview($list);
            break;
        case 2:
            addNew($list);
            break;
        case 3:
            changeData();
            break;
        case 4:
            deletion();
            break;
        case 5:
            statistics();
            break;
        default:
            notRecognised( "broj ispred željene radnje");

    }

}

function printMenu(){
    echo "\nOdabrati broj ispred željene mogućnosti: \n\n";
    echo "1 Pregled zaposlenika \n" ;
    echo "2 Unos novog zaposlenika \n";
    echo "3 Promjena podataka postojećem zaposleniku \n";
    echo "4 Brisanje zaposlenika \n";
    echo "5 Statistika \n\n";
}
function overview($list){
    if (empty($list)){
        echo "\n Zaposlenici nisu uneseni";
    } else{

    }
}
function addNew($list){
    echo "\n ID:";
    $input= trim(fgets(STDIN));
   
function changeData(){

}
function deletion(){

}
function statistics(){

}
function notRecognised($content){
    echo "Nepoznat unos. Unesite {$content} \n";
}