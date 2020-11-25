<div class="LogIn">
  <h1>LOG IN</h1>
  <hr>
  <?php if (isset($error1)): ?>
    <div class="errorr">
      <?=$error1 ?>
    </div>
  <?php endif; ?>
  <!-- <p>Sign in to create articles, upload applications, and Receive feedback for your Apps in your inbox.</p> -->
 <form class="" method="post">
   <input type="text" name="email" placeholder="Email Address" value="">
   <input type="password" name="password" placeholder="password" value="">
   <input type="submit" name="" value="Connect">

   <div class="ifNotUser">
  No account? <a href="<?=$url; ?>signup/">Create one</a>
   </div>
 </form>
 <br>
 <br>
 <div class="log_2">
 To make HakrichApp work we log user data and share it with service providers click
 "Sign in" above to accept HakrichApp's <a href="#">terms of service </a> & <a href="#">conditions</a>
 </div>
</div>
