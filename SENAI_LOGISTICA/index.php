<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Pagina de Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Logsor -->
          <form action="loginProf.php" class="sign-in-form" method="POST">
            <img class="img" src="../SENAI_LOGISTICA/imagens/Captura de tela 2024-04-03 075038.png" alt="LOGO SENAI">
            <div class="title2">
            <h2 class="title">Login</h2>
             <img class="img1" src="../SENAI_LOGISTICA/imagens/png-clipart-computer-icons-professor-farnsworth-teacher-education-professor-angle-text.png" alt="Professor">
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="emailp" id="emailp" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Senha" name="senhap" id="senhap" />
            </div>
            <input type="submit" value="Login" class="btn solid" name="botao" id="botao"/>
          </form>

          <!-- login Aluno-->
          <form action="loginAluno.php" class="sign-up-form" method="POST">
            <img class="img" src="../SENAI_LOGISTICA/imagens/Captura de tela 2024-04-03 075038.png" alt="LOGO SENAI">
            <div class="title3">
            <h2 class="title">Login</h2>
            <img class="img5" src="../SENAI_LOGISTICA/imagens/PEDROPINTO.png" alt="Aluno">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="user" id="user" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Senha" name="senhaa" id="senhaa" />
            </div>
            <input type="submit" class="btn" value="Login" name="botao" id="botao" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Sou Aluno</h3>
            <p>
              Login estudante
            </p>
            <button class="btn transparent" id="sign-up-btn">
              login
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sou Professor</h3>
            <p>
              Login Profissional
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>