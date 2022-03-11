<?php 

include_once "controller.php";
$data = index();


?>


<?include_once "template/header.php"?>
<?php if(empty($_GET['editlist']) && empty($_GET['editblock'])){ ?>
<div class="text-center">
    <? for($i=0; $i<count($data["Lists"]); $i++){ ?>


        <div class="card w-25 m-5 p-2 d-inline-block align-top">
            <h4 class="card-title text-center">    
                <form class="m-auto display-inline-block text-center ">    
                    <button class="border-0 display-inline-block card-text btn-link button" name="editlist" value="<?=$data['Lists'][$i]['Id']?>" type="submit">
                        <?=$data['Lists'][$i]['Name']?>             
                    </button>
                    <button class="text-danger border-0 display-inline-block card-text btn-link button" name="removelist" value="<?=$data['Lists'][$i]['Id']?>" type="submit">
                        <i class="bi-trash"></i>
                    </button>
                    <input type="hidden" name="value" value="<?=$i?>">
                    <input type="hidden" name="updatetitle" value="1">
                    <input type="hidden" name="sortdur" value="<?=$_GET['sortdur']?>">
                </form>
            </h4>
            
            <h6>
                <form>
                    <button class="border-0 display-inline-block card-text btn-link button" name="sortdur" value="1" type="submit">
                       Order by duration             
                    </button>
                </form>
            </h6>
            <div class="card-body">
            <? for($x=0; $x<count($data['Listitems'][$i]); $x++){ ?>
                <form <?php if($data['Listitems'][$i][$x]['Status'] == 0){ ?> class="red form-inline my-2 my-lg-0" <?}else{ ?>class="green form-inline my-2 my-lg-0" <? } ?>>
                    <button class="card-text btn-link button display-inline-block" name="editblock" value="<?=$data['Listitems'][$i][$x]['Id']?>" style="width:80%" type="submit">
                        <?=$data['Listitems'][$i][$x]['Text']?>
                    </button>
                    <input type="hidden" name="value" value="<?=$i?>">
                    <input type="hidden" name="valuex" value="<?=$x?>">
                    <input type="hidden" name="sortdur" value="<?=$_GET['sortdur']?>">
                    <button style="margin-bottom:11px !important" class="text-danger border-0 display-inline-block card-text btn-link button" name="removeitem" value="<?=$data['Listitems'][$i][$x]['Id']?>" type="submit">
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
</div><?=$data['Lists'][$i]['Name']?>
<? }elseif(!empty($_GET['editlist'])){ ?> 

<form class="text-center">
    <input class="w-75 m-auto" name="title" type="text" value="<?=$data['Lists'][$_GET['value']]['Name']?>">
    <input name="id" type="hidden" value="<?=$_GET['editlist']?>">
    <input class="w-75 m-auto" type="submit">
    <input type="hidden" name="sortdur" value="<?=$_GET['sortdur']?>">
</form>


<?php }else{ ?>
        <form class="text-center">
        <br>
            <input class="w-75 m-auto" name="title" type="text" value="<?=$data['Listitems'][$_GET['value']][$_GET['valuex']]['Text']?>">
            <br>
            <input name="duration" type="number" placeholder="Time in minutes" value="<?=$data['Listitems'][$_GET['value']][$_GET['valuex']]['Time']?>"><label >Minuten</label>
            <br>
            <input <? if($data['Listitems'][$_GET['value']][$_GET['valuex']]['Status'] == 1){ ?> checked<? } ?> name="done" type="checkbox" value="1"><label>Done?</label>
            <br>
            <input name="id" type="hidden" value="<?=$_GET['editblock']?>">
            <input class="w-75 m-auto" name="itemupdate" type="submit">
            <input type="hidden" name="sortdur" value="<?=$_GET['sortdur']?>">
        </form>

<?php
    }
include_once "template/footer.php"
?>
