<?php require 'app/views/layout.php'; ?>

<head>
    <style>
        form {
            width: 50%;
        }
    </style>

    <script src="public/js/countries.js"></script>
    <script src="public/js/nextStep.js"></script>
</head>

<body>
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>

        <form id="multiStepForm" action="/reg_form_php/social_buttons" method="post" enctype="multipart/form-data">
            <div id="step1" class="step">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Birth date:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>

                <div class="mb-3">
                    <label for="report_subject" class="form-label">Report Subject:</label>
                    <input type="text" class="form-control" id="report_subject" name="report_subject" required>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country:</label>
                    <select id="country" name="country" class="form-select search_select_box"></select>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="\+\d{1} \(\d{3}\) \d{3}-\d{4}" placeholder="+1 (555) 555-5555" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <button type="button" class="btn btn-primary" id="nextStep1">Next</button>
            </div>

            <div id="step2" class="step" style="display: none;">
                <div class="mb-3">
                    <label for="company">Company:</label>
                    <input type="text" class="form-control" id="company" name="company">
                </div>
                <div class="mb-3">
                    <label for="position">Position:</label>
                    <input type="text" class="form-control" id="position" name="position">
                </div>
                <div class="mb-3">
                    <label for="about-me">About me:</label>
                    <textarea class="form-control" id="about-me" name="about_me" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo">Photo:</label>
                    <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/jpeg, image/png">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" id="nextStep2">Next</button>
                    <!-- <a href="" class="btn btn-danger">Back</a> -->
                </div>
            </div>

        </form>
    </div>

</body>