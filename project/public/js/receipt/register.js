var contador = 0;

function duplicateProduct() {
    const fieldset = document.querySelector(".add-product");
    const duplicate = fieldset.cloneNode(true);
    // O true como primeiro parâmetro na função cloneNode faz uma clonagem profunda de todos os itens dentro do fieldset
    const receiptForm = document.querySelector("#receipt-form");
    receiptForm.appendChild(duplicate);
    
    const input_value = duplicate.querySelector('input[name="products[0][value]"]');
    input_value.value = '';

    contador += 1;
    input_value.name = `products[${contador}][value]`;
    
    const select_id = duplicate.querySelector('select[name="products[0][id]"]');
    select_id.name = `products[${contador}][id]`;
}