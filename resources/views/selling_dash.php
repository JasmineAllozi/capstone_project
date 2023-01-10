
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body id="selling_id" >
    <div class="d-flex justify-content-between align-items-center">
    <input id="userId" value="<?php $_SESSION['user']['user_id'] ?>" style="display:none">
    <div class=" d-flex flex-row-reverse gap-3">
   
   
      
    </div>
        <div>
            <strong>Total Sales: </strong>
            <span id="total-sales">0</span>
        </div>
        
    </div>
    <hr>

    <form id="user-contorllers" class="row my-5">
       
        <div id="select_items" class="input-group col align-items-center mb-0">
        <span class="input-group-text">Items</span>
        <select class="form-select" id="items" >
        <option value="">Open this select menu</option>
         </select>
         </div>
     
         <div class="input-group col align-items-center mb-0">
          <span class="input-group-text">Quantity</span>
        <input id="items-quantity" type="number" class="form-control" min="1">
         </div>
        <div class="input-group col align-items-center mb-0">
      <span class="input-group-text">Price (JOD)</span>
    <input id="items-price" type="number" class="form-control" value="" >
         </div>
        <div class="col d-flex justify-content-center align-items-center" min="0">
            <button class="btn btn-success" id="add">Add</button>
        </div>
    </form>
    
    


    <div id="table-data">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
               

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="../resources/js/app.js"></script>
</body>

</html>