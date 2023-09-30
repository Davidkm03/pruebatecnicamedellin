<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Reset margins and padding */
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        *, *::before, *::after {
            box-sizing: inherit;
        }
        .menu ul {
    list-style-type: none;  /* Removes bullet points */
    margin: 0;              /* Removes default margins */
    padding: 0;             /* Removes default padding */
    display: flex;          /* Makes list items inline */
    justify-content: center; /* Centers menu items */
        }

        .menu ul li {
    margin: 0 10px;         /* Space between menu items */
        }

        .menu ul li a {
    text-decoration: none;  /* Removes default link underline */
        }

        .container {
            width: 100%;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-section {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo a{
            color: #CC923B;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 25px;
            text-decoration: none;
        }
        .menu a{
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 17px;
            text-decoration: none;
        }
        .phone {
            color: #CC923B;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            text-decoration: none;
        }

        .phone p:first-child {
            font-weight: bold;
        }

        .burger-menu {
            display: none; /* Initially hidden */
            flex-direction: column;
            justify-content: space-between;
            height: 24px;
            cursor: pointer;
        }

        .burger-menu div {
            width: 30px;
            height: 4px;
            background-color: #CC923B;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 0; /* Remove padding on mobile */
                flex-direction: row;
            }

            .header-section {
                flex-direction: row; /* Logo on the left, burger on the right */
                align-items: center;
                width: 100%;
            }

            .logo, .burger-menu {
                width: 50%; /* Each takes up half the width */
            }

            .menu {
                display: none; /* Hide the regular menu by default */
                width: 100%; /* Make it full width */
                text-align: center; /* Center the menu items */
                margin-top: 15px; /* Space between logo and menu */
            }

            .menu.active {
                display: block; /* Show menu when active */
            }

            .phone {
                display: none; /* Hide the phone section */
            }

            .burger-menu {
                display: flex; /* Show burger menu */
                justify-content: flex-end; /* Align it to the right */
                align-items: center; /* Center align vertically */
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header style="background-color: #101010; padding: 10px 0;">
    <div class="container">
        <div class="header-section">
            <!-- Logo Section -->
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    Cinemax
                </a>
            </div>

            <!-- Burger Menu for Mobile -->
            <div class="burger-menu" id="burgerMenu">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <!-- Menu Section -->
            <div class="menu" id="mobileMenu">
                <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div>

            <!-- Phone Section -->
            <div class="phone">
                <p>0124932818</p>
                <p>Information and Bron Service</p>
            </div>
        </div>
    </div>
    
    <script>
        // Simple JavaScript to toggle the menu on mobile
        document.getElementById('burgerMenu').addEventListener('click', function() {
            var menu = document.getElementById('mobileMenu');
            if (menu.classList.contains('active')) {
                menu.classList.remove('active');
            } else {
                menu.classList.add('active');
            }
        });
    </script>

</header>
