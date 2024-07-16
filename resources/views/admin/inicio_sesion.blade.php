<!DOCTYPE html>
<html>
<head>
  <title>Inicio de Sesión</title>
  <style type="text/css">
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      max-width: 400px; /* Ancho del contenedor ajustado */
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border: 2px solid #007bff;
    }
    label {
      display: inline-block;
      width: 200px; /* Ancho del label ajustado */
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type=email], input[type=password] {
      width: calc(150% - 200px); /* Ancho del input ajustado */
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .btn-primary {
      display: block;
      width: 100%;
      background-color: #007bff;
      color: #fff;
      padding: 10px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 style="font-size: 30px; font-weight: bold; text-align: center;">Inicio de Sesión</h1><br>
    <form action="{{ route('login') }}" method="post">
      @csrf
      <div class="form-group">
          <label for="email">Correo</label>
          <input type="email" id="email" name="email" required>
          @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required>
          @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <input class="btn btn-primary" type="submit" value="Iniciar Sesión">
      </div>
    </form>
  </div>
</body>
</html>
