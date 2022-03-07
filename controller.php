<?php 


include_once "model.php";




function index(){

    $listitems = array();


    if($_GET['add'] == 'add'){
        addlist('New list');
    }
    
    if(!empty($_GET['additem'])){
        $list = explode('-', $_GET['additem']);
        additem('item', $list[1]);
    }

    if(!empty($_GET['removeitem'])){
        deleteitem($_GET['removeitem']);
    }

    if(!empty($_GET['removelist'])){
        deletelist($_GET['removelist']);
    }

    if(!empty($_GET['updatetitle'])){
        updatelistname($_GET['title'], $_GET['id']);
    }

    if(!empty($_GET['itemupdate'])){
        updateitem($_GET['id'], $_GET['title']);
    }

    $list = getlist();
    foreach($list as $lists){
        $listitem = getlistitems($lists['Id']);  
        array_push($listitems, $listitem);
    }

    return array("Lists" =>  $list, "Listitems" => $listitems);
}

?>