<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caseguard Assignment</title>


  <?php wp_head();?>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css" integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body <?php body_class(); ?>>

  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-9">
          <div class="logo">
            <!-- Logo -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/CaseGuard_logo.svg" alt="Company Logo">
          </div>
        </div>

        <div class="col-lg-3 align-items-end">
            <button id="scrollToSection1" type="button" class="header-btn btn btn-primary no-bg-color">Button 1</button>
            <button id="scrollToSection2" type="button" class="header-btn btn btn-secondary" style="background-color:#00F3FF;color:black;">Button 2</button>
        </div>

      </div>
    </div>
  </header>