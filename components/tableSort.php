<!-- <div style="margin-bottom:1vh;"> -->
    <!-- <div style="text-align:center;"> -->
        <button id="btnName" class="btn btn-outline-primary" onclick="orderName()">Order By Name</button>
        <script>
            function orderName() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "block";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").className = "btn btn-primary";
            document.getElementById("btnSurname").className = "btn btn-outline-primary";
            document.getElementById("btnId").className = "btn btn-outline-primary";
            document.getElementById("btnPrac").className = "btn btn-outline-primary";
            document.getElementById("btnAdmin").className = "btn btn-outline-primary";
            document.getElementById("btnBoard").className = "btn btn-outline-primary";
            document.getElementById("btnEmail").className = "btn btn-outline-primary";

            }
        </script>

        <button id="btnSurname" class="btn btn-outline-primary" onclick="orderSurame()">Order By Surname</button>
        <script>
            function orderSurame() {
            document.getElementById("tbSurname").style.display = "block";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").className = "btn btn-outline-primary";
            document.getElementById("btnSurname").className = "btn btn-primary";
            document.getElementById("btnId").className = "btn btn-outline-primary";
            document.getElementById("btnPrac").className = "btn btn-outline-primary";
            document.getElementById("btnAdmin").className = "btn btn-outline-primary";
            document.getElementById("btnBoard").className = "btn btn-outline-primary";
            document.getElementById("btnEmail").className = "btn btn-outline-primary";
            }
        </script>

        <button id="btnId" class="btn btn-outline-primary" onclick="orderId()">Order By Id</button>
        <script>
            function orderId() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "block";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").className = "btn btn-outline-primary";
            document.getElementById("btnSurname").className = "btn btn-outline-primary";
            document.getElementById("btnId").className = "btn btn-primary";
            document.getElementById("btnPrac").className = "btn btn-outline-primary";
            document.getElementById("btnAdmin").className = "btn btn-outline-primary";
            document.getElementById("btnBoard").className = "btn btn-outline-primary";
            document.getElementById("btnEmail").className = "btn btn-outline-primary";
            }
        </script>

        <button id="btnPrac" class="btn btn-outline-primary" onclick="orderPractitioner()">Order By Practitioner</button>
        <script>
            function orderPractitioner() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "block";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").className = "btn btn-outline-primary";
            document.getElementById("btnSurname").className = "btn btn-outline-primary";
            document.getElementById("btnId").className = "btn btn-outline-primary";
            document.getElementById("btnPrac").className = "btn btn-primary";
            document.getElementById("btnAdmin").className = "btn btn-outline-primary";
            document.getElementById("btnBoard").className = "btn btn-outline-primary";
            document.getElementById("btnEmail").className = "btn btn-outline-primary";
            }
        </script>

        <button id="btnAdmin" class="btn btn-outline-primary" onclick="orderAdmin()">Order By Admin</button>
        <script>
            function orderAdmin() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "block";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").className = "btn btn-outline-primary";
            document.getElementById("btnSurname").className = "btn btn-outline-primary";
            document.getElementById("btnId").className = "btn btn-outline-primary";
            document.getElementById("btnPrac").className = "btn btn-outline-primary";
            document.getElementById("btnAdmin").className = "btn btn-primary";
            document.getElementById("btnBoard").className = "btn btn-outline-primary";
            document.getElementById("btnEmail").className = "btn btn-outline-primary";
            }
        </script>

        <button id="btnBoard" class="btn btn-outline-primary" onclick="orderBoard()">Order By Board</button>
        <script>
            function orderBoard() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "block";

            document.getElementById("btnName").className = "btn btn-outline-primary";
            document.getElementById("btnSurname").className = "btn btn-outline-primary";
            document.getElementById("btnId").className = "btn btn-outline-primary";
            document.getElementById("btnPrac").className = "btn btn-outline-primary";
            document.getElementById("btnAdmin").className = "btn btn-outline-primary";
            document.getElementById("btnBoard").className = "btn btn-primary";
            document.getElementById("btnEmail").className = "btn btn-outline-primary";
            }
        </script>

        
        <button id="btnEmail" class="btn btn-outline-primary" onclick="orderEmail()">Order By Email</button>
        <script>
            function orderEmail() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";
            document.getElementById("tbEmail").style.display = "block";

            document.getElementById("btnName").className = "btn btn-outline-primary";
            document.getElementById("btnSurname").className = "btn btn-outline-primary";
            document.getElementById("btnId").className = "btn btn-outline-primary";
            document.getElementById("btnPrac").className = "btn btn-outline-primary";
            document.getElementById("btnAdmin").className = "btn btn-outline-primary";
            document.getElementById("btnBoard").className = "btn btn-outline-primary";
            document.getElementById("btnEmail").className = "btn btn-primary";            }
        </script>
    <!-- </div> -->
<!-- </div> -->