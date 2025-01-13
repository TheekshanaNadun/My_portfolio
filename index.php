<?php 
session_start();
require_once "admin/db.php";
?>

<!doctype html>
<html class="no-js" lang="en">


<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Theekshana Nadun</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="front_end_assets/img/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="front_end_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="front_end_assets/css/animate.min.css">
        <link rel="stylesheet" href="front_end_assets/css/magnific-popup.css">
        <link rel="stylesheet" href="front_end_assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="front_end_assets/css/flaticon.css">
        <link rel="stylesheet" href="front_end_assets/css/slick.css">
        <link rel="stylesheet" href="front_end_assets/css/aos.css">
        <link rel="stylesheet" href="front_end_assets/css/default.css">
        <link rel="stylesheet" href="front_end_assets/css/style.css">
        <link rel="stylesheet" href="front_end_assets/css/responsive.css">
        
        <style>
.chat-widget {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 400px;
    height: 600px;
    border: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  border-radius: 16px;
    overflow: hidden;
    z-index: 1000;
    background: #fff9f5; /* Lighter warm background */
}
/* Mobile Responsiveness */
@media screen and (max-width: 768px) {
    .chat-widget {
        width: 100%;
        height: 100%;
        bottom: 0;
        right: 0;
  border-radius: 15px;
    }
}

@media screen and (max-width: 480px) {
    .chat-widget {
        position: fixed;
        width: 90%;
        height: 90vh;
       
        border-radius: 17px;
        margin: 15px;
    }

    .chat-toggle-btn {
        bottom: 10px;
        right: 10px;
    }
}

.chat-container {
    height: 90%;
    display: flex;
    flex-direction: column;
    background: #fff9f5; /* Matching container background */
}

.chat-header {
    padding: 16px;
    background: #fff;
    border-bottom: 1px solid #ffe4d6;
    font-weight: 600;
    color: #333;
    font-size: 16px;
    text-align: center;
    align-items: center;
    gap: 10px;
}


.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 12px;
    background: #fff9f5; /* Matching messages background */
}

.message {
    margin: 24px 2px;
    padding: 15px 14px;
    border-radius: 16px;
    max-width: 75%;
    line-height: 1.7;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 14px;
}

