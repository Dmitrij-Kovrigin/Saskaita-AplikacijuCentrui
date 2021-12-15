<!doctype html>
<html lang="en">

<head>
    <title>Saskaitos kurimas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container" style="width:50%;">
        <form method="post" action="<?= URL . '?saskaita' ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Saskaitos numeris</label>
                    <input class="form-control" type="text" name="bill_number" placeholder="PRE-">
                    <label for="exampleFormControlInput1">Data</label>
                    <input class="form-control" type="text" name="bill_date" placeholder="2021-12-01">
                    <label for="exampleFormControlInput1">Apmokėti iki:</label>
                    <input class="form-control" type="text" name="bill_expire_date" placeholder="2021-12-01">
                    <label for="exampleFormControlInput1">Saskaita išrasė:</label>
                    <input class="form-control" type="text" name="bill_editor" placeholder="Vardas Pavarde">
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pirkėjo informacija</label>
                        <input class="form-control" type="text" name="buyers_name" placeholder="Įmonės pavadinimas">
                        <input class="form-control" type="text" name="buyers_address" placeholder="Addresas">
                        <input class="form-control" type="text" name="buyers_code" placeholder="Įmonės kodas">
                        <input class="form-control" type="" name="buyers_pvm_code" placeholder="PVM kodas">
                        <input class="form-control" type="email" name="buyers_email" placeholder="Emailas">
                        <input class="form-control" type="text" name="buyers_phone" placeholder="Tel. nr.">
                    </div>
                </div>
            </div>
            <div class="col-12 form-group">
                <h6>Prekiu informacija</h6>
            </div>
            <div class="col-12 form-group">
                <div class="book--photos book-photo-form">
                </div>
            </div>
            <div class="col-12">
                <button type="button" class="btn-sm btn-dark mt-2 add--photo">Pridėti prekę</button>
            </div>
            <div class="col-12 form-group">
                <label for="exampleFormControlTextarea1">Suma žodžiais: </label>
                <input class="form-control" type="text" name="sum_words" placeholder="Suma žodžiais">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Sukurti</button>
        </form>
        <div class="col-12 form-group">
            <button class="btn btn-secondary ml-0 mt-3" id="eventBtn" onclick="myFunction()">Pilna saskaitos suma su PVM: 0</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>
</body>

</html>