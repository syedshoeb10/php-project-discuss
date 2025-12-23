    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
      <h1 class="heading">Signup </h1>
      <style>
        body {
          background: #f4f6f9;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          text-align: center;
        }

        .container {
          margin-top: 60px;
        }

        .heading {
          text-align: center;
          margin-bottom: 30px;
          font-weight: 600;
          color: #333;
        }

        form {
          background: #ffffff;
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
        }

        .margin-bottom-15 {
          margin-bottom: 15px;
        }

        .form-label {
          font-weight: 500;
          color: #555;
        }

        .form-control {
          height: 45px;
          border-radius: 6px;
          border: 1px solid #ccc;
        }

        .form-control:focus {
          border-color: #0d6efd;
          box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
          width: 20%;
          padding: 10px;
          border-radius: 6px;
          font-size: 16px;
          font-weight: 500;
        }

        .btn-primary:hover {
          background-color: #0b5ed7;
          padding: auto;
        }
      </style>

      <form action="/discuss/server/requests.php" method="post">
        <div class="col-6 offset-sm-3 margin-bottom-15">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
          <label for="email" class="form-label">User Email</label>
          <input type="text" name="email" class="form-control" id="email" placeholder="enter user email" required>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
          <label for="password" class="form-label">User Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="enter user password" required>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
          <label for="address" class="form-label">User Address</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="enter user address" required>
        </div>
        <div class="col-6 offset-sm-3 margin-bottom-15">
          <button type="submit" name="signup" class="btn btn-primary">Signup</button>

        </div>

      </form>

    </div>