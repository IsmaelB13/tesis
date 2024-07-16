<!DOCTYPE html>
<html>
<head>
  <title>Registrar Usuario</title>
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
      max-width: 800px; /* Ancho aumentado */
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border: 2px solid #007bff;
    }
    label {
      display: inline-block;
      width: 200px; /* Ancho aumentado */
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type=text], input[type=password], input[type=number], input[type=email] {
      width: calc(150% - 200px); /* Ancho ajustado */
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
    <h1 style="font-size: 30px; font-weight: bold; text-align: center;">Registrar Usuario</h1><br>
    <form action="{{ url('add_user') }}" method="post">
      @csrf
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" id="name" name="name" required maxlength="15" pattern="[A-Za-zÀ-ÿ\s]+" title="Solo se permiten letras y espacios." value="{{ old('name') }}">
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="email">Correo</label>
          <input type="email" id="email" name="email" required value="{{ old('email') }}">
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
          <label for="password_confirmation">Confirmar Contraseña</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required>
          @error('password_confirmation')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="phone">Teléfono</label>
          <input type="number" id="phone" name="phone" required value="{{ old('phone') }}">
          @error('phone')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <input type="hidden" id="usertype" name="usertype" value="user">
      <div class="form-group">
          <input class="btn btn-primary" type="submit" value="Registrar">
      </div>
    </form>
  </div>
</body>
</html>
