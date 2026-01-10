<?php
include_once("header.php");
// die;
?>
<!-- Home-->
<section class="home-area element-cover-bg" id="home" style="background-image:url(img/WhatsApp_Image_2025-12-14_at_13.32.34_c751668c-removebg-preview-modified.png)">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
      <div class="col-12 col-lg-8 home-content text-center">
        <h1 class="home-name">RITIK <span>KUMAR</span></h1>
        <h4 class="cd-headline clip home-headline">The
          <span class="cd-words-wrapper single-headline">
            <b class="is-visible">Full Stack Developer.</b>
            <b>Software Engineer.</b>
            <b>Backend Developer.</b>
            <b>Server Side Developer.</b>
            <b>API Developer.</b>
            <b>Frontend Developer.</b>
          </span>
        </h4>
      </div>
    </div>
  </div>
  <div class="fixed-wrapper">
    <!-- Languages list-->
    <div class="fixed-block block-left" style="z-index: 5;">
      <ul class="list-unstyled languages-list">
        <li><span class="single-language">ENG</span></li>
      </ul>
    </div>
    <!-- Social media icons-->
    <div class="fixed-block block-right" style="z-index: 5;">
      <ul class="list-unstyled social-icons">
        <li><a href="<?php echo $aboutus_data['twitter_link']; ?>" target="_blank"><i class="icon ion-logo-twitter"></i></a></li>
        <li><a href="<?php echo $aboutus_data['facebook_link']; ?>" target="_blank"><i class="icon ion-logo-facebook"></i></a></li>
        <li><a href="<?php echo $aboutus_data['linkdin_link']; ?>" target="_blank"><i class="icon ion-logo-linkedin"></i></a></li>
        <li><a href="<?php echo $aboutus_data['github_link']; ?>" target="_blank"><i class="icon ion-logo-github"></i></a></li>
        <li><a href="<?php echo $aboutus_data['instagram_link']; ?>" target="_blank"><i class="icon ion-logo-instagram"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="container text-center" style="
    position: sticky;
    bottom: 0px; color: #ffff;
    z-index: 15;">
    <?php
    $year = date("Y");
    ?>
    © <?php echo $year; ?> RITIK KUMAR | All Rights Reserved | Personal Portfolio Website - Web Hosting By - <a href="https://trendtech.in/" target="_blank" style="color: #009e66; font-weight: 700;">Trend Tech</a>
  </div>
