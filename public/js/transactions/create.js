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

        let account_num = document.getElementById("account_num").value;
        let balance = document.getElementById("balance").value;
        let type = document.getElementById("type").value;
        let types = ['deposite', 'withdraw', 'transfer']

        if (account_num && balance && type && account_num.length == 12 && parseInt(account_num) > 100000000000 && balance > 0 && balance < 1000000 && types.includes(type)) {
            if (items == 1) { displayOrder(true); }

            let box = document.createElement("tr");
            box.id = `row-${items}`;
            box.style.opacity = "0.8";

            let html = `<td colspan="2"><input type="text" class="form-control text-center" value="${account_num}" name="account_num${items}" id="account_num${items}" readonly ></td><td><input type="text" class="form-control text-center" value="${type}" name="type${items}" id="type${items}" readonly ></td><td><input type="number" class="form-control text-center" value="${balance}" name="balance${items}" id="balance${items}" readonly>`

            box.innerHTML = html;
            addHtml.append(box);
            document.getElementById('items').value = items;
            items++;
        } else if (account_num.length != 12 || parseInt(account_num) < 100000000000) {
            alert("Wrong Account Number!")
        } else if (!balance || balance > 1000000 || balance < 0) {
            alert("The Balance range is between 0:1000000!")
        } else {
            alert("please fill this Transaction Info, to add more..!")
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
