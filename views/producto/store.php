<?php
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: jerson
 * Date: 11-11-17
 * Time: 4:32
 */
?>


<div class="row">
    <h3 style="text-align: center"><strong>Herramientas Disponibles</strong></h3>

    <?php
    foreach ($models as $row){
      $img=Yii::$app->imagemanager->getImagePath($row->IMAGEN, 700, 650,'outbound');
        $url = Url::to(['herramientas', 'id' => $row->ID_CATEGORIA]);
        echo '<div class="col-sm-6 col-md-4 col-lg-2 ">
    <div  class="thumbnail custom grow">
      <a href="'.$url.'"><img src="'.$img.'" alt="'.$row->NOMBRE.'"  ></a>
      <div class="caption">
        <h4 style="text-align: center">'.$row->NOMBRE.'</h4>
        
      </div>
    </div>
  </div>';
    }
    ?>


</div>
