<?php
require_once "Template/Header.php" ?>



<body>


  <div class="limiter">
    <div class="container-login100">

      <div class="wrap-login100">
        <?php if (session()->getFlashdata('msg')) : ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form class="login100-form validate-form" action="connexion/auth" method="post">
          <span class="login100-form-title p-b-26">
            Connectez-vous
          </span>
          <span class="login100-form-title p-b-48">
            <i class="zmdi zmdi-font"></i>
          </span>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="name" value="<?= set_value('name') ?>">
            <span class="focus-input100" data-placeholder="Entrez votre identifiant..."></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="pass">
            <span class="focus-input100" data-placeholder="Entrez votre mot de passe ..."></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">
                Connexion
              </button>
            </div>
          </div>

          <div class="text-center p-t-115">
            <span class="txt1">
              Vous n'avez pas de compte ?
            </span>

            <a class="txt2" href="inscription">
              Inscription
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>


</body>

</html>

<?php
require_once "Template/Footer.php" ?>