</section>
<!-- About lightbox-->
<div class="lightbox-wrapper" id="about" data-simplebar>
  <div class="container">
    <div class="lightbox-close">
      <div class="close-btn" data-modal-close=""><span class="btn-line"></span></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="lightbox-content">
          <div class="row">
            <div class="col-12">
              <div class="section-heading page-heading">
                <p class="section-description">Get to know me</p>
                <h2 class="section-title">About Me</h2>
                <div class="animated-bar"></div>
              </div>
            </div>
          </div>
          <!-- Info section-->
          <div class="info-section single-section">
            <div class="row align-items-center">
              <!-- Picture part-->
              <div class="col-12 col-lg-5 info-img"><img class="img-fluid img-thumbnail" src="img/<?php echo $aboutus_data['image']; ?>"
                  alt="Picture Not Found"></div>
              <!-- Content part-->
              <div class="col-12 col-lg-7 info-content">
                <div class="content-block">
                  <h2 class="content-subtitle">Who am i?</h2>
                  <h6 class="content-title"><?php echo $aboutus_data['heading']; ?></h6>
                  <div class="content-description">
                    <p><?php echo $aboutus_data['description']; ?></p>
                  </div>
                  <address class="content-info">
                    <div class="row">
                      <div class="col-12 col-md-6 single-info"><span>Name:</span>
                        <p><?php echo $basic_data['full_name'] ?? "N/A"; ?></p>
                      </div>
                      <div class="col-12 col-md-6 single-info"><span>Email:</span>
                        <p><a href="mailto:<?php echo $basic_data['email']; ?>"><?php echo $basic_data['email']; ?></a></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-6 single-info"><span>Age:</span>
                        <p><?php echo $basic_data['age']; ?></p>
                      </div>
                      <div class="col-12 col-md-6 single-info"><span>From:</span>
                        <p><?php echo $basic_data['state'] . ', ' . $basic_data['country']; ?></p>
                      </div>
                    </div>
                  </address>
                  <div class="d-block d-sm-flex align-items-center">
                    <span class="btn content-download button-main button-scheme" id="download_cv" style="cursor: pointer;">Download CV</span>
                    <ul class="list-unstyled list-inline content-follow">
                      <li class="list-inline-item"><a href="<?php echo $aboutus_data['twitter_link']; ?>" target="_blank"><i class="icon ion-logo-twitter"></i></a></li>
                      <li class="list-inline-item"><a href="<?php echo $aboutus_data['instagram_link']; ?>" target="_blank"><i class="icon ion-logo-instagram"></i></a></li>
                      <li class="list-inline-item"><a href="<?php echo $aboutus_data['linkdin_link']; ?>" target="_blank"><i class="icon ion-logo-linkedin"></i></a></li>
                      <li class="list-inline-item"><a href="<?php echo $aboutus_data['github_link']; ?>" target="_blank"><i class="icon ion-logo-github"></i></a></li>
                      <li class="list-inline-item"><a href="<?php echo $aboutus_data['facebook_link']; ?>" target="_blank"><i class="icon ion-logo-facebook"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Services section-->
          <div class="services-section single-section">
            <div class="row">
              <div class="col-12 mb-3">
                <div class="section-heading">
                  <p class="section-description">Services i offer to my clients</p>
                  <h2 class="section-title">My Services</h2>
                </div>
              </div>
            </div>
            <div class="row">

              <!-- Single service-->
              <?php
              foreach ($services_data as $sd) {
              ?>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="single-service">
                    <?php echo $sd['icon']; ?>
                    <h6 class="service-title"><?php echo $sd['heading']; ?></h6>
                    <p class="service-description"><?php echo $sd['description']; ?></p>
                    <span class="see-more text-primary" style="cursor:pointer;">
                      See more
                    </span>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
          <!-- Testimonials section-->
          <div class="testimonials-section single-section">
            <div class="row">
              <div class="col-12 mb-3">
                <div class="section-heading">
                  <p class="section-description">What my clients think about me</p>
                  <h2 class="section-title">Testimonials</h2>
                </div>
              </div>
            </div>
            <div class="my-slider">
              <?php
              foreach ($testimonial_data as $td) {
              ?>
                <div class="slider-item">
                  <!-- Single review-->
                  <div class="single-review swiper-slide">
                    <div class="review-header d-flex justify-content-between">
                      <div class="review-client">
                        <div class="media">
                          <img class="img-fluid rounded-circle client-avatar" src="assets/user_images/<?php echo $td['photo']; ?>"
                            alt="Client">
                          <div class="client-details">
                            <h6 class="client-name"><?php echo $td['full_name']; ?></h6>
                            <span class="client-role"><?php echo $td['subject']; ?></span>
                          </div>
                        </div>
                      </div><i class="icon ion-md-quote review-icon"></i>
                    </div>
                    <p class="review-content"><?php echo $td['description']; ?></p>
                    <span class="see-more text-primary" style="cursor:pointer;">
                      See more
                    </span>
                    <span class="client-role float-right" style="font-size: 12px !important;">
                      <?php
                      $createdAt = strtotime($td['created_at']);
                      $now = time();

                      $diff = $now - $createdAt;

                      if ($diff < 60) {
                        echo $diff . " s ago";
                      } elseif ($diff < 3600) {
                        echo floor($diff / 60) . " m ago";
                      } elseif ($diff < 86400) {
                        echo floor($diff / 3600) . " h ago";
                      } elseif ($diff < 172800) {
                        echo "1 day ago";
                      } else {
                        echo floor($diff / 86400) . " days ago";
                      }
                      ?>
                    </span>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="d-flex justify-content-center mt-4">
              <span class="btn content-download button-main button-scheme" id="your_feeedback" style="cursor: pointer;">Your feedback</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Resume lightbox-->
<div class="lightbox-wrapper" id="resume" data-simplebar>
  <div class="container">
    <div class="lightbox-close">
      <div class="close-btn" data-modal-close=""><span class="btn-line"></span></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="lightbox-content">
          <div class="row">
            <div class="col-12">
              <div class="section-heading page-heading">
                <p class="section-description">Check out my Resume</p>
                <h2 class="section-title">Resume</h2>
                <div class="animated-bar"></div>
              </div>
            </div>
          </div>
          <!-- Resume section-->
          <div class="resume-section single-section">
            <div class="row">
              <!-- Education part-->
              <div class="col-12 col-md-6">
                <div class="col-block education">
                  <h3 class="col-title">Education</h3>
                  <?php foreach ($education_data as $ed) { ?>
                    <div class="resume-item"><span class="item-arrow"></span>
                      <h5 class="item-title"><?php echo $ed['education_name']; ?></h5><span class="item-details"><?php echo $ed['university'] . ' / ' . $ed['from_year'] . ' - ' . $ed['to_year']; ?></span>
                      <p class="item-description"><?php echo $ed['description']; ?></p>
                      <span class="see-more text-primary" style="cursor:pointer;">
                        See more
                      </span>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <!-- Experience part-->
              <div class="col-12 col-md-6">
                <div class="col-block experience">
                  <h3 class="col-title">Experience</h3>
                  <?php foreach ($experience_data as $exd) { ?>
                    <div class="resume-item"><span class="item-arrow"></span>
                      <h5 class="item-title"><?php echo $exd['job_title']; ?></h5><span class="item-details"><?php echo $exd['company_name'] . ' / ' . $exd['from_year'] . ' - ' . $exd['to_year']; ?></span>
                      <p class="item-description"><?php echo $exd['description']; ?></p>
                      <span class="see-more text-primary" style="cursor:pointer;">
                        See more
                      </span>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- Skills section-->
          <div class="skills-section single-section">
            <div class="row">
              <div class="col-12">
                <div class="section-heading">
                  <p class="section-description">My level of knowledge in some tools</p>
                  <h2 class="section-title">My Skills</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <?php foreach ($skills_data as $sd) { ?>
                <div class="col-12 col-md-6 mt-5">
                  <div class="single-skill" data-percentage="<?php echo $sd['per_knowledge']; ?>">
                    <div class="skill-info"><span class="skill-name"><?php echo $sd['skill']; ?></span><span
                        class="skill-percentage"></span></div>
                    <div class="progress skill-progress">
                      <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <!-- Video section-->
          <div class="video-section single-section">
            <div class="row align-items-center">
              <div class="col-12 col-lg-6 content-part">
                <h3 class="video-title">Take a tour of my office</h3>
                <p class="video-description">Welcome to my workspace — a place where ideas turn into functional and creative digital solutions. My office is designed to keep productivity high while maintaining a calm and comfortable environment. From a well-organized desk setup to the tools I use daily.</p>
                <p class="video-description">This space reflects my work culture: simple, efficient, and technology-driven.</p>
              </div>
              <div class="col-12 col-lg-6 video-part"><a class="media-lightbox"
                  href="https://www.youtube.com/watch?v=doteMqP6eSc" data-lightbox>
                  <div class="embed-responsive embed-responsive-16by9">
                    <div class="embed-responsive-item element-cover-bg"><span class="play-wrapper"><i
                          class="icon ion-md-play"></i></span></div>
                  </div>
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Portfolio lightbox-->
<div class="lightbox-wrapper" id="portfolio" data-simplebar>
  <div class="container">
    <div class="lightbox-close">
      <div class="close-btn" data-modal-close=""><span class="btn-line"></span></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="lightbox-content">
          <div class="row">
            <div class="col-12">
              <div class="section-heading page-heading">
                <p class="section-description">Showcasing some of my best work</p>
                <h2 class="section-title">All Projects</h2>
                <div class="animated-bar"></div>
              </div>
            </div>
          </div>
          <!-- Portfolio section-->
          <div class="portfolio-section single-section">
            <div class="row">
              <!-- Filter nav-->
              <div class="col-12">
                <ul class="list-inline filter-control" role="group" aria-label="Filter Control">
                  <li class="list-inline-item tab-active" data-filter="*">All</li>
                  <li class="list-inline-item" data-filter=".Live">Live</li>
                  <li class="list-inline-item" data-filter=".Github">GitHub</li>
                  <li class="list-inline-item" data-filter=".Frontend">Frontend</li>
                </ul>
              </div>
            </div>
            <!-- Thumbnail list-->
            <div class="portfolio-grid row" id="portfolio-grid" style="height: auto !important;">
              <!-- Single item-->
              <!-- Content loaded by Ajax -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog lightbox-->
<div class="lightbox-wrapper" id="blog" data-simplebar>
  <div class="container">
    <div class="lightbox-close">
      <div class="close-btn" data-modal-close=""><span class="btn-line"></span></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="lightbox-content">
          <div class="row">
            <div class="col-12">
              <div class="section-heading page-heading">
                <p class="section-description">Check out my latest blog posts</p>
                <h2 class="section-title">My Blog</h2>
                <div class="animated-bar"></div>
              </div>
            </div>
          </div>
          <!-- Blog section-->
          <div class="blog-section single-section">
            <div class="row justify-content-center" id="all_blog_container">
              <!-- Single post-->
              <!-- All blogs comes throgh ajax -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact lightbox-->
<div class="lightbox-wrapper" id="contact" data-simplebar>
  <div class="container">
    <div class="lightbox-close">
      <div class="close-btn" data-modal-close=""><span class="btn-line"></span></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="lightbox-content">
          <div class="row">
            <div class="col-12">
              <div class="section-heading page-heading">
                <p class="section-description">Feel free to contact me anytimes</p>
                <h2 class="section-title">Get in Touch</h2>
                <div class="animated-bar"></div>
              </div>
            </div>
          </div>
          <!-- Contact section-->
          <div class="contact-section single-section">
            <div class="row">
              <!-- Contact form-->
              <div class="col-12 col-lg-7">
                <form method="post" class="contact-form" id="contact-form" action="" enctype="multipart/form-data">
                  <h4 class="content-title">Message Me</h4>
                  <div class="row">
                    <div class="col-12 col-md-6 form-group">
                      <input class="form-control" id="contact-name" type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                      <input class="form-control" id="contact-email" type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="col-12 form-group">
                      <input class="form-control" id="contact-subject" type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="col-12 form-group form-message">
                      <textarea class="form-control" id="contact-message" name="message" placeholder="Message" rows="5" required=""></textarea>
                    </div>
                    <div class="col-12 form-group">
                      <input class="form-control" id="contact-file" type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif">
                    </div>
                    <div class="col-12 form-submit"><button class="btn button-main button-scheme" id="contact-submit" type="submit">Send Message</button>
                      <!-- <p class="contact-feedback"></p> -->
                    </div>
                  </div>
                </form>
              </div>
              <!-- Contact info-->
              <div class="col-12 col-lg-5">
                <div class="contact-info">
                  <h4 class="content-title">Contact Info</h4>
                  <p class="info-description">I am always available for work if the right company comes along, Feel free to contact me!</p>
                  <ul class="list-unstyled list-info">
                    <li>
                      <div class="media align-items-center"><span class="info-icon"><i
                            class="icon ion-logo-ionic"></i></span>
                        <div class="media-body info-details">
                          <h6 class="info-type">Name</h6><span class="info-value"><?php echo $basic_data['full_name']; ?></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media align-items-center"><span class="info-icon"><i
                            class="icon ion-md-map"></i></span>
                        <div class="media-body info-details">
                          <h6 class="info-type">Location</h6><span class="info-value"><?php echo $basic_data['address']; ?></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media align-items-center"><span class="info-icon"><i
                            class="icon ion-md-call"></i></span>
                        <div class="media-body info-details">
                          <h6 class="info-type">Call Me</h6><span class="info-value"><a href="tel:+919354607685">+91 <?php echo $basic_data['number']; ?></a></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media align-items-center"><span class="info-icon"><i
                            class="icon ion-md-send"></i></span>
                        <div class="media-body info-details">
                          <h6 class="info-type">Email Me</h6><span class="info-value"><a
                              href="mailto:<?php echo $basic_data['email']; ?>"><?php echo $basic_data['email']; ?></a></span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- removeIf(customizerDist)-->
<div class="demo-tool">
  <div class="tool-wrapper">
    <span class="tool-toggler"><i class="icon ion-md-settings"></i></span>
    <div class="tool-box">
      <ul class="list-inline single-block color-switcher">
        <li class="list-inline-item" style="background-color: #2c31ff;" data-path="css/colors/main-blueviolet.css">
        </li>
        <li class="list-inline-item" style="background-color: #3460D1;" data-path="css/colors/main-nightskyblue.css">
        </li>
        <li class="list-inline-item" style="background-color: #EE3158;" data-path="css/colors/main-redpink.css"></li>
        <li class="list-inline-item" style="background-color: #007bff;" data-path="css/colors/main-blue.css"></li>
        <li class="list-inline-item" style="background-color: #17a2b8;" data-path="css/colors/main-cyan.css"></li>
        <li class="list-inline-item" style="background-color: #3365b0;" data-path="css/colors/main-darkblue.css"></li>
        <li class="list-inline-item" style="background-color: #a435b7;" data-path="css/colors/main-darkmagenta.css">
        </li>
        <li class="list-inline-item" style="background-color: #c93e70;" data-path="css/colors/main-darkpink.css"></li>
        <li class="list-inline-item" style="background-color: #bf2a3d;" data-path="css/colors/main-darkred.css"></li>
        <li class="list-inline-item" style="background-color: #28a745;" data-path="css/colors/main-green.css"></li>
        <li class="list-inline-item" style="background-color: #6610f2;" data-path="css/colors/main-indigo.css"></li>
        <li class="list-inline-item" style="background-color: #fd7e14;" data-path="css/colors/main-orange.css"></li>
        <li class="list-inline-item" style="background-color: #e83e8c;" data-path="css/colors/main-pink.css"></li>
        <li class="list-inline-item" style="background-color: #6f42c1;" data-path="css/colors/main-purple.css"></li>
        <li class="list-inline-item" style="background-color: #dc3545;" data-path="css/colors/main-red.css"></li>
        <li class="list-inline-item" style="background-color: #20c997;" data-path="css/colors/main-teal.css"></li>
        <li class="list-inline-item" style="background-color: #333;" data-path="css/colors/main-dark.css"></li>
        <li class="list-inline-item" style="background-color: #78b230;" data-path="css/colors/main-yellowgreen.css">
        </li>
        <li class="list-inline-item" style="background-color: #E16F7C;" data-path="css/colors/main-tangopink.css">
        </li>
        <li class="list-inline-item" style="background-color: #6F73D2;" data-path="css/colors/main-moodyblue.css">
        </li>
        <li class="list-inline-item" style="background-color: #664C43;" data-path="css/colors/main-brown.css"></li>
        <li class="list-inline-item" style="background-color: #4770D9;" data-path="css/colors/main-royalblue.css">
        </li>
        <li class="list-inline-item" style="background-color: #ffb100;" data-path="css/colors/main-darkyellow.css">
        </li>
      </ul>
      <div class="single-block buy-btn mb-0">
        <a class="btn btn-success btn-sm" target="_blank"
          href="https://themeforest.net/item/kitzu-personal-portfolio-template/26075107" role="button">Buy Kitzu</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" style="z-index: 9999999; backdrop-filter: blur(5px); padding-left: unset;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #101010; filter: drop-shadow(0px 0px 2px #009e66);">
      <div class="modal-header" style="border-bottom: 1px solid #009e66;">
        <h5 class="modal-title">Feedback Form</h5>
        <a href="#" type="button" class="close" data-dismiss="modal" style="color: white;font-weight: 100;">X</a>
      </div>
      <div class="modal-body">
        <div class="contact-section single-section">
          <div class="row">
            <!-- Contact form-->
            <div class="col-12">
              <form method="post" class="contact-form mb-0" id="feedback-form" action="#" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12 col-md-6 form-group mb-4">
                    <input class="form-control" id="feedback-name" type="text" name="name" placeholder="Full Name" required>
                  </div>
                  <div class="col-12 col-md-6 form-group mb-4">
                    <input class="form-control" id="feedback-email" type="email" name="email" placeholder="Your Email" required>
                  </div>
                  <div class="col-12 form-group mb-4">
                    <input class="form-control" id="feedback-subject" type="text" name="subject" placeholder="Your Designation" required>
                  </div>
                  <div class="col-12 form-group form-message mb-4">
                    <textarea class="form-control" id="feedback-message" name="message" placeholder="Your Feedback Message" rows="5" required="" style="height:auto;"></textarea>
                  </div>
                  <div class="col-12 form-group mb-4">
                    <input class="form-control" id="feedback-file" type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif">
                  </div>
                  <div class="col-12 form-submit">
                    <button class="btn button-main button-scheme" id="feedback-submit" type="submit">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="yourProject" style="z-index: 9999999; backdrop-filter: blur(5px); padding-left: unset;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content" style="background-color: #101010; filter: drop-shadow(0px 0px 2px #009e66);">
      <div class="modal-header" style="border-bottom: 1px solid #009e66;">
        <h5 class="modal-title project_title">Project Detail</h5>
        <a href="#" type="button" class="close" data-dismiss="modal" style="color: white;font-weight: 100;">X</a>
      </div>
      <div class="modal-body">
        <div class="contact-section single-section" id="project_container">
          <div class="row">
            <div class="col-12" id="your_project">
              <!-- data come through ajax -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="yourBlog" style="z-index: 9999999; backdrop-filter: blur(5px); padding-left: unset;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content" style="background-color: #101010; filter: drop-shadow(0px 0px 2px #009e66);">
      <div class="modal-header" style="border-bottom: 1px solid #009e66;">
        <h5 class="modal-title" id="blog_title">Blog Detail</h5>
        <a href="#" type="button" class="close" data-dismiss="modal" style="color: white;font-weight: 100;">X</a>
      </div>
      <div class="modal-body">
        <div class="contact-section single-section" id="blog_container">
          <div class="row">
            <div class="col-12" id="your_blog">
              <!-- data come through ajax -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include("footer.php")
?>