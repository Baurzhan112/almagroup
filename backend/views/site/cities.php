<?php
use \yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$regionsSelect = ArrayHelper::map($regions, "id", "name");
$countriesSelect = ArrayHelper::map($countries, "id", "name");
?>
<div id="edit_city" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
    <h4 class="modal-title">Изменение заказа</h4>
    </div>
    <div class="modal-body">
        <?php
        $form = ActiveForm::begin();    
        ?>
        <?= $form->field($city_model,'id')->label(false)->hiddenInput(['value'=>'', 'id'=>'city-id'])?>
        <div class="row">
                <div class="col-md-11">
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
            <button type="submit" class="btn btn-success">Изменить</button>
           </div>
        <?php
        ActiveForm::end();
        ?> 
    </div>
    </div>
    </div>
</div>
<table id="cities_table" class="table table-hover order-list tablesorter">
    <thead>
        <tr>
            <th><span class="glyphicon glyphicon-log-in"></span></th>
            <th>№</th>
            <th>Город</th>
            <th>Регион</th>
            <th>Страна</th>          
        </tr>
    </thead>
    <tbody>
        <?php
            $counter = 0;
            foreach ($cities as $city) {
                $region = $city->region;
                $country = $city->country;
                $counter++;
                if ($counter%2 == 0) $class_name = 'success'; else $class_name = 'active';
                ?>
                <tr class=<?php echo "'".$class_name."'";?>>
                    <td><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#edit_city" onclick="get_city_data(<?php echo $city['id']?>,<?php echo "'".$city['name']."'"?>,<?php echo $city['region_id']?>,<?php echo $city['country_id']?>);"></span></td>
                    <td><?php echo $city['id']?></td>
                    <td><?php echo $city['name']?></td>
                    <td><?php echo $region['name']?></td>
                    <td><?php echo $country['name']?></td>                  
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    function get_city_data(id,name,region,country) {
   $('#city-id').val(id);
   $('#city-name').val(name);
   $('#city-region_id').val(region);
   $('#city-country_id').val(country);   
}
</script>