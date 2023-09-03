<?php require 'app/views/layout.php'; ?>

<head>
    <style>
        form {
            width: 50%;
        }
    </style>

    <script src="public/js/countries.js"></script>
</head>

<body>
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>

        <form action="/reg_form_php/social_buttons" method="post" enctype="multipart/form-data">

            <input type="hidden" name="first_name" value="<?= $step1['first_name'] ?>">
            <input type="hidden" name="last_name" value="<?= $step1['last_name'] ?>">
            <input type="hidden" name="birthdate" value="<?= $step1['birthdate'] ?>">
            <input type="hidden" name="report_subject" value="<?= $step1['report_subject'] ?>">
            <input type="hidden" name="country" value="<?= $step1['country'] ?>">
            <input type="hidden" name="phone" value="<?= $step1['phone'] ?>">
            <input type="hidden" name="email" value="<?= $step1['email'] ?>">

            <div class="mb-3">
                <label for="company">Company:</label>
                <input type="text" class="form-control" value="<?php if (count($_SESSION['POST2']) > 1) { echo $_SESSION['POST2']['company'];} ?>" name="company">
            </div>
            <div class="mb-3">
                <label for="position">Position:</label>
                <input type="text" class="form-control" value="<?php if (count($_SESSION['POST2']) > 1) { echo $_SESSION['POST2']['position'];} ?>" name="position">
            </div>
            <div class="mb-3">
                <label for="about-me">About me:</label>
                <textarea class="form-control" name="about_me" rows="4" value="<?php if (count($_SESSION['POST2']) > 1) { echo $_SESSION['POST2']['about_me'];} ?>"></textarea>
            </div>
            <div class="mb-3">
                <label for="photo">Photo:</label>
                <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/jpeg, image/png">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" id="nextStep2">Next</button>
                <!-- <a href="#" class="btn btn-danger">Back</a> -->
            </div>
        </form>
    </div>

</body>