<div class="card events-card" data-item-id="notification-preferences-form">
    <form method="POST" action="<?= ($BASE) ?><?= (Base::instance()->alias('settings')) ?>">
        <input type="hidden" name="token" value="<?= ($CSRF) ?>">
        <input type="hidden" name="cmd" value="updateNotificationPreferences" />

        <header class="class-header">
            <div class="card-header-title"><?= ($AdminSettings_notificationPreferences_title) ?><p class="tooltip-info tooltip" title="<?= ($AdminSettings_notificationPreferences_title_tooltip) ?>"><?php echo $this->render('images/icons/information.svg',NULL,get_defined_vars(),0); ?></p>
            </div>
        </header>

        <div class="card-content">
            <div class="content">
                <div class="field">
                    <label class="label"><?= ($AdminSettings_notificationPreferences_reviewReminderFrequency_label) ?></label>
                    <div class="control">
                        <div class="selector">
                            <select class="input" name="review-reminder-frequency" id="review-reminder-frequency">
                                <?php foreach ((\Tirreno\Utils\Constants::get('NOTIFICATION_REMINDER_TYPES')?:[]) as $key): ?>
                                    <?php $active=$frequency === $key; ?>
                                    <option value="<?= ($key) ?>" <?= ($active ? 'selected' : '') ?>><?= ($AdminSettings_notificationPreferences_reviewReminderFrequency_options[$key])."
" ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="card-footer">
            <input type="submit" class="button is-primary"
                value="<?= ($AdminSettings_notificationPreferences_button_save) ?>">
        </footer>
    </form>
</div>
