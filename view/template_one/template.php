<?php
// Template Name: Template One
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo strip_tags(get_the_title()); ?> - <?php echo $site_title; ?></title>
    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/x-icon" />
    <meta property="og:title" content="<?php echo strip_tags(get_the_title()); ?> - <?php echo $site_title; ?>">
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars('https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>">
    <meta name="twitter:title" content="<?php echo strip_tags(get_the_title()); ?> - <?php echo $site_title; ?>">
    <meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
    <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <meta name="twitter:card" content="<?php echo strip_tags(get_the_title()); ?> - <?php echo $site_title; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo plugins_url('assets/dist/css/app.css', __FILE__); ?>">
    <script>var pageTitle = "<?php echo strip_tags(get_the_title()); // title ?> - <?php echo $site_title; ?>";</script>
</head>

<body>
    <main id="main" class=" mx-auto p-2 md:p-4">
        <div class="flex justify-center"><a href="<?php echo get_home_url(); ?>"><img id="logo" class="max-h-52" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo $site_title; ?>"></a><a target="_blank" href="https://dailymuktisamachar.com/wp-content/uploads/2024/11/QR-DMS.jpg"><img id="logo" class="max-h-52" src="https://dailymuktisamachar.com/wp-content/uploads/2024/11/QR-DMS.jpg" alt="QR Code"></a></div>
        <div class="flex flex-row gap-2 text-white box-border justify-around max-h-8 overflow-hidden">
            <div class="px-2 my-1 bg-blue-500"><a href="<?php echo $facebook_link; ?>" target="_blank"><?php echo $facebook_link; ?></a></div>
            <div class="px-2 my-1 bg-green-500"><a href="<?php echo $website_link; ?>" target="_blank"><?php echo $website_link; ?></a></div>
            <div class="px-2 my-1 bg-red-500"><a href="mailto:<?php echo $mail_link; ?>" target="_blank"><?php echo $mail_link; ?></a></div>
        </div>
        <div class="flex justify-around bg-black text-white box-border">
            <div id="banglaDayString" class="flex-1 font-bold bg-yellow-300 text-black py-1.5 px-2 border border-l border-white inline-block"></div>
            <div id="banglaDateString" class="flex-1 font-bold py-1.5 px-2 border border-l border-white inline-block"></div>
            <div id="englishDateString" class="flex-1 font-bold py-1.5 px-2 border border-l border-white inline-block"></div>
            <div id="arabicDateString" class="flex-1 font-bold py-1.5 px-2 border border-l border-white inline-block"></div>
        </div>
        <h1 id="title" class="text-black text-xl md:text-4xl font-bold text-center my-8"><?php echo $post_title; ?></h1>
        <div class="columns-2 print:columns-2 text-sm md:text-base">
            <h3 class="font-bold text-lg flex pb-2"><svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg><?php echo $site_title; ?>: <?php echo $post_date; ?></h3><img class="w-full print:img-fit" src="<?php echo $post_thumbnail_url; ?>" alt="<?php echo $post_title; ?>"><?php echo $post_content; ?>
        </div>
        <div id="contact" class="pt-8 text-center text-sm">
            <hr><?php echo $footer_text; ?>
        </div>
    </main>
    <footer id="footer" class="flex mx-auto gap-3 justify-center py-3">
        <button id="printBtn" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">প্রিন্ট করুন</button>
        <button id="download" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">সংরক্ষণ করুন</button>
        <button id="goBackButton" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">পিছনে</button>
    </footer>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/AhmedMRaihan/BanglaDateJS@master/src/buetDateTime.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="<?php echo plugins_url('assets/dist/js/app.js', __FILE__); ?>"></script>
</body>

</html>