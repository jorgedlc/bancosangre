@include('partials.header');

<body class="login-page backlogin"> 
    <div class="login-box">
        <div style="color: white; text-align:center">
            <h3>HOSPITAL MÉDICO QUIRURGICO  SISTEMA DE CITAS</h3>
            <h4>Banco de Sangre</h4>
        </div>
        <div class="card" style="">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Iniciar Sesión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="clave" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">INICIAR SESIÓN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

@include('partials.scripts');