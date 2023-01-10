
$(function () {
    const items = $('#items');
    const itemQuantity = $('#items-quantity');
    const itemPrice = $('#items-price');
    const add = $('#add');
    const table = $('tbody');
    const user_table=$('#table-data_user');
    const item_price =$('#items-price');
   $( document ).ready(function() {
     user_id= $('#userId').val() ;
 });
   

    let counter = 1;
    let total = 0;

   
    // show transactions table for the current logged-is user
        $.ajax({
            type: "get",
            url: "https://test.local/api/current_user_transaction",
            success: function(response) {
                response.body.forEach(transaction => {
                    table.append(`
                    <tr id="row">
                    <td>${counter++}</td>
                    <td>${transaction.item_name}</td>
                    <td>${transaction.item_sold_quantity}</td>
                    <td>${transaction.selling_price}</td>
                    <td>${transaction.selling_price * transaction.item_sold_quantity}</td>
                    <td><div>
                    <a href="/selling/delete?id=<?= $data->transactions->id ?>" class="btn btn-danger">Delete</a>
                    <a href="/selling/edit?id=<?= $data->transactions->id ?>" class="btn btn-warning ">Edit</a>
                    </div></td> 
                    </tr>
                    `);
                  
                   
                 
                });
            }
        });
  
    
      //items list
        $('#select_items').ready( function(){
         $('#items').one('click',function () {
                 $.ajax({
                     type: "GET",
                     url:  "https://test.local/api/items",
                     success: function (response) {
                         response.body.forEach(item => {
                             $('#items').append(`
                        <option value="${item.id}">${item.item_name}</option>
                        
                        `);
                       
                         });
                     }
                 });
                 $("#items").off('click');
             });
        });




        
       
    add.click(function(e) {
        e.preventDefault();
        let data = {
          
            item_id: $('#items').val(),
            item_sold_quantity: $('#items-quantity').val(), 
            id:user_id,
        };

        $.ajax({
            type: "post",
            url: "https://test.local/api/items/create",
            data: JSON.stringify(data),
            success: function(response) {
                alert('done')
                console.log(response)
            },
            error: function(e) {
                alert('not done');
            }
        });
    });

   





 //add transactions to table   
    add.click(function (e) {
        e.preventDefault();
        let item = items.val();
        let p = itemPrice.val();
        let q = itemQuantity.val();

        if (item == "" || p == "" || q == "") {
            alert('Make sure that you have entered all the information');
            return;
        }
        if(item==0){
            alert ("the item is out of the stock !");
        return;}
       else{

        table.append(`
        <tr>
            <td>${counter}</td>
            <td>${item}</td>
            <td>${q}</td>
            <td>${p}</td>
            <td>${q * p}</td>
        </tr>
       `);

        total += q * p;
        $('#total-sales').text(total);

        counter++;
        $('#user-contorllers').trigger('reset');
 } });
});
