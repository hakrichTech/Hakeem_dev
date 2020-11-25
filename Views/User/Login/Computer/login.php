
<div class="userLog">

  <h2>Unite with Hakrich TEAM</h2>

<div class="formlOG">
  <div class="dat" id="erorrr" data-errorCode="<?=$error1 ?>">

  </div>
  <form id="formLogin"  method="post">
    <input type="email" id="emailAddress_L" name="" required autocomplete="off"  value="" placeholder="Email"><br><br>
    <input type="password" id="password_L" name="" required autocomplete="off" value="" placeholder="Password">
     <br><br>

     <input type="submit" name="connecting" id="connect" value="Connect">
  </form>
</div>

<div class="connectWith">
  <fieldset>
    <legend>Or Connect with</legend>
   <div class="googleAccount" id="gconnect">
     Google Account
   </div>
   <div class="googleAccount" id="fconnect" onclick="FB.login();">
     Facebook
   </div>
   <div class="googleAccount" id="tconnect">
     Twitter
   </div>
  </fieldset>

  <div class="account">
    You don't have an account? <span id="regester">Regester</span>
  </div>
</div>


</div>
