<?php if (Notification::get('success')) Alert::success(Notification::get('success')); ?>
<?php if (Notification::get('error')) Alert::error(Notification::get('error')); ?>


<form method="post" class="form-horizontal">
    <?php echo (Form::hidden('csrf', Security::token())); ?>
    <div class="form-group">
    <label for="contact_name" class="col-md-4 control-label"><?php echo __('Name', 'contact'); ?></label>
    <div class="col-md-8">
    <input  type="text" name="contact_name" class="input form-control" value="<?php echo $name; ?>" />
    </div>
    </div>
    <div class="form-group">
    <label for="contact_email" class="col-md-4 control-label"><?php echo __('Email', 'contact'); ?></label>
    <div class="col-md-8">
    <input  type="text" name="contact_email" class="input form-control" value="<?php echo $email; ?>" />
    </div>
    </div>
    <div class="form-group">
    <label for="contact_body" class="col-md-4 control-label"><?php echo __('Message', 'contact'); ?></label>
    <div class="col-md-8">
    <textarea class="input form-control" rows="10" name="contact_body"><?php echo $body; ?></textarea>
    </div>
    </div>

    <?php if (Option::get('captcha_installed') == 'true') { ?>
    <div class="form-group">
    <div class="col-md-4 col-md-offset-4">
    <input type="text" class="input form-control" name="answer">
    <span class="help-block"><?php echo __('Enter the code to prove you are human', 'contact'); ?></span>
    <?php if (isset($errors['captcha_wrong'])) echo Html::nbsp(3).'<span class="alert alert-danger error">'.$errors['captcha_wrong'].'</span>'; ?>
    </div>
    <div class="col-md-2">
    <span type="image" class="form-control" style="overflow: hidden; width: 170px; padding: 0px;"><?php CryptCaptcha::draw(); ?></span>
    </div>
    </div>
    <?php } ?>

    <br />
    <?php if (count($errors) > 0) { ?>
    <div class="alert alert-danger"><ul>
    <?php foreach ($errors as $error) { ?>
        <li><?php echo $error; ?></li>
    <?php } ?>
    </ul></div>
    <?php } ?>
    <div class="col-md-4 col-md-offset-4">
    <input type="submit" class="btn btn-block" value="<?php echo __('Send', 'contact'); ?>" name="contact_submit"/>
    </div>
</form>
