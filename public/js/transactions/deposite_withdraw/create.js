let addHtml = document.getElementById("tbody");

if (addHtml != null) {

    var items = 1;
    let addBtn = document.querySelector("#add-transaction");
    let rsBtn = document.querySelector("#rs-transaction");
    let rmBtn = document.querySelector("#rm-transaction");
    let atBtn = document.querySelector("#actions-buttons");
    let addInBtn = document.querySelector("#addin");

    addBtn.addEventListener("click", addTransaction);

    function addTransaction() {

        let my_account = document.getElementById("my_account").value;
        let balance = document.getElementById("balance").value;
        let type = document.getElementById("type").value;
        let types = ['deposite', 'withdraw'];

        if (my_account && balance && type && my_account.length == 12 && parseInt(my_account) > 100000000000 && balance > 0 && balance < 10000000 && types.includes(type)) {
            if (items == 1) { displayOrder(true); }

            let box = document.createElement("tr");
            box.id = `row-${items}`;
            box.style.opacity = "0.8";

            let html = `<td colspan="2"><input type="text" class="form-control text-center" value="${my_account}" name="my_account${items}" id="my_account${items}" readonly ></td><td><input type="text" class="form-control text-center" value="${type}" name="type${items}" id="type${items}" readonly ></td><td><input type="number" class="form-control text-center" value="${balance}" name="balance${items}" id="balance${items}" readonly>`

            box.innerHTML = html;
            addHtml.append(box);
            document.getElementById('items').value = items;
            items++;
        } else if (my_account.length != 12 || parseInt(my_account) < 100000000000) {
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Wrong Account Number!",
            });
        } else if (!balance || balance > 10000000 || balance < 0) {
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "The Balance range is between 0:10000000!",
            });
        } else {
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Please fill this Transaction Info, to add more..!",
            });
        }

    }

    rsBtn.addEventListener("click", rsMedicine);

    function rsMedicine() {
        deleteChild(addHtml);
        displayOrder(false);
        items = 1;
        document.getElementById('items').value = 0;
    }

    rmBtn.addEventListener("click", rmMedicine);

    function rmMedicine() {
        addHtml.removeChild(addHtml.lastElementChild);
        items--;
        if (items == 1) {
            displayOrder(false);
            document.getElementById('items').value = items;
        }
    }

    function displayOrder(check) {
        if (!check) {
            atBtn.classList.add('d-none');
            addInBtn.classList.add('disabled');
        } else {
            atBtn.classList.remove('d-none');
            addInBtn.classList.remove('disabled');
        }
    }

    function deleteChild(ele) {
        let child = ele.lastElementChild;
        while (child) {
            ele.removeChild(child);
            child = ele.lastElementChild;
        }
    }

}


$(document).ready(function () {
    $('.my_account').select2({
        theme: "classic"
    });
});