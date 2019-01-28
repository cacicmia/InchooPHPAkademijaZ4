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

       foreach($list as $employee){
           echo "\nID: " . $employee->getID(). " Ime: ". $employee->getName().
               " Rođen:". $employee->getDate()
               . " Spol: ". $employee->getSex() . " Prihodi: ". $employee->getIncome(). "\n";

       }
       echo "\n Broj zaposlenika:". count($list);

    }
}
function addNew(&$list){
    echo "\n ID:";
    $input= trim(fgets(STDIN));
    if (!is_numeric($input)){
        echo "\n ID mora biti brojčana vrijednost";
        addNew($list);
    }
    if (count($list)>0){
        foreach( $list as $obj){
            if ($obj->getID===$input){
                echo "\n Već postoji zaposlenik s tim ID-om";
                addNew($list);
                break;
            }
        }
    }
    $current= new Zaposlenik($input);

    $list[]= $current;
    addName($current);

}
function addName(&$current){
    echo "\nIme i prezime: ";
    $input= trim(fgets(STDIN));
  $current->setName($input);

    if (!$current->setName($input)){
        echo "\nUnos treba sadržavati ime i prezime";
        addName($current);

    }else {
        addDate($current);
    }
}
function addDate(&$current){
    echo "\nDatum (dd.mm.yyyy):";
    $input=trim(fgets(STDIN));
    $current->setDate($input);
    if (!$current->setDate($input)){
        echo "\n Unos nije valjanog tipa";
        addDate($current);
    } else {

        addSex($current);
    }
}
function addSex(&$current){
    echo "\n Unesite spol (M/Ž/N):";
    $input= trim(fgets(STDIN));
    $current->setSex($input);
    if (!$current->setSex($input)){
        echo "\n nevažeći unos";
        addSex($current);
    } else {
        addIncome($current);
    }
}
function addIncome($current){
    echo "Unesite mjesečna primanja:";
    $input= trim(fgets(STDIN));
    $current->setIncome($input);


}

function changeData(){

}
function deletion(){

}
function statistics(){

}
function notRecognised($content){
    echo "Nepoznat unos. Unesite {$content} \n";
}