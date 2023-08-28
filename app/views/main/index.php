<head>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
        .map-iframe {
            width: 100%;
            height: 450px;
            border: 0;
        }
        h3 {
            text-align: left;
            padding: 0;
            margin-bottom: 30px;
            margin-top: 30px;
        }
    </style>
    <script src="public/js/countries.js"></script>
    <script src="public/js/nextStep.js"></script>
</head>

<body>
    <iframe class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13215.079075971047!2d-118.3434578!3d34.101038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4b705f7%3A0x1c4beb7772cd2003!2s7060%20Hollywood!5e0!3m2!1suk!2sua!4v1693223926975!5m2!1suk!2sua" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
    <h3>To participate in the conference, please fill out the form</h2>

    
    <form id="multiStepForm" action="#" method="post">
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
                <label for="birthdate" class="form-label">Birthdate:</label>
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
                <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="mb-3">
                <label for="position">Position:</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="mb-3">
                <label for="about-me">About me:</label>
                <textarea class="form-control" id="about-me" name="about_me" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="photo">Photo:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" required>
                    <label class="custom-file-label" for="photo">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </div>

    </form>

    <!-- <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
        
    </div> -->
</body>