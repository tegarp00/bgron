<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Frontend</title>
</head>
<body>
    <a href="{{ route('coba-create') }}"><button>Create Data</button></a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="daftar-pengguna">
        </tbody>
    </table>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

<script>
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/pengguna/list',
        dataType: 'json',
        success: function (data) {
            console.log(data);

            let listPengguna = data.data
            let html = ""
            for (let pengguna of listPengguna){
            html += `
                <tr>
                <td>${pengguna.nama}</td>
                <td>${pengguna.email}</td>
                <td>${pengguna.email}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="http://localhost:8000/coba-show/${pengguna.id}">Detail</a>
                    <button onclick="hapus(${pengguna.id})">Hapus</button>
                </td>
                </tr>
            `
            }
            $("#daftar-pengguna").append(html)
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