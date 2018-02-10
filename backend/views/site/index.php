<?php
use \yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$regionsSelect = ArrayHelper::map($regions, "id", "name");
$countriesSelect = ArrayHelper::map($countries, "id", "name");
$this->title = 'My Yii Application';
?>
<div class="site-index">
<?php
$form = ActiveForm::begin();    
?>
<div class="row">
        <div class="col-md-8 well">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($city_model,'name')->label('Название')->textInput()?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($city_model, 'region_id')->label('Регион')->dropDownList($regionsSelect); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($city_model, 'country_id')->label('Страна')->dropDownList($countriesSelect); ?>
                </div>
            </div>
            <hr class="">
        </div>        
</div>
   <div>
    <button type="submit" class="btn btn-success">Добавить</button>
   </div>
<?php
ActiveForm::end();
?> 
</div>
