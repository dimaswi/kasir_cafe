<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pilih Menu</title>
</head>

<body>
    <main>
        <div class="text-center" style="padding-top: 5%;">
            <h1>CREATIVE CAFE</h1>
        </div>

        <div class="container-xl">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Menu
            </button>
            <button id="button_tambah_menu" class="btn btn-success">Tambah</button>
            <button id="button_hapus_menu" class="btn btn-danger">Hapus</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ Route('tambah') }}" method="POST">
                                @csrf
                                <div class="mx-auto">
                                    <div class="form-group">
                                        <label for="jumlah">Menu</label>
                                        <input class="form-control" type="text" name="nama_menu" id="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Harga</label>
                                        <input class="form-control" type="text" name="harga" id="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu">Apakah Masih Tersedia</label>
                                        <select class="form-control" name="tersedia" id="menu">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{Route('buat_pesanan')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="jumlah">Nama</label>
                        <input class="form-control" type="text" name="nama">
                    </div>
                <h1>MENU</h1>
                @foreach($menu as $key => $value)
                <div class="form-group">
                    <div class="form-group">
                        <label for="jumlah">{{$value->nama_menu}}</label>
                        <input type="hidden" value="{{$value->harga}}" name="{{$value->harga}}">
                        <input type="hidden" value="{{$value->nama_menu}}" name="{{$value->nama_menu}}">
                        <input class="form-control" type="number" name="{{$value->id}}">
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="jumlah">Uang Dibayar</label>
                        <input class="form-control" type="number" name="uang_dibayar">
                    </div>
                    <button type="submit" id="button_submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        var index = 1;

        var max_fields = 10;
        var wrapper = $("#form");
        var add_button = $("#button_tambah_menu");
        var remove_button = $("#button_hapus_menu");
        var total = $("#button_submit");
        var harga1 = $('#menu_' + index++);
        var harga2 = $('#jumlah' + index++);

        $(add_button).click(function(e) {
            e.preventDefault();
            var total_fields = wrapper[0].childNodes.length;
            if (total_fields < max_fields) {
                $(wrapper).append(`<div class="form-group"><div class="form-group"><label for="menu">Pilih Menu</label><select class="form-control" name="menu[${index++}]" id="menu_${index++}"><div><option>-- Pilih Menu --</option>@foreach($menu as $key => $value) <option value="{{$value->nama_menu}}">{{$value->nama_menu}}</option>@endforeach</select></div><div class="form-group"><label for="jumlah">Jumlah Menu</label><input class="form-control" type="number" name="jumlah_menu[${index++}]" id="jumlah_${index++}"></div>`);
            }
        });
        $(remove_button).click(function(e) {
            e.preventDefault();
            var total_fields = wrapper[0].childNodes.length;
            if (total_fields > 1) {
                wrapper[0].childNodes[total_fields - 1].remove();
            }
        });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>