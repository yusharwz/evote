<!doctype html>
<php>

	
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">
        <meta name="description"
              content="">
        <meta name="author"
              content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator"
              content="Hugo 0.80.0">
        <title>Signup</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
              crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        </style>
        <!-- Custom styles for this template -->
        <link href="assets/signin.css"
              rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form id="form"
                  novalidate>
                <h1 class="h3 mb-3 fw-normal">Masukkan OTP yang dikirim ke email</h1>
                
               
                <br>
                
                
                <input type="password"
                       id="inputRePassword"
                       class="form-control"
                       placeholder="Kode"
                       required>
                <button class="w-100 btn btn-lg btn-primary"
                        type="submit">Buat Kode Akses Baru</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
        </main>
        <script>
           
           include('koneksi.php');

           $otp = $_SESSION['otp'];
           $email = $_POST['email'];
           $select=mysqli_query($koneksi, "SELECT otp FROM tbl_akses WHERE email='$email'");
           if( mysqli_num_rows($select) === 1 )
  
    while ($row = mysqli_fetch_array($select));
    {
      $email = isset ($row['email']) ? $row['email'] : '';
      $pass = isset ($row['otp']) ? $row['otp'] : '';
      $email = $_POST['email'];
    }
  
    

		

    
  
	
	
	


        </script>
    </body>
</php>
