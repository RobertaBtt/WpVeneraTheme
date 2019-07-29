<?php
/**
 * The template for displaying the footer.
 *
 * @package venera
 */
?>

<footer>
              <div class='pre-footer'>
                <div class='container'>
                  <div class='row'>
                    <div class='span4'>
                      <div class='footer-logo'>
                        <a>Roby<strong>B</strong></a>
                      </div>
                      <ul class='footer-address'>
                        <li>
                          <strong>Europe:</strong>
                          Spain, Italy, Sardinia<br/>
                        </li>
                        
                      </ul>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
              <div class='deep-footer'>
                <div class='container'>
                  <div class='row'>
                    <div class='span6'>
                      <div class='copyright'>Copyright &copy; <?php echo date('Y') ?> Roby B. All rights reserved.</div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </footer>

<?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/prettify.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
</body>
</html>
