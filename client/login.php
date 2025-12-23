<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../public/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <h1 class="heading">Login </h1>

    <form action="/discuss/server/requests.php" method="post">


      <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="email" class="form-label">User Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="enter user email">
      </div>

      <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="password" class="form-label">User Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="enter user password">
      </div>
      <div class="col-6 offset-sm-3 margin-bottom-15">
        <button type="submit" name="login" class="btn btn-primary">Login</button>

      </div>

    </form>

  </div>
</body>

</html>