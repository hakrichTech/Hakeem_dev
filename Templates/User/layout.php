<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <link rel="shortcut icon" href="<?=$url ?>userImg/logo.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta property="og:url"           content="<?=$urlpage; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:locale" content="nl_NL" />
    <meta property="og:site_name"  content="Hakrich App" />
    <meta property="og:title"         content="<?=$title; ?>" />
    <meta property="og:description"   content="<?=str_replace("</sp>","",str_replace("<sp>","",$Description)); ?>" />
    <meta property="og:image"         content="<?=$imageHeader; ?>" />
    <meta property="og:image" itemprop="image" content="<?=$imageHeader; ?>" />
    <meta property="og:image:secure_url" itemprop="image" content="<?=$imageHeader; ?>" />
    <link itemprop="thumbnailUrl" href="<?=$imageHeader; ?>">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta name="description" content="<?=str_replace("</sp>","",str_replace("<sp>","",$Description)); ?>">
    <meta name="referrer" content="always">

    <meta property="og:image:type" content="<?=$typeHeader ?>" />
    <meta property="og:image:alt" content="<?=str_replace("</sp>","",str_replace("<sp>","",$Description)); ?>" />
    <meta name="keywords" content="<?=$keywords; ?>">


<meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=12.0, minimum-scale=.25, user-scalable=no /">
<!-- <script data-ad-client="ca-pub-1780949920929112" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
    <link rel="stylesheet" href="<?=$url ?>Design/Css/<?=ucfirst($deviceType) ?>_user_app.css">
<!-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f2b5e010cfca800123e4e20&product=inline-share-buttons" async="async"></script> -->
<script src="<?=$url ?>Design/Js/<?=ucfirst($deviceType) ?>_login.js" defer></script>

  </head>
<body>

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '704732793792587',
        cookie     : true,
        xfbml      : true,
        version    : 'v9.0'
      });

      FB.AppEvents.logPageView();

    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>

    <header>
    <div class="Logo">

      <img src="<?=$url ?>userImg/logo.png" alt="" width="50" height="50">


    </div>
    </header>
    <div class="vide">

    </div>

    <?php echo $content ?>
  </body>


  <footer>

    <li>Privacy</li>
    <li>About</li>
   <li>Help</li>
  <div class="cop">
    &copy;2020 Hakrich Team
  </div>
  </footer>
<script type="text/javascript">
FB.login(function(response) {
  if (response.status === 'connected') {
    console.log(response);
  } else {
    // The person is not logged into your webpage or we are unable to tell.
  }
}, {scope: 'public_profile,email'});
</script>


</html>
