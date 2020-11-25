<div class="LogIn">
  <h1>SIGN UP</h1>
  <hr>
  <?php if (isset($error1)): ?>
    <div class="errorr">
      <?=$error1 ?>
    </div>
  <?php endif; ?>

 <form class="sigForm"  method="post">
   <input type="text" required name="name" placeholder="Username" value="<?=$name??"" ?>">
   <input type="email" required name="email" placeholder="Email" value="<?=$email??"" ?>">
   <input type="password" required name="password" placeholder="Password" value="">
   <input type="password" required name="password0" placeholder="Password" value="">


   <input type="submit" name="" value="Regester">

   <div class="ifNotUser">
  Have account? <a href="<?=$url; ?>login/">Log in</a>
   </div>
 </form>
 <br>
 <br>
 <div class="log_2">
 To make HakrichApp work we log user data and share it with service providers click
 "Regester" above to accept HakrichApp's <a href="#">terms of service </a> & <a href="#">conditions</a>
 </div>
</div>
