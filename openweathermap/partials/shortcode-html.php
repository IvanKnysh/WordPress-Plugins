<div class="openweathermap">
    <?php if(get_option('_crb_city_show')): ?>
        <div class="city"><?php echo $data->name; ?></div>
    <?php else: ?>
    <?php endif; ?>

    <?php if(get_option('_crb_weather_icon_show')): ?>
        <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
    <?php else: ?>
    <?php endif; ?>

    <div class="temp"><?php echo $data->main->temp_max; ?>&deg;C</div>
</div>