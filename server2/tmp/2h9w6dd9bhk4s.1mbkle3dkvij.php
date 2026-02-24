<?php if (isset($ERROR_MESSAGE)): ?>
    <?php $MESSAGE_TYPE='is-warning'; ?>
    <?php $MESSAGE=$ERROR_MESSAGE; ?>
    <?php $TS=$ERROR_MESSAGE_TIMESTAMP; ?>
    <div class="notification <?= ($MESSAGE_TYPE) ?>" id="error-procedure-notification"><span class="faded"
        >[<?= (\Tirreno\Utils\ElapsedDate::short($TS)) ?>]</span>&nbsp;&nbsp;<?= ($this->raw($MESSAGE)) ?><button class="delete"
    ></button></div>
<?php endif; ?>

<?php if (isset($SUCCESS_MESSAGE)): ?>
    <?php $MESSAGE_TYPE='is-primary'; ?>
    <?php $MESSAGE=$SUCCESS_MESSAGE; ?>
    <?php $TS=$SUCCESS_MESSAGE_TIMESTAMP; ?>
    <div class="notification <?= ($MESSAGE_TYPE) ?>" id="success-procedure-notification"><span class="faded"
        >[<?= (\Tirreno\Utils\ElapsedDate::short($TS)) ?>]</span>&nbsp;&nbsp;<?= ($this->raw($MESSAGE)) ?><button class="delete"
    ></button></div>
<?php endif; ?>
