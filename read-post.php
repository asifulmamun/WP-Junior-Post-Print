<?php
    /*
        Template Name: Custom Single Page
    */

    $custom_logo_id = get_theme_mod('custom_logo');
    $logo_url = '';
    if ($custom_logo_id) {
        $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($custom_logo) {
            $logo_url = $custom_logo[0]; // URL of the custom logo
        }
    }
    $site_title = get_bloginfo('name'); // Site Title
    $logo_url = ($logo_url ? $logo_url : $site_title); // Logo
    $favicon_url = get_site_icon_url(); // favicon url
    $post_id = isset($_GET['post']) ? $_GET['post'] : '';


    // Function to convert English month name to Bangla
    function english_to_bangla_month($month) {
        $bangla_months = array(
            'January' => 'জানুয়ারি',
            'February' => 'ফেব্রুয়ারি',
            'March' => 'মার্চ',
            'April' => 'এপ্রিল',
            'May' => 'মে',
            'June' => 'জুন',
            'July' => 'জুলাই',
            'August' => 'আগস্ট',
            'September' => 'সেপ্টেম্বর',
            'October' => 'অক্টোবর',
            'November' => 'নভেম্বর',
            'December' => 'ডিসেম্বর'
        );

        return $bangla_months[$month];
    }

    // Function to convert English digits to Bangla numerals
    function english_to_bangla_number($number) {
        $english_numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $bangla_numbers = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        return str_replace($english_numbers, $bangla_numbers, $number);
    }


    if ($post_id):
        // Set up the post query
        $post_query = new WP_Query(array(
            'p' => $post_id, // Post ID to query
            'post_type' => 'post', // Post type
            'posts_per_page' => 1 // Number of posts to retrieve
        ));

        // Check if there are any posts
        if ($post_query->have_posts()):
            while ($post_query->have_posts()):

                $post_query->the_post();
                // Get post data
                $post_title = get_the_title();
                $post_content = get_the_content();
                $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Use 'full' to get the full size image URL
                $post_date = get_the_date(); // Get post date
                $post_time = get_the_time(); // Get post time


                // Convert date to Bangla
                $bangla_date = '';
                // Extract day, month, and year
                $day = date('d', strtotime($post_date));
                $english_month = date('F', strtotime($post_date));
                $year = english_to_bangla_number(date('Y', strtotime($post_date)));
                // Convert day to Bangla with leading zero
                $bangla_day = english_to_bangla_number($day); // Convert to Bangla numerals
                // Convert month to Bangla
                $bangla_month = english_to_bangla_month($english_month);
                // Format Bangla date
                $bangla_date .= $bangla_day . ' ' . $bangla_month . ', ' . $year;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo strip_tags(get_the_title()); // title ?> - <?php echo $site_title; ?></title>
    <link rel="icon" href="<?php echo esc_url( $favicon_url ); ?>" type="image/x-icon" />
    <meta property="og:title" content="<?php echo strip_tags(get_the_title()); // title ?> - <?php echo $site_title; ?>">
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars('https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>">
    <meta name="twitter:title" content="<?php echo strip_tags(get_the_title()); // title ?> - <?php echo $site_title; ?>">
    <meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
    <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <meta name="twitter:card" content="<?php echo strip_tags(get_the_title()); // title ?> - <?php echo $site_title; ?>">
    <link rel="stylesheet" href="<?php echo plugins_url('assets/dist/css/app.css', __FILE__); ?>">
</head>
<body>
    <main id="main" class="w-7/12 container mx-auto p-4">

        <div class="flex justify-center">
            <a href="<?php echo get_home_url(); ?>"><img id="logo" class="max-h-52" src="<?php echo ($logo_url ? $logo_url : 'https://dailymuktisamachar.com/wp-content/uploads/2024/02/DMS-Logo.png'); ?>" alt="<?php echo $site_title; ?>"></a>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-black text-white my-3">
            <div id="dayString" class="bg-yellow-300 text-center font-bold text-black py-1.5"></div>
            <div id="dateString" class="col-span-10 font-bold py-1.5"></div>
            <div></div>
        </div>

        <img class="w-full print:img-fit" src="<?php  echo $post_thumbnail_url; ?>" alt="<?php echo $post_title; ?>">
        <h1 id="title" class="text-red-500 text-4xl font-bold text-center my-8"><?php echo $post_title;?></h1>
        <div class="sm:columns-1 md:columns-2 print:columns-2">
            <h3 class="font-bold text-lg flex py-2">
                <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                <?php echo $site_title; ?>: <?php echo $bangla_date; ?>
            </h3>
            <?php echo $post_content; ?>
        </div>



    </main>

    <footer id="footer" class="flex mx-auto gap-3 justify-center w-full py-3">
        <button id="printBtn" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Print</button>
        <button id="goBackButton" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Back</button>
    </footer>

    <!-- https://github.com/AhmedMRaihan/BanglaDateJS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/AhmedMRaihan/BanglaDateJS@master/src/buetDateTime.js"></script>
    <script>
        // var customDate = new Date();
        var dayString = new buetDateConverter().convert("l");
        var dateString = new buetDateConverter().convert("j F, Y");
        document.getElementById('dayString').textContent = dayString;
        document.getElementById('dateString').textContent = dateString;
    </script>
    <script src="<?php echo plugins_url('assets/dist/js/app.js', __FILE__); ?>"></script>
</body>
</html>
<?php
            endwhile;
        else:
            // No posts found
            echo 'No posts found.';
        endif;
        // Restore original post data
        wp_reset_postdata();
    else:
        // No post ID provided
        echo 'No post ID provided.';
    endif;

?>
