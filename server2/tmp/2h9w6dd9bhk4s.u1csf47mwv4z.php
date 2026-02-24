<div class="selector">
    <select class="input" name="timezone" id="timezone">
        <?php foreach (($TIMEZONES?:[]) as $key=>$timezone): ?>
            <?php $active=$TIMEZONE === $key; ?>
            <option value="<?= ($key) ?>" <?= ($active ? 'selected' : '') ?>><?= ($timezone) ?></option>
        <?php endforeach; ?>
    </select>
</div>
