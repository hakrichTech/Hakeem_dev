<!DOCTYPE html>
<html lang="en">
  <head>


    <meta charset="utf-8">
    <title><?=$title;?></title>
    <link rel="shortcut icon" href="<?=$url ?>img/iconfav.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="<?=$imageHeader; ?>" itemprop="image">

    <meta property="og:url"           content="<?=$urlpage; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:locale" content="nl_NL" />
    <meta property="og:site_name"  content="Hakrich App" />
    <meta property="og:title"         content="<?=$title; ?>" />
    <meta property="og:image"         content="<?=$imageHeader; ?>" />
    <meta property="og:image" itemprop="image" content="<?=$imageHeader; ?>" />
    <meta property="og:image:secure_url" itemprop="image" content="<?=$imageHeader; ?>" />
    <link itemprop="thumbnailUrl" href="<?=$imageHeader; ?>">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta name="referrer" content="always">

    <meta property="og:image:type" content="<?=$typeHeader ?>" />
    <meta name="keywords" content="<?=$keywords; ?>">


<meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=12.0, minimum-scale=.25, user-scalable=no /">
<script data-ad-client="ca-pub-1780949920929112" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f2b5e010cfca800123e4e20&product=inline-share-buttons" async="async"></script> -->
<link rel="stylesheet" href="<?=$url ?>Design/Css/<?=ucfirst($deviceType) ?>_app.css">
  </head>


<body>

    <?php
    if (isset($header)):
      echo $header;
    endif;
       ?>
    <div class="vide">

    </div>

    <?php echo $content ?>


  <footer>
    <social>
      <div class="flo">
        Follow us on
      </div>
      <table>
        <tr>
          <td class="c" >
         <img src="<?=$url ?>img/1social.png" style="object-fit:cover; width:40px;height:40px;" alt="">
          </td>
          <td class="s"></td>
          <td class="c" >
            <img src="<?=$url ?>img/2social.png" style="object-fit:cover; width:40px;height:40px;" alt="">
          </td>
          <td class="s"></td>
          <td class="c">
            <img src="<?=$url ?>img/3social.png" style="object-fit:cover; width:40px;height:40px;" alt="">
          </td>
        </tr>
      </table>
 </social>
 <li> <a href="<?=$url ?>about/">About Us</a> | <a href="<?=$url ?>contact_us/">Contact Us</a> </li>
 <li><a href="<?=$url ?>privacy/">Privacy Policy</a> </li>
 <li>Develloped By HAKRICH Team</li>
 <li>&copy;2020 Hakrich Team</li>

  </footer>



</body>
<script src="<?=$url ?>Design/Js/<?=ucfirst($deviceType) ?>.js"></script>


</html>