.bot-message {
    background-color: #fff;
    color: #1f1f1f;
    align-self: flex-start;
    margin-right: auto;
    border-bottom-left-radius: 4px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

.user-message {
    background-color: #ffd4c6; /* Lighter coral color */
    color: #1f1f1f; /* Dark text for contrast */
    align-self: flex-end;
    margin-left: auto;
    border-bottom-right-radius: 4px;
}

.chat-input-container {
  display: flex;
  padding: 10px;
  border-top: 1px solid #e0e0e0;
  position: relative;
}

.chat-input {
  flex: 1;
  border: 1px solid #e0e0e0;
  border-radius: 20px;
  padding: 10px 40px 10px 15px;
  font-size: 14px;
  width: 100%;
}

.chat-input::placeholder {
    color: #999;
}

.chat-send-btn {
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  background-color: transparent;
  border: none;
  cursor: pointer;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.chat-send-btn svg {
  width: 24px;
  height: 24px;
  color: #007bff;
}

.chat-toggle-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #ff8364;
    color: white;
    border: none;
    padding: 15px;
    border-radius: 50%;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    cursor: pointer;
    font-size: 1.2rem;
    z-index: 1001;
    transition: transform 0.2s;
}

.chat-toggle-btn:hover {
    transform: scale(1.05);
}

.loading-dots {
    display: inline-block;
}

.loading-dots:after {
    content: '.';
    animation: dots 1.5s steps(5, end) infinite;
}

@keyframes dots {
    0%, 20% { content: '.'; }
    40% { content: '..'; }
    60%, 100% { content: '...'; }
}


</style>
    </head>
    <body class="theme-bg">

     

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="front_end_assets/img/logo/logo.png" alt="Logo"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="front_end_assets/img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="front_end_assets/img/logo/logo.png" alt="" />
                    </a>
                </div>



                 <!--side view and contact information area  -->

                <?php 
                  $information_query = $dbcon->query("SELECT * FROM contact_information");
                  $contact_information = $information_query->fetch_assoc();
                ?>

                <!-- end contact information -->

                <!-- about me query start -->

                <?php 
                  $about_me_query = $dbcon->query("SELECT * FROM about_me");
                  $about_me = $about_me_query -> fetch_assoc();

                ?>

                <!-- about me query end  -->


                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Home Address</h4>
                        <p><?=$contact_information['address']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?=$contact_information['phone']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?=$contact_information['email']?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="<?=$about_me['fb_link']?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?=$about_me['twitter_link']?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?=$about_me['github_link']?>"><i class="fab fa-github"></i></a>
                    <a href="<?=$about_me['linkedin_link']?>"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>
              
            <!-- php code for about me -->

           <!-- you can find about me query  in side view part -->

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 style="font-size: 3em;" class="wow fadeInUp" data-wow-delay="0.4s">I am <?=$about_me['name']?> </h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?=$about_me['intro']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <li><a href="<?=$about_me['fb_link']?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?=$about_me['twitter_link']?>"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?=$about_me['linkedin_link']?>"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="<?=$about_me['github_link']?>"><i class="fab fa-github"></i></a></li>
                                    </ul>
                                </div>
                                <a href="cv.pdf" class="btn wow fadeInUp" data-wow-delay="1s" download>Download CV</a>

                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="admin/image/profile/<?=$about_me['photo']?>" alt="" style=" max-width: 500px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="front_end_assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                            <script src="https://static-bundles.visme.co/visme-embed.js"></script><div class="visme_d" data-title="Untitled Project" data-url="mx8ed8nd-untitled-project-2" data-w="635" data-full-h="false" data-h="434" data-domain="my"></div><p style="width:142px !important;border-radius:3px !important;padding:3px !important;font-size:12px !important;font-family:Arial, sans-serif !important;color:#314152 !important;white-space:nowrap !important"></p>                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p><?=$about_me['details']?></p>
                                <h3>Education:</h3>
                            </div>

                          


                            <!-- Education Item -->

                            <!-- php code for education -->

                            <?php 
                            $education_query = $dbcon->query("SELECT * FROM education_informations");
                            foreach ($education_query as $education) {
                            ?>





                            <div class="education">
                                <div class="year"><?=$education['year']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$education['degree_name']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$education['progressbar']?>%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end foreach -->
                          <?php } ?>
                            <!-- End Education Item -->
                            
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->

            <!-- php code for services area -->

            <?php

            $services_query = $dbcon->query("SELECT * FROM services ORDER BY id DESC LIMIT 6");

            ?>

            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">

              <!-- foreach code -->

              <?php
               foreach ($services_query as $service) {
                
              ?>

						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?=$service['icon']?>"></i>
								<h3><?=$service['title']?></h3>
								<p><?=$service['some_text']?></p>
							</div>
						</div>

            <!-- foreach end -->
          <?php } ?>
						
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2 style="color:white;">My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">

            <!-- php code for my best works -->
                    <?php
                      $my_best_works_query = $dbcon->query("SELECT * FROM my_best_works ORDER BY id DESC LIMIT 6");
                      foreach($my_best_works_query as $row){
                    ?>

                      <div class="col-lg-4 col-md-6 pitem">
                      <div class="speaker-box">
      								<div class="speaker-thumb">
      									<img src="admin/image/my_best_works/<?=$row['photo']?>" alt="img" >
      								</div>
      								<div class="speaker-overlay">
      									<span><?=$row['catagory']?></span>
      									<h4><a href="#"><?=$row['works_name']?></a></h4>
      									<a href="portfolio-single.html" class="arrow-btn">More information <span></span></a>
      								</div>
      							</div>
                  </div>

                  <!-- foreach end -->
                <?php } ?>

                </div>
        </div>
    </section>
            <!-- services-area-end -->


            <!-- fact-area -->

          <!-- php code for fact area -->
          <?php 
            $fact_query = $dbcon -> query("SELECT * FROM stastistics");
            $fact_information = $fact_query->fetch_assoc();

          ?>

            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-award"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$fact_information['feature_item']?> </span></h2>
                                        <span>Feature Item</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-like"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$fact_information['active_products']?></span></h2>
                                        <span>Active Products</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-event"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$fact_information['experience']?></span></h2>
                                        <span>Year Experience</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-woman"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$fact_information['clients']?></span></h2>
                                        <span>Our Clients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->



            <!-- testimonial-area -->

             <!-- php code -->
            <?php 
              $testimonial_query = $dbcon->query("SELECT * FROM testimonials");
            ?>

            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2 style="color:white;">Happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">


                              <!-- php code-forech for testimonial -->
                              <?php foreach($testimonial_query as $row){ ?>

                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="width:100px;height: 100px;border-radius: 50%;" src="admin/image/customers/<?=$row['photo']?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?=$row['customer_comment']?><span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?=$row['customer_name']?></h5>
                                            <span><?=$row['customer_desegnation']?></span>
                                        </div>
                                    </div>
                                </div>

                  <!-- php code-forech end -->
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        
                      <!-- php code for add logo -->
                      <?php 
                      $logo_query = $dbcon->query("SELECT * FROM logo ORDER BY id DESC");
                      if($logo_query->num_rows>= 6){
                      foreach ($logo_query as $logo) {
                        
                      
                      ?>


                        <div class="col-xl-2">
                            <div class="single-brand ">
                                <img  src="admin/image/logo/<?=$logo['photo']?>" alt="img" width='100'>
                            </div>
                        </div>
                      <?php 
                  } 
                } else{
                    echo "Require six logo";
                }
                  ?>
                        
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">

                       
               <!-- contact information query in side view part -->
                        

                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p><?=$contact_information['small_text']?></p>
                                <h5>OFFICE IN : <span><?=$contact_information['office']?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?=$contact_information['address']?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?=$contact_information['phone']?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>E-mail :</span><?=$contact_information['email']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <!-- contact information area end -->

                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="guest_message.php" method="post">

                                  <!-- message send error  -->

                                  <?php if(isset($_SESSION['guest_message_error'])) { ?>
                                    <div class="alert alert-danger">
                                      <?=$_SESSION['guest_message_error']?>
                                    </div>
                                  <?php }
                                  // unset error message

                                  unset($_SESSION['guest_message_error']);
                                  ?>
                                  <!-- error end -->

                                  <!-- message send success -->

                                  <?php if(isset($_SESSION['message_send'])) { ?>
                                    <div class="alert alert-success">
                                      <?=$_SESSION['message_send']?>
                                    </div>
                                  <?php }
                                  // unset success message

                                  unset($_SESSION['message_send']);
                                  ?>

                                  <!-- end alert -->

                                    <input type="text" placeholder="your name *" name='guest_name'>
                                    <input type="email" placeholder="your email *" name='guest_email'>
                                    <textarea name="guest_message" id="message" placeholder="your message *"></textarea>
                                    <button class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Theekshana Nadun</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->
        
        
        
        
<!-- Add this to your landing page -->


<div class="chat-widget-container">
  <button class="chat-toggle-btn" id="chatToggleBtn">💬</button>
  <div class="chat-widget" id="chatWidget" style="display: none;">
    <div class="chat-container">
      <div class="chat-header">AI Theekshana</div>
      <div class="chat-messages" id="chatMessages"></div>
      <div class="chat-input-container">
        <input type="text" class="chat-input" id="chatInput" placeholder="Type your message...">
        <button class="chat-send-btn" id="chatSendBtn">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="22" y1="2" x2="11" y2="13"></line>
      <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
    </svg>
  </button>      </div>
    </div>
  </div>
</div>

<script>
  const chatToggleBtn = document.getElementById('chatToggleBtn');
  const chatWidget = document.getElementById('chatWidget');
  const chatInput = document.getElementById('chatInput');
  const chatSendBtn = document.getElementById('chatSendBtn');
  const chatMessages = document.getElementById('chatMessages');
  const WEBHOOK_URL = 'https://cloud.activepieces.com/api/v1/webhooks/dTUq0oclhDht5fsqu7r5n/sync';

  document.addEventListener('DOMContentLoaded', () => {
    addMessage("Hello I am Theekshana ! How can I help you today?", false);
  });

  chatToggleBtn.addEventListener('click', () => {
    if (chatWidget.style.display === 'none') {
      chatWidget.style.display = 'block';
      chatToggleBtn.textContent = '✖';
      chatInput.focus();
    } else {
      chatWidget.style.display = 'none';
      chatToggleBtn.textContent = '💬';
    }
  });

  function addLoadingIndicator() {
    const loadingDiv = document.createElement('div');
    loadingDiv.className = 'message bot-message';
    loadingDiv.innerHTML = '<span class="loading-dots"></span>';
    loadingDiv.id = 'loadingIndicator';
    chatMessages.appendChild(loadingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function removeLoadingIndicator() {
    const loadingDiv = document.getElementById('loadingIndicator');
    if (loadingDiv) {
      loadingDiv.remove();
    }
  }

  async function sendMessage(message) {
    try {
      const response = await fetch(WEBHOOK_URL, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          message: message,
          timestamp: new Date().toISOString()
        })
      });

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const rawText = await response.text();
      const data = JSON.parse(rawText);

      if (data && data.status === 200 && data.body) {
        return data.body;
      }

      return 'Sorry, I could not understand the response';
    } catch (error) {
      console.error('Error details:', error);
      return 'Sorry, I encountered an error. Please try again later.';
    }
  }

   function addMessage(message, isUser = false) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
    
    const formattedMessage = message
      .replace(/\n\n/g, '</p><p>')
      .replace(/\n/g, '<br>')
      .replace(/([.!?])\s*/g, '$1<br><br>')
      .replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank">$1</a>');

    if (!formattedMessage.startsWith('<p>')) {
      messageDiv.innerHTML = `<p>${formattedMessage}</p>`;
    } else {
      messageDiv.innerHTML = formattedMessage;
    }
    
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }


  chatSendBtn.addEventListener('click', async () => {
    const message = chatInput.value.trim();
    if (message) {
      addMessage(message, true);
      chatInput.value = '';
      chatInput.focus();
      
      addLoadingIndicator();
      const response = await sendMessage(message);
      removeLoadingIndicator();
      addMessage(response);
    }
  });

  chatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      chatSendBtn.click();
    }
  });
</script>






		<!-- JS here -->
        <script src="front_end_assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="front_end_assets/js/popper.min.js"></script>
        <script src="front_end_assets/js/bootstrap.min.js"></script>
        <script src="front_end_assets/js/isotope.pkgd.min.js"></script>
        <script src="front_end_assets/js/one-page-nav-min.js"></script>
        <script src="front_end_assets/js/slick.min.js"></script>
        <script src="front_end_assets/js/ajax-form.js"></script>
        <script src="front_end_assets/js/wow.min.js"></script>
        <script src="front_end_assets/js/aos.js"></script>
        <script src="front_end_assets/js/jquery.waypoints.min.js"></script>
        <script src="front_end_assets/js/jquery.counterup.min.js"></script>
        <script src="front_end_assets/js/jquery.scrollUp.min.js"></script>
        <script src="front_end_assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="front_end_assets/js/jquery.magnific-popup.min.js"></script>
        <script src="front_end_assets/js/plugins.js"></script>
        <script src="front_end_assets/js/main.js"></script>
    </body>

</html>
