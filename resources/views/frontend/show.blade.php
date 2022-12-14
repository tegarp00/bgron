<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Show Data</title>
</head>
<body>
    <div id="konten">

    </div>
    <a href="{{ route('coba-edit', $id) }}"><button>Edit</button></a>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

<script>
    var id = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
    $.ajax({
        type: 'GET',
        // url: 'http://localhost:8000/api/pengguna/'+ id,
        url: 'http://localhost:8000/api/pengguna/{{$id}}',
        dataType: 'json',
        success: function (data) {
            console.log(data);

            let pengguna = data.data
            let html = ""
            html += `
                <container>
                    Nama: ${pengguna.nama} <br />
                    Email: ${pengguna.email} <br />
                </container>
            `
            $("#konten").append(html)
        }
    });

    function hapus(id){
      $.ajax({
        url : `http://localhost:8000/api/pengguna/${id}/delete`,
        method: "POST",
        dataType: "json",
        success: _ => {
          window.location.href = ""
        }
      })
    }
</script>