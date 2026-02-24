<div class="card events-card">
    <header class="card-header">
        <div class="card-header-title"><?= ($AdminApi_shared_keys_title) ?><p class="tooltip-info tooltip" title="<?= ($AdminApi_shared_keys_title_tooltip) ?>"><?php echo $this->render('images/icons/information.svg',NULL,get_defined_vars(),0); ?></p>
        </div>
    </header>

    <div class="card-table">
        <div class="content">
            <table class="table" id="shared-operators-table">
                <tbody>
                    <?php if (count($SHARED_OPERATORS) > 0): ?>
                        
                            <?php foreach (($SHARED_OPERATORS?:[]) as $operator): ?>
                                <tr>
                                    <td><?= ($operator['email']) ?></td>
                                    <td><?= ($operator['is_active'] ? 'Active' : 'Inactive') ?></td>
                                    <td>
                                        <?php echo $this->render('templates/parts/forms/removeCoOwnerForm.html',NULL,['id'=>$operator['id']]+get_defined_vars(),0); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        
                        <?php else: ?>
                            <tr>
                                <td colspan="2"><?= ($AdminApi_shared_keys_empty) ?></td>
                            </tr>
                        
                    <?php endif; ?>

                    <tr>
                        <?php echo $this->render('templates/parts/forms/addCoOwnerForm.html',NULL,get_defined_vars(),0); ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
