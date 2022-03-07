<?php 

include_once "controller.php";
$data = index();


?>


<?include_once "template/header.php"?>

<div class="text-center">
    <? for($i=0; $i<count($data["Lists"]); $i++){ ?>


        <div class="card w-25 m-5 p-2 d-inline-block">
            <h4 class="card-title text-center">    
                <form class="m-auto display-inline-block text-center ">    
                <?=$data['Lists'][$i]['Name']?>             
                    <button class="text-danger border-0 display-inline-block card-text btn-link button" name="removelist" value="<?=$data['Lists'][$i]['Id']?>" type="submit">
                        <i class="bi-trash"></i>
                    </button>
                </form>
            </h4>
            <div class="card-body">
            <? for($x=0; $x<count($data['Listitems'][$i]); $x++){ ?>
                <form class="form-inline my-2 my-lg-0">
                    <button class="card-text btn-link button display-inline-block" name="editblock" value="<?=$data['Listitems'][$i][$x]['Id']?>" style="width:80%" type="submit">
                        <?=$data['Listitems'][$i][$x]['Text']?>
                    </button>
                    <button class="text-danger border-0 display-inline-block card-text btn-link button" name="removeitem" value="<?=$data['Listitems'][$i][$x]['Id']?>" type="submit">
                        <i class="bi-trash"></i>
                    </button>
                </form>
                <?}?>
                <form class="form-inline my-2 my-lg-0 mt-5">
                    <button type="submit" class="btn btn-outline-secondary w-100 mt-2" name="additem" value="add-<?=$data['Lists'][$i]['Id']?>"  >Add</button>
                </form>
            </div>
        </div>
    <? } ?>
               
</div>
<?include_once "template/footer.php"?>
