<div class="LogIn">
  <h1>EMAIL VERIFICATION</h1>
  <hr>
  <?php if (isset($error1)): ?>
    <div class="errorr">
      <?=$error1 ?>
    </div>
  <?php endif; ?>

 <form class="sigForm"  method="post">
   <div class="guid">
     Ooops! Email verification failed, Try to log in if you have already create an Hakrich-App account.
   </div>
   <div class="notGet">
      Have account? <a href="<?=$url; ?>login/">Log In</a>
  </div><br>
 </form>
 <br>
 <br>

</div>
