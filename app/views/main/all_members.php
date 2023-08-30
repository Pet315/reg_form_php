<head>
    <style>
        img {
            height: 20px;
            width: 20px;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h3>All members</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Full Name</th>
                <th>Report Subject</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>

        <?php
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>";
                if ($user["photo"]) {
                    echo "<img src='" . $user["photo"] . "' alt='User'>";
                } else {
                    echo "<img src='public/img/default_user.png' alt='Default User'>";
                }
                echo "</td>";
                // echo "<td><img src='public/img/" . ($user["photo"] ? $user["photo"] : "default_user.png") . "' alt='Default User'></td>";
                echo "<td>" . $user["first_name"] . " " . $user["last_name"] . "</td>";
                echo "<td>" . $user["report_subject"] . "</td>";
                echo "<td><a href='mailto:" . $user["email"] . "'>" . $user["email"] . "</a></td>";
                echo "</tr>";
            }
        ?>

        </tbody>
    </table>

</body>