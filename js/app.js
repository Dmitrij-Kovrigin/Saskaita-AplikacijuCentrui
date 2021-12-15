const outfitInput = `
                <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Prekės pavadinimas</label>
                    <textarea class="form-control" value="<?= rand(0, 99999);?>" rows="3" name="product_name[]"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Matas</label>
                    <input class="form-control" type="text" value="" name="product_measure[]" placeholder="Matas">
                    <label for="exampleFormControlInput1">Kiekis</label>
                    <input class="form-control inputAmount" type="text" value="<?= isset($_POST['product_amount']) ? $_POST['product_amount'] : 0; ?>
" name="product_amount[]" placeholder="Kiekis">
                    <label for="exampleFormControlInput1">Vnt. kaina be PVM, Eur</label>
                    <input class="form-control inputPrice" type="text" value="<?= isset($_POST['product_price_one']) ? $_POST['product_price_one'] : 0; ?>" name="product_price_one[]" placeholder="Vnt. kaina be PVM, Eur">
                    <button type="button" class="btn btn-dark mt-2">Ištrinti prekę</button>
                </div>

`;

window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.add--photo')) {
        const addPhotoButton = document.querySelector('.add--photo');
        const inputPlaceholder = document.querySelector('.book--photos');
        addPhotoButton.addEventListener('click', () => {
            const span = document.createElement('span');
            span.innerHTML = outfitInput;
            inputPlaceholder.appendChild(span);
            span.querySelector('button').addEventListener('click', () => {
                span.remove();
            })
        })
    }

});

var x = 0;
function myFunction() {
    setInterval(function(){ 
        const inputAmount = document.getElementsByClassName("inputAmount");
        const arr = [...inputAmount].map(input => input.value);
        const inputPrice = document.getElementsByClassName("inputPrice");
        const arr1 = [...inputPrice].map(input => input.value);
        x = arr.map(function(x, index){
        return arr1[index] * x 
        });
        y = (x.reduce((a, b) => a + b)) * 1.21;
        y = Math.round(y * 100) / 100;
        var btn = document.getElementById("eventBtn");
        btn.innerHTML = 'Pilna saskaitos suma su PVM: ' + y;
    }, 1000);
}



// const sum = [1, 2, 3].reduce((partial_sum, a) => partial_sum + a, 0);


// var a = [1,2,3,4,5];
// var b = [5,4,3,2,1];

// a.map(function(x, index){ //here x = a[index]
//  return b[index] + x 
// });

// =>[6,6,6,6,6]


// const full = document.getElementsByClassName('full');
// const arr = [...full].map(input => input.value);