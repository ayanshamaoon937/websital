<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Websital — Web Development, App Development, UI/UX Design, Game Development, Digital Marketing & Amazon Virtual Assistant | Perth WA</title>
    <meta name="description" content="Contact Websital for comprehensive digital services: web development, mobile app development, UI/UX design, game development, digital marketing, and Amazon virtual assistant services. Perth-based digital agency.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" href="assets/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="assets/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Websital" />
    <link rel="manifest" href="assets/img/favicon/site.webmanifest" />

    <!-- CSS here -->
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/atropos.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
<link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- CSS here -->
    <!-- CSS here -->

    <style>
        /* Make services dropdown match input/textarea appearance */
        .tp-contact-form-input .nice-select { width: 100%; }
        /* Custom select (no native opener) */
        .tp-contact-us-wrap .tp-contact-form-input .custom-select { 
            position: relative !important; 
            width: 100% !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .cs-trigger {
            background: #302F32 !important;
            border: 1px solid #302F32 !important;
            color: var(--tp-common-white) !important;
            height: 72px !important;
            line-height: 72px !important;
            padding: 0 56px 0 24px !important;
            border-radius: 12px !important;
            cursor: pointer !important;
            user-select: none !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            position: relative !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .cs-trigger::after {
            content: '▼' !important;
            font-size: 12px !important;
            color: var(--tp-common-white) !important;
            transition: transform 0.3s ease !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .custom-select.open .cs-trigger::after {
            transform: rotate(180deg) !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .cs-list {
            position: absolute !important;
            left: 0 !important; 
            right: 0 !important;
            background: #1B1B1D !important;
            border: 1px solid rgba(255,255,255,0.08) !important;
            border-radius: 12px !important;
            margin-top: 8px !important;
            padding: 8px 0 !important;
            display: none !important;
            z-index: 9999 !important;
            max-height: 0 !important;
            overflow: hidden !important;
            opacity: 0 !important;
            visibility: hidden !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important;
            top: 100% !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .custom-select.open .cs-list { 
            display: block !important;
            max-height: 280px !important;
            opacity: 1 !important;
            visibility: visible !important;
            overflow: visible !important;
        }
        
        /* More specific selector to ensure it overrides */
        #service-select.custom-select.open .cs-list {
            display: block !important;
            max-height: 280px !important;
            opacity: 1 !important;
            visibility: visible !important;
            overflow: visible !important;
        }
        
        /* Force override any conflicting styles */
        .custom-select.open .cs-list {
            display: block !important;
            max-height: 280px !important;
            opacity: 1 !important;
            visibility: visible !important;
            overflow: visible !important;
        }
        
        /* Even more specific */
        .tp-contact-us-wrap .tp-contact-form-input .custom-select.open .cs-list,
        .tp-contact-us-wrap .tp-contact-form-input #service-select.custom-select.open .cs-list {
            display: block !important;
            max-height: 280px !important;
            opacity: 1 !important;
            visibility: visible !important;
            overflow: visible !important;
        }
        
        /* Nuclear option - override everything */
        .custom-select.open .cs-list,
        #service-select.open .cs-list,
        .tp-contact-us-wrap .custom-select.open .cs-list,
        .tp-contact-form-input .custom-select.open .cs-list {
            display: block !important;
            max-height: 280px !important;
            opacity: 1 !important;
            visibility: visible !important;
            overflow: visible !important;
            height: auto !important;
            min-height: 50px !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .custom-select.open .cs-trigger {
            border-color: rgba(255,255,255,0.2) !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .cs-option {
            color: var(--tp-common-white) !important;
            padding: 12px 16px !important;
            cursor: pointer !important;
            transition: background-color 0.2s ease !important;
        }
        .tp-contact-us-wrap .tp-contact-form-input .cs-option:hover { 
            background: #262628 !important; 
        }
        .websital-light .tp-contact-us-wrap .tp-contact-form-input .cs-trigger {
            background: #fff;
            border-color: rgb(237, 237, 245);
            color: var(--tp-common-black);
        }
        .websital-light .tp-contact-us-wrap .tp-contact-form-input .custom-select:after {
            border-color: var(--tp-common-black);
        }
        .contact-toast{
            position: fixed;
            left: 50%;
            bottom: 40px;
            transform: translateX(-50%);
            color: #fff;
            padding: 14px 18px;
            border-radius: 10px;
            z-index: 9999;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        
        .contact-toast.success {
            background: rgba(40, 167, 69, 0.95);
            border: 1px solid rgba(40, 167, 69, 0.3);
        }
        
        .contact-toast.error {
            background: rgba(220, 53, 69, 0.95);
            border: 1px solid rgba(220, 53, 69, 0.3);
        }
        
    </style>

</head>

<body class="tp-magic-cursor" data-bg-color="#0E0F11">

    <!-- Begin magic cursor -->
    <div id="magic-cursor" class="cursor-bg-red-2">
        <div id="ball"></div>
    </div>
    <!-- End magic cursor -->

    <!-- preloader -->

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->
    <!-- preloader end  -->

    <!-- back to top start -->
    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->
    <!-- back to top end -->

    <!-- offcanvas start -->
    <!-- tp-offcanvus-area-start -->

    <?php include_once "includes/offcanvas.php" ?>
    <div class="body-overlay"></div>
    <!-- tp-offcanvus-area-end -->
    <!-- offcanvas end -->

    <!-- header area start -->

    <!-- header area start -->
    <div id="header-sticky" class="tp-header-area tp-header-inner-style header-inner-white tp-header-ptb tp-header-blur sticky-black-bg header-transparent mt-30">
        <div class="container container-1750">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-6 col-6">
                    <div class="tp-header-logo">
                        <a href="index">
                            <img data-width="120" class="logo-white" src="assets/img/logo/logo-white.png" alt="">
                            <img data-width="120" class="logo-black d-none" src="assets/img/logo/logo-white.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 d-none d-xl-block">
                    <div class="tp-header-box text-center">
                        <div class="tp-header-menu tp-header-dropdown dropdown-black-bg">
                            <?php include_once "includes/navbar.php"?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-6">
                    <div class="tp-header-right text-end">
                        <div class="tp-header-14-bar-wrap ml-20">
                            <button class="tp-header-8-bar tp-offcanvas-open-btn">
                                <span>Menu</span>
                                <span>
                                    <svg width="24" height="8" viewBox="0 0 24 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0H14V1.5H0V0Z" fill="currentcolor" />
                                        <path d="M0 6H24V7.5H0V6Z" fill="currentcolor" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->

    <!-- header area end -->


    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>

                <!-- hero area start -->
                <div class="tp-contact-us-ptb p-relative">
                    <div class="tp-career-shape-1">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="123" height="130" viewBox="0 0 123 130" fill="none">
                                <path d="M58.2803 1.15449C63.3023 14.3017 71.049 54.3533 48.1082 67.0973C36.1831 73.4283 11.7107 77.3064 2.37778 43.9355C-1.14293 31.3468 9.61622 20.8908 32.0893 28.8395C45.055 33.4255 76.4207 44.0467 90.5787 70.0771C98.0511 83.8154 104.166 111.84 99.1745 129.671M99.1745 129.671C100.942 121.014 108.128 104.495 122.737 107.673M99.1745 129.671C100.181 123.978 97.0522 110.014 76.485 99.698M75.3644 33.2431C80.479 35.6688 96.6446 46.4742 101.81 64.2891" stroke="white" stroke-width="1.5" />
                            </svg></span>
                    </div>
                    <div class="container container-1230">
                        <div class="ar-about-us-4-hero-ptb">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="tp-contact-us-heading tp_fade_anim" data-delay=".3">
                                        <div class="ar-about-us-4-title-box d-flex align-items-center mb-20">
                                            <span class="tp-section-subtitle pre text-white tp_fade_anim">contact us</span>
                                            <div class="ar-about-us-4-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                    <rect y="4" width="80" height="1" fill="#fff" />
                                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="tp-career-title text-white pb-30">Your digital
                                            <span class="shape-1"><img src="assets/img/about-us/about-us-4-shape-2.webp" alt=""></span> <br>journey starts here
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <div class="tp-faq-text tp_fade_anim">
                                        <p class="text-white m-0">Websital helps you build, market, and scale your digital presence — web development, mobile apps, UI/UX design, game development, digital marketing, and Amazon virtual assistant services.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-contact-us-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="tp-contact-us-text smooth">
                                        <a href="#down">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewBox="0 0 15 21" fill="none">
                                                    <rect x="6.25781" width="1.5" height="21" fill="#F5F7F5" />
                                                    <path d="M14.1641 13.6257C10.28 13.6257 7.13714 16.9239 7.13714 21" stroke="#F5F7F5" stroke-width="1.5" stroke-miterlimit="10" />
                                                    <path d="M7.13672 21C7.13672 16.9239 3.99384 13.6257 0.109797 13.6257" stroke="#F5F7F5" stroke-width="1.5" stroke-miterlimit="10" />
                                                </svg> Scroll to explore</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tp-contact-us-text d-none d-md-block text-md-end">
                                        <p>See in Map our Office</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- hero area end -->

                <!-- contact form area start -->
                <div id="down" class="tp-contact-us-form-ptb pt-60 pb-120">
                    <div class="container container-1750">
                        <div class="tp-contact-us-form-wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="tp-contact-us-map p-relative">
                                        <div class="tp-contact-map-icon-box">
                                            <div class="tp-contact-map-icon">
                                                <span><img src="assets/img/contact/map-icon.svg" alt=""></span>
                                            </div>
                                        </div>
                                        <iframe src="https://www.google.com/maps?q=Bibra%20Lake,%20Perth,%20WA,%20Australia%20Western%20Australia&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tp-contact-us-wrap">
                                        <h4 class="tp-contact-us-title mb-55">Send a Message</h4>
                                        <form id="contact-form" action="phpmailer/sendmail.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="tp-contact-form-input mb-20">
                                                        <label>Full Name*</label>
                                                        <input placeholder="Enter your name" name="name" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="tp-contact-form-input mb-20">
                                                        <label>Email*</label>
                                                        <input name="email" type="email" placeholder="Enter your Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="tp-contact-form-input mb-20">
                                                        <label>Phone Number*</label>
                                                        <input name="phone_number" type="text" placeholder="Enter your Subject" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="tp-contact-form-input mb-20">
                                                        <label>Service*</label>
                                                        <div class="custom-select" id="service-select">
                                                            <div class="cs-trigger" data-placeholder="Select a service">Select a service</div>
                                                            <div class="cs-list">
                                                                <div class="cs-option" data-value="Web Development">Web Development</div>
                                                                <div class="cs-option" data-value="App Development">App Development</div>
                                                                <div class="cs-option" data-value="UI/UX & Graphics">UI/UX & Graphics</div>
                                                                <div class="cs-option" data-value="Game Development">Game Development</div>
                                                                <div class="cs-option" data-value="Digital Marketing">Digital Marketing</div>
                                                                <div class="cs-option" data-value="Amazon Virtual Assistant">Amazon Virtual Assistant</div>
                                                            </div>
                                                            <input type="hidden" name="service" required>
                                                        </div>
                                                        <!-- Test button for debugging -->
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="tp-contact-form-input mb-20">
                                                        <label>Project Description*</label>
                                                        <textarea  name="project_description" rows="5" placeholder="Describe your project description" required></textarea>
                                                    </div>
                                                    <div class="tp-contact-form-btn">
                                                        <button class="w-100 mb-4" type="submit"><span>
                                                                <span class="text-1">Send Message</span>
                                                                <span class="text-2">Send Message</span>
                                                            </span>
                                                        </button>
                                                        <p class="ajax-response h4 mb-0 text-white"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact form area end -->

                

            </main>

            <?php include_once "includes/footer.php"?>

        </div>
    </div>



    <!-- JS here -->


    <!-- JS here -->


    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/bootstrap-bundle.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/three.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/scroll-magic.js"></script>
    <script src="assets/js/hover-effect.umd.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/parallax-slider.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/purecounter.js"></script>
    <script src="assets/js/isotope-pkgd.js"></script>
    <script src="assets/js/imagesloaded-pkgd.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/Observer.min.js"></script>
    <script src="assets/js/splitting.min.js"></script>
    <script src="assets/js/webgl.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/atropos.js"></script>
    <script src="assets/js/slider-active.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/tp-cursor.js"></script>
    <script src="assets/js/portfolio-slider-1.js"></script>
    <script type="module" src="assets/js/distortion-img.js"></script>
    <script type="module" src="assets/js/skew-slider/index.js"></script>
    <script type="module" src="assets/js/img-revel/index.js"></script>

    <!-- Contact Form Handler -->
    <script>
    // Wait for everything to load and ensure jQuery is ready
    $(document).ready(function() {
        setTimeout(function() {
            initCustomSelect();
            initFormHandler();
        }, 500);
    });
    
    // Fallback if jQuery is not available
    window.addEventListener('load', function() {
        setTimeout(function() {
            if (typeof $ === 'undefined') {
                initCustomSelect();
                initFormHandler();
            }
        }, 1000);
    });
    
    // Additional fallback to ensure dropdown starts closed
    window.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const customSelect = document.getElementById('service-select');
            if (customSelect) {
                const list = customSelect.querySelector('.cs-list');
                if (list) {
                    // Multiple attempts to remove open class
                    customSelect.classList.remove('open');
                    customSelect.className = customSelect.className.replace(/open/g, '').trim();
                    
                    list.style.display = 'none';
                    list.style.opacity = '0';
                    list.style.visibility = 'hidden';
                    list.style.maxHeight = '0';
                    list.style.overflow = 'hidden';
                    
                    console.log('Dropdown force-closed on DOM ready, classes:', customSelect.className);
                }
            }
        }, 100);
    });
    
    function initCustomSelect() {
        // Custom select functionality
        const customSelect = document.getElementById('service-select');
        
        if (customSelect) {
            const trigger = customSelect.querySelector('.cs-trigger');
            const list = customSelect.querySelector('.cs-list');
            const options = customSelect.querySelectorAll('.cs-option');
            const hiddenInput = customSelect.querySelector('input[type="hidden"]');
            
            console.log('Custom select elements found:', {
                customSelect: !!customSelect,
                trigger: !!trigger,
                list: !!list,
                options: options.length,
                hiddenInput: !!hiddenInput
            });
            
            if (trigger && list && options.length > 0 && hiddenInput) {
                // Ensure dropdown starts closed - multiple attempts
                customSelect.classList.remove('open');
                customSelect.classList.remove('open'); // Double remove
                customSelect.className = customSelect.className.replace(/open/g, '').trim();
                
                // Force close the dropdown with inline styles
                list.style.display = 'none';
                list.style.opacity = '0';
                list.style.visibility = 'hidden';
                list.style.maxHeight = '0';
                list.style.overflow = 'hidden';
                
                // Verify the class is actually removed
                setTimeout(() => {
                    customSelect.classList.remove('open');
                    console.log('Final class check:', customSelect.className);
                }, 10);
                
                console.log('Dropdown initialized as closed');
                
                // Single toggle function to avoid conflicts
                function toggleDropdownState() {
                    // Force remove open class first to ensure clean state
                    customSelect.classList.remove('open');
                    
                    // Check actual visibility based on computed styles
                    const computedStyle = window.getComputedStyle(list);
                    const isActuallyVisible = computedStyle.display !== 'none' && 
                                            parseFloat(computedStyle.opacity) > 0 && 
                                            computedStyle.visibility !== 'hidden';
                    
                    console.log('Current state:', isActuallyVisible ? 'open' : 'closed');
                    console.log('Computed styles:', {
                        display: computedStyle.display,
                        opacity: computedStyle.opacity,
                        visibility: computedStyle.visibility,
                        maxHeight: computedStyle.maxHeight
                    });
                    
                    if (isActuallyVisible) {
                        // Close dropdown
                        console.log('Closing dropdown...');
                        customSelect.classList.remove('open');
                        list.style.display = 'none';
                        list.style.opacity = '0';
                        list.style.visibility = 'hidden';
                        list.style.maxHeight = '0';
                        list.style.overflow = 'hidden';
                    } else {
                        // Open dropdown
                        console.log('Opening dropdown...');
                        customSelect.classList.add('open');
                        list.style.cssText = `
                            display: block !important;
                            opacity: 1 !important;
                            visibility: visible !important;
                            max-height: 280px !important;
                            overflow: visible !important;
                            height: auto !important;
                            min-height: 50px !important;
                            position: absolute !important;
                            top: 100% !important;
                            left: 0 !important;
                            right: 0 !important;
                            z-index: 9999 !important;
                        `;
                    }
                }
                
                // Toggle dropdown - only one handler to avoid conflicts
                trigger.addEventListener('click', function(e) {
                    console.log('Trigger clicked!');
                    e.preventDefault();
                    e.stopPropagation();
                    toggleDropdownState();
                });
                
                // Select option
                options.forEach((option, index) => {
                    option.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const value = this.getAttribute('data-value');
                        trigger.textContent = value;
                        hiddenInput.value = value;
                        customSelect.classList.remove('open');
                    });
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!customSelect.contains(e.target)) {
                        customSelect.classList.remove('open');
                    }
                });
                
            } else {
                console.error('Missing dropdown elements');
            }
        } else {
            console.error('Custom select not found');
        }
    }
    
    // Direct toggle function for onclick attribute
    function toggleDropdown() {
        console.log('Direct toggle function called');
        const customSelect = document.getElementById('service-select');
        const list = customSelect.querySelector('.cs-list');
        
        if (customSelect && list) {
            const isOpen = customSelect.classList.contains('open');
            console.log('Direct function - Current state:', isOpen ? 'open' : 'closed');
            
            if (isOpen) {
                // Close dropdown
                console.log('Direct function closing dropdown...');
                customSelect.classList.remove('open');
                list.style.display = 'none';
                list.style.opacity = '0';
                list.style.visibility = 'hidden';
                list.style.maxHeight = '0';
                list.style.overflow = 'hidden';
            } else {
                // Open dropdown
                console.log('Direct function opening dropdown...');
                customSelect.classList.add('open');
                list.style.cssText = `
                    display: block !important;
                    opacity: 1 !important;
                    visibility: visible !important;
                    max-height: 280px !important;
                    overflow: visible !important;
                    height: auto !important;
                    min-height: 50px !important;
                    position: absolute !important;
                    top: 100% !important;
                    left: 0 !important;
                    right: 0 !important;
                    z-index: 9999 !important;
                `;
            }
        }
    }
    
    // Test function
    function testDropdown() {
        const customSelect = document.getElementById('service-select');
        if (customSelect) {
            customSelect.classList.toggle('open');
            console.log('Dropdown toggled. Classes:', customSelect.className);
            
            // Check if cs-list is visible
            const csList = customSelect.querySelector('.cs-list');
            if (csList) {
                const styles = window.getComputedStyle(csList);
                console.log('cs-list styles:', {
                    display: styles.display,
                    opacity: styles.opacity,
                    visibility: styles.visibility,
                    maxHeight: styles.maxHeight,
                    position: styles.position,
                    overflow: styles.overflow
                });
                
                // Force visibility if open
                if (customSelect.classList.contains('open')) {
                    csList.style.cssText = `
                        display: block !important;
                        opacity: 1 !important;
                        visibility: visible !important;
                        max-height: 280px !important;
                        overflow: visible !important;
                        height: auto !important;
                        min-height: 50px !important;
                        position: absolute !important;
                        top: 100% !important;
                        left: 0 !important;
                        right: 0 !important;
                        z-index: 9999 !important;
                    `;
                    console.log('Forced visibility applied with cssText');
                }
            }
        }
    }
    
    function initFormHandler() {
        const form = document.getElementById('contact-form');
        if (!form) {
            console.error('Form not found');
            return;
        }
        
        const submitBtn = form.querySelector('button[type="submit"]');
        const responseDiv = form.querySelector('.ajax-response');
        
        // Get dropdown elements for form reset
        const customSelect = document.getElementById('service-select');
        const trigger = customSelect ? customSelect.querySelector('.cs-trigger') : null;
        const hiddenInput = customSelect ? customSelect.querySelector('input[type="hidden"]') : null;
        
        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Disable submit button
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span><span class="text-1">Sending...</span><span class="text-2">Sending...</span></span>';
            
            // Clear previous messages
            responseDiv.innerHTML = '';
            
            // Prepare form data
            const formData = new FormData(form);
            
            // Send AJAX request
            fetch('phpmailer/sendmail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showToast(data.message, 'success');
                    
                    // Reset form
                    form.reset();
                    
                    // Reset dropdown
                    if (trigger && hiddenInput) {
                        trigger.textContent = 'Select a service';
                        hiddenInput.value = '';
                        customSelect.classList.remove('open');
                    }
                } else {
                    // Show error message
                    showToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Sorry, there was an error sending your message. Please try again later.', 'error');
            })
            .finally(() => {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span><span class="text-1">Send Message</span><span class="text-2">Send Message</span></span>';
            });
        });
        
        function showToast(message, type) {
            // Remove any existing toasts
            const existingToasts = document.querySelectorAll('.contact-toast');
            existingToasts.forEach(toast => toast.remove());
            
            const toast = document.createElement('div');
            toast.className = `contact-toast ${type}`;
            toast.textContent = message;
            
            document.body.appendChild(toast);
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateX(-50%) translateY(20px)';
                    setTimeout(() => {
                        if (toast.parentNode) {
                            toast.parentNode.removeChild(toast);
                        }
                    }, 300);
                }
            }, 5000);
        }
    }
    </script>

    <!-- JS here -->

    <!-- JS here -->


</body>

</html>
