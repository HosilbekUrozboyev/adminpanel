<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

</head>
<body class="bg-primary-10  bg-opacity-50" style="background: #7abaff">

<div class="container">
    <br><br><div class=" row mt-lg-5">
        <div class="col-md-4"></div>
        <div style="border-radius: 10px" class="col-md-4 p-5 bg-white rounded-4">
            <form action="">

                <h2 class="text-center">KIRISH</h2>

                <label for="email" class="form-label">Email </label><br>
                <input type="email" id='email' name="email" class="form-control" required
                       placeholder="google@gmail.com"><br>

                <label for="password" class="form-label">Password</label><br>
                <input type="password" id="password" name="password" class="form-control" required
                       placeholder="**********"><br>

                <button type="submit" class=" form-control btn btn-primary ">KIRISH</button>

            </form>
        </div>
    </div>

</div>

</body>
</html>
