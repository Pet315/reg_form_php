<div class="container my-5">
    <h3>To participate in the conference, please fill out the form</h3>

    <form action="/reg_form_php/step2" method="post" id="form1">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name (max length: 30 symbols):</label>
            <input type="text" class="form-control" name="first_name" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['first_name']; } ?>" maxlength="30">
            <?php if (strpos($error, 'first name')): ?>
                <small class="form-text text-danger"><?= $error?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name (max length: 50):</label>
            <input type="text" class="form-control" name="last_name" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['last_name']; } ?>" maxlength="50">
            <?php if (strpos($error, 'last name')): ?>
                <small class="form-text text-danger"><?= $error?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Birth date:</label>
            <input type="date" class="form-control" name="birthdate" max="<?php echo date('Y-m-d'); ?>" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['birthdate']; } ?>">
            <?php if (strpos($error, 'birthdate')): ?>
                <small class="form-text text-danger"><?= $error?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="report_subject" class="form-label">Report Subject (max length: 150):</label>
            <input type="text" class="form-control" name="report_subject" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['report_subject']; } ?>" maxlength="150">
            <?php if (strpos($error, 'report subject')): ?>
                <small class="form-text text-danger"><?= $error?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country:</label>
            <select id="country" name="country" class="form-select search_select_box"></select>
            <span class="d-none"><?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['country']; } ?></span>
        </div>
        <script src="public/js/selectCountry.js"></script>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone (use this format: +1 (555) 555-5555):</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="<?php if (isset($_SESSION['POST']['first_name']) and !strpos($error, 'phone')) { echo $_SESSION['POST']['phone']; } ?>">
            <script>
                $(document).ready(function () {
                    $('#phone').inputmask('+9[9] (999) 999-9999');
                });
            </script>
            <?php if (strpos($error, 'phone')): ?>
                <small class="form-text text-danger"><?= $error?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (max length: 70):</label>
            <input type="text" class="form-control" name="email" value="<?php if (isset($_SESSION['POST']['first_name']) and !strpos($error, 'email')) { echo $_SESSION['POST']['email']; } ?>" maxlength="70">
            <?php if (strpos($error, 'email')): ?>
                <small class="form-text text-danger"><?= $error?></small>
            <?php endif; ?>
            <span id="emailError" style="color: red;"></span>
        </div>

        <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
    </form>
</div>
