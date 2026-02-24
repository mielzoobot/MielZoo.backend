<div class="sidebar">
    <aside class="menu">
    <?php echo $this->render('templates/parts/logoAdmin.html',NULL,get_defined_vars(),0); ?>
        <ul class="menu-list">
           

           

            <li>
                <?php $HOME_ACTIVE_CLASS='/' == $CURRENT_PATH ? 'is-active': 'is-normal'; ?>
                <a class="<?= ($HOME_ACTIVE_CLASS) ?>" href="<?= ($BASE) ?>/">
                    <?php echo $this->render('images/icons/dashboard.svg',NULL,get_defined_vars(),0); ?><?= ($LeftMenu_home_link)."
" ?>
                </a>
            </li>

            <li>
                <?php $EVENTS_ACTIVE_CLASS=false !== strpos($CURRENT_PATH, '/event') ? 'is-active': 'is-normal'; ?>
                <a class="<?= ($EVENTS_ACTIVE_CLASS) ?>" href="http://login.mielzoo.cloud/store/index.php">
                    <?php echo $this->render('images/icons/desktop.svg',NULL,get_defined_vars(),0); ?><?= ($LeftMenu_all_events_link)."
" ?>
                </a>
            </li>
<li>
                <?php $WATCHLIST_ACTIVE_CLASS='/watchlist' == $CURRENT_PATH ? 'is-active': 'is-normal'; ?>
                <a class="<?= ($WATCHLIST_ACTIVE_CLASS) ?>"  href="<?= ($BASE) ?>/watchlist">
                    <?php echo $this->render('images/icons/smartphone.svg',NULL,get_defined_vars(),0); ?><?= ($LeftMenu_watchlist_link)."
" ?>
                </a>
            </li>
            <li>
                <?php $USERS_ACTIVE_CLASS=false !== strpos($CURRENT_PATH, '/id') ? 'is-active': 'is-normal'; ?>
                <a class="<?= ($USERS_ACTIVE_CLASS) ?>" href="<?= ($BASE) ?>/id">
                    <?php echo $this->render('images/icons/events.svg',NULL,get_defined_vars(),0); ?><?= ($LeftMenu_users_link)."
" ?>
                </a>
            </li>

           

            


           

            <?php if ($ALLOW_EMAIL_PHONE): ?><?php endif; ?>
            


           

          

           
            <li>
                <?php $SETTINGS_ACTIVE_CLASS='/settings' == $CURRENT_PATH ? 'is-active': 'is-normal'; ?>
                <a class="<?= ($SETTINGS_ACTIVE_CLASS) ?>"  href="<?= ($BASE) ?>/settings">
                    <?php echo $this->render('images/icons/settings.svg',NULL,get_defined_vars(),0); ?><?= ($LeftMenu_settings_link)."
" ?>
                </a>
            </li>

           

            <li>
                <a class="is-normal" href="<?= ($BASE) ?>/logout">
                    <?php echo $this->render('images/icons/logout.svg',NULL,get_defined_vars(),0); ?><?= ($LeftMenu_logout_link)."
" ?>
                </a>
            </li>

           
        </ul>
    </aside>
</div>
