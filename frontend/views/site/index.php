<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h4 style="color:#1b809e;">Получение списка городов</h4>
    <div class="table-responsive">
        <table class="table">
            <tbody><tr class="info ">
                <th class="col-md-3">URL</th>
                <th class="col-md-2">HTTP запрос</th>
                <th class="col-md-4">Описание</th>
            </tr>
            <tr>
                <td><code>/cities</code></td>
                <td><strong>GET</strong></td>
                <td>Возвращает список городов с дополнительным набором страны и региона</td>
            </tr>
        </tbody></table>
    </div>

    <h4 style="color:#1b809e;">Обновление города</h4>
    <div class="table-responsive">
        <table class="table">
            <tbody><tr class="info ">
                <th class="col-md-3">Пример</th>
                <th class="col-md-2">HTTP запрос</th>
                <th class="col-md-4">Описание</th>
            </tr>
            <tr>
                <td><code>curl -X PUT -d city_id=1 -d region_id=1 -H "Accept: application/json" -H "Authorization: Bearer {api_token}"  "almagroup/cities"</code></td>
                <td><strong>PUT</strong></td>
                <td>Обновляет город по city_id. Параметр api_token соответствует имени пользователя</td>
            </tr>
        </tbody></table>
    </div>

    <h4 style="color:#1b809e;">Добавление города</h4>
    <div class="table-responsive">
        <table class="table">
            <tbody><tr class="info ">
                <th class="col-md-3">Пример</th>
                <th class="col-md-2">HTTP запрос</th>
                <th class="col-md-4">Описание</th>
            </tr>
            <tr>
                <td><code>curl -i -H "Accept: application/json" -H "Authorization: Bearer {api_token}" --data "name=Шымкент</code><code>&</code><code>region_id=3&country_id=1" almagroup/cities</code></td>
                <td><strong>POST</strong></td>
                <td>Добавляет город. Параметр api_token соответствует имени пользователя</td>
            </tr>
        </tbody></table>
    </div>
</div>
