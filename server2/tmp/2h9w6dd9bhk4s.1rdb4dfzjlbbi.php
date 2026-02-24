<div class="searchline">
    <div class="field day-tile tooltip" title="<?= ($AdminHome_clock_day_tooltip) ?>">
        <input class="input" id="clock-day" placeholder="<?= ($clock_day) ?>" readonly>
    </div>

    <div class="field time-tile tooltip" title="<?= ($AdminHome_clock_time_tooltip) ?>">
        <input class="input" id="clock-time" placeholder="<?= ($clock_time_his) ?> <?= ($clock_timezone) ?>" readonly>
    </div>

    <input type="hidden" id="offset" value="<?= ($clock_offset) ?>">

   
</div>
