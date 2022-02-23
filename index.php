<?php 

include_once "controller.php";
$data = index();
print_r($data["Lists"]);
?>


<?include_once "template/header.php"?>

<? for($i=0; $i<count($data["Lists"]); $i++){ ?>


<div class="card w-25 m-5 p-2 d-inline-block">
    <h4 class="card-title text-center"><?=$data["Lists"][$i][1]?></h4>
    <div class="card-body">
    
        <p class="card-text">
        Some quick example text to build on the card title
        and make up the bulk of the card's content.
        </p>
       
  </div>
</div>

<? } ?>

<?include_once "template/footer.php"?>
