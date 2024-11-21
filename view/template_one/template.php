<?php
    // Template Name: Template One
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
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo plugins_url('assets/dist/css/app.css', __FILE__); ?>">
</head>
<body>
    <main id="main" class=" mx-auto p-2 md:p-4">
        <div class="flex justify-center">
            <a href="<?php echo get_home_url(); ?>"><img id="logo" class="max-h-52" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo $site_title; ?>"></a>
			<a target="_blank" href="https://dailymuktisamachar.com/wp-content/uploads/2024/11/QR-DMS.jpg"><img id="logo" class="max-h-52" src="https://dailymuktisamachar.com/wp-content/uploads/2024/11/QR-DMS.jpg" alt="QR Code"></a>
        </div>

        <div class="flex flex-row gap-2 text-white box-border justify-around">
            <div class="px-2 my-1 bg-blue-500">
                <a href="<?php echo $facebook_link; ?>" target="_blank"><?php echo $facebook_link; ?></a>
            </div>
            <div class="px-2 my-1 bg-green-500">
                <a href="<?php echo $website_link; ?>" target="_blank"><?php echo $website_link; ?></a>
            </div>
            <div class="px-2 my-1 bg-red-500">
                <a href="mailto:<?php echo $mail_link; ?>" target="_blank"><?php echo $mail_link; ?></a>
            </div>
        </div>

        <div class="grid grid-cols-12 bg-black text-white box-border">
            <div id="banglaDayString" class="col-span-8 md:col-span-3 font-bold bg-yellow-300 text-black py-1.5 px-2 border border-l border-white"></div>
            <div id="banglaDateString" class="col-span-8 md:col-span-3 font-bold py-1.5 px-2 border border-l border-white"></div>
            <div id="englishDateString" class="col-span-8 md:col-span-3 font-bold py-1.5 px-2 border border-l border-white"></div>
            <div id="arabicDateString" class="col-span-8 md:col-span-3 font-bold py-1.5 px-2 border border-l border-white"></div>
        </div>

        <h1 id="title" class="text-black text-xl md:text-4xl font-bold text-center my-8"><?php echo $post_title;?></h1>
        <div class="columns-2 print:columns-2 text-sm md:text-base">
            <h3 class="font-bold text-lg flex pb-2">
                <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                <?php echo $site_title; ?>: <?php echo $post_date; ?>
            </h3>
            <img class="w-full print:img-fit" src="<?php  echo $post_thumbnail_url; ?>" alt="<?php echo $post_title; ?>">
            <?php echo $post_content; ?>
        </div>

        <div id="contact" class="pt-8 text-center text-sm">
            <hr>
            <?php echo $footer_text; ?>
        </div>
    </main>
    <footer id="footer" class="flex mx-auto gap-3 justify-center py-3">
        <button id="printBtn" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">প্রিন্ট করুন</button>
        <button id="download" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">সংরক্ষণ করুন</button>
        <button id="goBackButton" class="mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">পিছনে</button>
    </footer>
    <!-- https://github.com/AhmedMRaihan/BanglaDateJS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/AhmedMRaihan/BanglaDateJS@master/src/buetDateTime.js"></script>
    
    <script>
        // En to Bn
        function en2bnNumber(number) {
            var english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            var bangla_numbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            return number.toString().split('').map(function(digit) {
                return bangla_numbers[english_numbers.indexOf(digit)];
            }).join('');
        }

        // Determine the suffix for the day
        function getSuffix(day) {
            switch (day) {
                case 1: case 21: case 31:
                    return "লা";
                case 2: case 22:
                    return "রা";
                case 3: case 23:
                    return "রা";
                case 4: case 24:
                    return "ঠা";
                default:
                    return "ই";
            }
        }

        // Calculate Islamic date
        function calculatingIslamicDate(date, adjust) {
            var today = date ? new Date(+date) : new Date();
            if (adjust) {
                today.setDate(today.getDate() + +adjust);
            }

            var day = today.getDate();
            var month = today.getMonth();
            var year = today.getFullYear();
            var m = month + 1;
            var y = year;

            if (m < 3) {
                y -= 1;
                m += 12;
            }

            var a = Math.floor(y / 100);
            var b = 2 - a + Math.floor(a / 4);

            if (y < 1583) b = 0;
            if (y == 1582) {
                if (m > 10) b = -10;
                if (m == 10) {
                    b = 0;
                    if (day > 4) b = -10;
                }
            }

            var jd = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + day + b - 1524;

            b = 0;
            if (jd > 2299160) {
                a = Math.floor((jd - 1867216.25) / 36524.25);
                b = 1 + a - Math.floor(a / 4);
            }

            var bb = jd + b + 1524;
            var cc = Math.floor((bb - 122.1) / 365.25);
            var dd = Math.floor(365.25 * cc);
            var ee = Math.floor((bb - dd) / 30.6001);
            day = (bb - dd) - Math.floor(30.6001 * ee);
            month = ee - 1;

            if (ee > 13) {
                cc += 1;
                month = ee - 13;
            }
            year = cc - 4716;
            var wd = ((jd + 1) % 7 + 7) % 7 + 1;

            var iyear = 10631. / 30.;
            var epochastro = 1948084;
            var epochcivil = 1948085;

            var shift1 = 8.01 / 60.;

            var z = jd - epochastro;
            var cyc = Math.floor(z / 10631.);
            z = z - 10631 * cyc;
            var j = Math.floor((z - shift1) / iyear);
            var iy = 30 * cyc + j;
            z = z - Math.floor(j * iyear + shift1);
            var im = Math.floor((z + 28.5001) / 29.5);

            if (im == 13) im = 12;
            var id = z - Math.floor(29.5001 * im - 29);

            return [
                day,       // calculated day (CE)
                month - 1, // calculated month (CE)
                year,      // calculated year (CE)
                jd - 1,    // julian day number
                wd - 1,    // weekday number
                id,        // islamic date
                im - 1,    // islamic month
                iy         // islamic year
            ];
        }

        // Write Islamic date
        function writeIslamicDate(date, adjustment) {
            var wdNames = ["আহাদ", "ইথনিন", "থুলাথা", "আরবা", "খামস", "জুমু'আহ", "সাবত"];
            var iMonthNames = ["মহররম", "সফর", "রবিউল আউয়াল", "রবিউস সানি", "জমাদিউল আউয়াল", "জমাদিউস সানি",
                "রজব", "শাবান", "রমজান", "শাওয়াল", "জিলকদ", "জিলহজ"];
            var iDate = calculatingIslamicDate(date, adjustment);
            var outputIslamicDate = en2bnNumber(iDate[5]) + getSuffix(iDate[5]) + " " + iMonthNames[iDate[6]] + " " + en2bnNumber(iDate[7]);
            return outputIslamicDate;
        }

        // Get today's date
        var today = new Date();
        var day = today.getDate();
        var monthNames = ["জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
        var month = monthNames[today.getMonth()];
        var year = today.getFullYear();

        var banglaDayString = new buetDateConverter().convert("l");
        var banglaDateString = new buetDateConverter().convert("d F, Y");
        document.getElementById('banglaDayString').textContent = 'প্রিন্ট এর তারিখঃ ' + banglaDayString;
        document.getElementById('banglaDateString').textContent = banglaDateString;
        document.getElementById('englishDateString').textContent = en2bnNumber(day) + getSuffix(day) + " " + month + " " + en2bnNumber(year);
        document.getElementById('arabicDateString').textContent = writeIslamicDate(new Date(), 0);
    </script>

    <!-- https://html2canvas.hertzen.com/ -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        document.getElementById('download').addEventListener('click', downloadCanvasAsImage);
        function downloadCanvasAsImage() {
            const scale = 4;
            html2canvas(document.querySelector("#main"), {
                scale: scale,
            }).then(canvas => {
                // Convert canvas to data URL
                const dataURL = canvas.toDataURL('image/png');

                // Create a link element
                const downloadLink = document.createElement('a');
                downloadLink.href = dataURL;
                
                // Set the download attribute to specify the file name
                downloadLink.download = '<?php echo strip_tags(get_the_title()); // title ?> - <?php echo $site_title; ?>';
                
                // Simulate a click to trigger the download
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            });
        }
    </script>

    <script src="<?php echo plugins_url('assets/dist/js/app.js', __FILE__); ?>"></script>
</body>
</html>