<form method="POST" action="<?= ($BASE) ?>/api">
    <input type="hidden" name="token" value="<?= ($CSRF) ?>">
    <input type="hidden" name="cmd" value="updateApiUsage">
    <input type="hidden" name="keyId" value="<?= ($API_KEY['id']) ?>">

    <div class="card-content">
        <div class="content">
            <div class="field"><p><?= ($this->raw($AdminApi_form_confirmationMessage)) ?></p></div>
            <textarea class="textarea" name="apiToken" placeholder="<?= ($AdminApi_form_field_token_placeholder) ?>" rows="2" cols="84" required><?= ($API_KEY['apiToken']) ?></textarea>

            <?php foreach (($API_KEY['enrichedAttributes']?:[]) as $attribute=>$enabled): ?>
                <?php if ($ALLOW_EMAIL_PHONE): ?>
                    
                        <div class="field">
                            <label class="label"><?= ($AdminApi_data_enrichment_attributes[$attribute]) ?></label>
                            <div class="control">
                                <input type="checkbox" name="enrichedAttributes[<?= ($attribute) ?>]" value="<?= ($attribute) ?>" <?= ($enabled ? 'checked' : '') ?> />
                            </div>
                        </div>
                    
                    <?php else: ?>
                        <?php if ($attribute === 'ip'): ?>
                            
                                <input type="hidden" name="enrichedAttributes[<?= ($attribute) ?>]" value="<?= ($attribute) ?>" checked />
                            
                        <?php endif; ?>
                    
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>
    <footer class="card-footer">
        <input type="submit" class="button is-primary" value="<?= ($AdminApi_form_button_save) ?>" >
    </footer>
</form>
