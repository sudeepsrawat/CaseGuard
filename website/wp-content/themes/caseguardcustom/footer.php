<?php wp_footer();?>
<footer>
  <div class="footer">

      <div class="row">
        <div class="col-lg-4">
          <div class="footer-logo">
            <!-- Company Logo -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/CaseGuard_logo.svg" alt="Company Logo">
          </div>
        </div>
        <div class="footer-navigation col-lg-8">
          <h3>Explore</h3>
          <div class="row">
            <div class="row">
              <div class="col">
                <p><a href="">Green 1</a></p>
              </div>
              <div class="col">
                <p><a href="">Green 2</a></p>
              </div>
              <div class="col">
                <p><a href="">Black 1</a></p>
              </div>
            </div>
            <div class="row">
            <div class="col">
              <p><a href="">Black 2</a></p>
            </div>
            <div class="col">
              <p><a href="">Blue 1</a></p>
            </div>
            <div class="col">
              <p><a href="">Blue 2</a></p>
            </div>
            </div>
          </div>
        </div>
        
      </div>
      <hr />
      <div class="copyright-text">
          <p>@<a href="#" target="_blank" rel="noopener noreferrer">CaseGuard</a> Web Dev Assessment 2024</p>
      </div>
  </div>
</footer>


<script>
jQuery(document).ready(function($) {
  $('a[href*="#"]').on('click', function(e) {
    e.preventDefault();

    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 60, 'linear');
  });
});
</script>

</body>

</html>