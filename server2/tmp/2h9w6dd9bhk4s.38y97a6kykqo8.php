<?php echo $this->render('templates/parts/header.html',NULL,get_defined_vars(),0); ?>
<section class="front-block">
    <div class="container">
        <div class="column-login">
            <?php if (isset($ERROR_MESSAGE)): ?>
            
                <p class="warning-text"><?= ($ERROR_MESSAGE) ?></p>
            
            <?php endif; ?>
            <div class="card">
                <div class="card-panel">
                    <div class="content">
                        <?php if (isset($SUCCESS_MESSAGE)): ?>
                            
                                <p class="level-center"><?= ($this->raw($SUCCESS_MESSAGE)) ?></p>
                            
                            <?php else: ?>
                                <p class="level-center"><?= ($Signup_form_title) ?></p>
                                <hr />
                                <?php echo $this->render('templates/parts/forms/signupForm.html',NULL,get_defined_vars(),0); ?>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->render('templates/parts/footer.html',NULL,get_defined_vars(),0); ?>
