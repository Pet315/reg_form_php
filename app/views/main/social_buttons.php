<head>
    <style>
        h4 {
            color: #000;
        }
    </style>
</head>

<body>
  <div class="text-center mt-4">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://localhost.com/reg_form_php/index'); ?>" class="btn btn-link" target="_blank">
      <img src="public/img/fb.png" alt="FB" width="100">
    </a>
    <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20Meetup%20with%20SoCal%20AngularJS!&url=<?php echo urlencode('http://localhost/reg_form_php/index'); ?>" class="btn btn-link" style="margin-left: 30px;" target="_blank">
      <img src="public/img/tw.png" alt="TW" width="100">
    </a>
  </div>

  <div class="text-center mt-3">
    <a href="/reg_form_php/all_members" class="text-decoration-none">
      <h4>All members (<?= $number ?>)</h4>
    </a>
  </div>

</body>


