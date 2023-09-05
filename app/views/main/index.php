<?php require 'app/views/layout.php'; ?>

<head>
    <style>
        form {
            width: 50%;
        }
        .content {
            color: red;
        }
    </style>

    <script src="public/js/countries.js"></script>
    <!-- <script src="public/js/nextStep.js"></script> -->
</head>

<body>
    <div class="container my-5">
        <h3 class="content"><?= $content?></h3>
        <h3>To participate in the conference, please fill out the form</h3>

        <form action="/reg_form_php/step2" method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $_SESSION['POST']['first_name'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="<?php if (count($_SESSION['POST']) > 1) { echo $_SESSION['POST']['last_name'];} ?>" required>
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birth date:</label>
                <input type="date" class="form-control" name="birthdate" required>
            </div>

            <div class="mb-3">
                <label for="report_subject" class="form-label">Report Subject:</label>
                <input type="text" class="form-control" name="report_subject" value="<?php if (count($_SESSION['POST']) > 1) { echo $_SESSION['POST']['report_subject'];} ?>" required>
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select search_select_box"></select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" class="form-control" name="phone" pattern="\+\d{1} \(\d{3}\) \d{3}-\d{4}" placeholder="+1 (555) 555-5555" value="<?php if (count($_SESSION['POST']) > 1) { echo $_SESSION['POST']['phone'];} ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php if (count($_SESSION['POST']) > 1) { echo $_SESSION['POST']['email'];} ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
        </form>
    </div>

</body>