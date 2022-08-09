</main>

<footer id="footer" role="contentinfo">
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="first col-12 col-md-3">
                    <?php if (is_active_sidebar('footer-first')): dynamic_sidebar('footer-first'); endif; ?>
                </div>
                <div class="col-12 col-md-3">
                    <?php if (is_active_sidebar('footer-second')): dynamic_sidebar('footer-second'); endif; ?>
                </div>
                <div class="col-12 col-md-3">
                    <?php if (is_active_sidebar('footer-third')): dynamic_sidebar('footer-third'); endif; ?>
                </div>
                <div class="col-12 col-md-3">
                    <?php if (is_active_sidebar('footer-fourth')): dynamic_sidebar('footer-fourth'); endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="copy-content">
                    Copyright &copy; 2022, <a href="#">AR Theme</a> - Kids WordPress Theme. Designed by <a href="#">AR Theme</a>.
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <ul class="social-media">
                        <li><a href="#"><i class="ri-facebook-line"></i></a></li>
                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                        <li><a href="#"><i class="ri-linkedin-line"></i></a></li>
                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                        <li><a href="#"><i class="ri-pinterest-line"></i></a></li>
                        <li><a href="#"><i class="ri-google-play-line"></i></a></li>
                        <li><a href="#"><i class="ri-tumblr-line"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
    <?php wp_footer(); ?>
</body>
</html>