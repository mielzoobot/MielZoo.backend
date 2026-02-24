<?php if (isset($showChart) && 1 === $showChart): ?>
    <div class="main-graph separate-graph">
        <?php if (false !== strpos($CURRENT_PATH, 'logbook')): ?>
            
                <?php echo $this->render('templates/parts/forms/filtersForm.html',NULL,get_defined_vars(),0); ?>
            
        <?php endif; ?>
        <div class="stat-chart"></div>
    </div>
<?php endif; ?>

<div class="card events-card">
    <header class="card-header">
        <div class="card-header-title">
            <?= ($AdminLogbook_table_title)."
" ?>
            <span>&#8943;</span><p class="tooltip-info tooltip" title="<?= ($AdminLogbook_table_title_tooltip) ?>"><?php echo $this->render('images/icons/information.svg',NULL,get_defined_vars(),0); ?>
            </p>
        </div>
    </header>

    <div class="card-table">
        <div class="content">
            <?php if (false !== strpos($CURRENT_PATH, 'logbook')): ?>
                
                    <?php echo $this->render('templates/parts/forms/searchForm.html',NULL,get_defined_vars(),0); ?>
                
            <?php endif; ?>
            <table class="table dim-table" id="logbook-table">
                <thead>
                    <tr>
                        <th class="tooltip logbook-ip-col" title="<?= ($AdminLogbook_column_ip_tooltip) ?>"><?= ($AdminLogbook_column_ip) ?></th>
                        <th class="tooltip logbook-timestamp-col" title="<?= ($Base_table_column_local_timestamp_tooltip) ?>"><?= ($Base_table_column_local_timestamp) ?></th>
                        <th class="tooltip logbook-endpoint-col" title="<?= ($AdminLogbook_column_endpoint_tooltip) ?>"><?= ($AdminLogbook_column_endpoint) ?></th>
                        <th class="tooltip logbook-status-col" title="<?= ($Base_table_column_error_type_tooltip) ?>"><?= ($Base_table_column_error_type) ?></th>
                        <th class="tooltip logbook-message-col" title="<?= ($Base_table_column_error_text_tooltip) ?>"><?= ($Base_table_column_error_text) ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
