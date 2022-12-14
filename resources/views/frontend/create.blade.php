<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Create Data</title>
</head>
<body>
    <div id="konten">
        Nama : <input type="text" name="nama" id="nama"> <br>
        Email : <input type="text" name="email" id="email"><br>
        Password : <input type="password" name="password" id="password"> <br>
        <button type="submit" onclick="create()">Create</button>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

<script>
    function create(){
        // e.preventDefault()
        let nama = $("#nama").val()
        let email = $("#email").val()
        let password = $("#password").val()

        if(nama == "") return alert("Nama tidak boleh kosong")
        if(email == "") return alert("Email tidak boleh kosong")
        if(password == "") return alert("Password tidak boleh kosong")

        let fd = new FormData();

        fd.append("nama", nama);
        fd.append("email", email);
        fd.append("password", password);

        $.ajax({
          url : "http://localhost:8000/api/pengguna",
          method: "POST",
          data: fd,
          processData:false,
          contentType:false,
          success: _ =>{
            window.location.href = "http://localhost:8000/coba-list"
          }
        })
      }
</script>