<?php 


include_once "model.php";


function index(){
    if($_GET['add'] == 'add'){
        addlist('New list');
    }


   

    return array("Lists" =>  getlist());
}

?>