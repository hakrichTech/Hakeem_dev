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
     Insert verification code in a field bellow, code which we have just send to your Email address.
   </div>
   <input type="text" required name="code" placeholder="HT-" value="">
   <div class="notGet">
    Not gettig it? <a href="<?=$url; ?>verif2/">Resend</a>
  </div><br>
   <input type="submit" name="" value="Verify">

   <div class="ifNotUser">
  Have account? <a href="<?=$url; ?>login/">Log in</a>
   </div>
 </form>
 <br>
 <br>

</div>
