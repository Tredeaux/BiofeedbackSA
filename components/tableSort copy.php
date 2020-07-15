<!-- <div style="margin-bottom:1vh;"> -->
    <!-- <div style="text-align:center;"> -->
        <button id="btnName" onclick="orderName()">Order By Name</button>
        <script>
            function orderName() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "block";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").style.border = "2px solid #02a7e3";
            document.getElementById("btnSurname").style.border = "1px solid black";
            document.getElementById("btnId").style.border = "1px solid black";
            document.getElementById("btnPrac").style.border = "1px solid black";
            document.getElementById("btnAdmin").style.border = "1px solid black";
            document.getElementById("btnBoard").style.border = "1px solid black";

            }
        </script>

        <button id="btnSurname" onclick="orderSurame()">Order By Surname</button>
        <script>
            function orderSurame() {
            document.getElementById("tbSurname").style.display = "block";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").style.border = "1px solid black";
            document.getElementById("btnSurname").style.border = "2px solid #02a7e3";
            document.getElementById("btnId").style.border = "1px solid black";
            document.getElementById("btnPrac").style.border = "1px solid black";
            document.getElementById("btnAdmin").style.border = "1px solid black";
            document.getElementById("btnBoard").style.border = "1px solid black";
            }
        </script>

        <button id="btnId" onclick="orderId()">Order By Id</button>
        <script>
            function orderId() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "block";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").style.border = "1px solid black";
            document.getElementById("btnSurname").style.border = "1px solid black";
            document.getElementById("btnId").style.border = "2px solid #02a7e3";
            document.getElementById("btnPrac").style.border = "1px solid black";
            document.getElementById("btnAdmin").style.border = "1px solid black";
            document.getElementById("btnBoard").style.border = "1px solid black";
            }
        </script>

        <button id="btnPrac" onclick="orderPractitioner()">Order By Practitioner</button>
        <script>
            function orderPractitioner() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "block";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").style.border = "1px solid black";
            document.getElementById("btnSurname").style.border = "1px solid black";
            document.getElementById("btnId").style.border = "1px solid black";
            document.getElementById("btnPrac").style.border = "2px solid #02a7e3";
            document.getElementById("btnAdmin").style.border = "1px solid black";
            document.getElementById("btnBoard").style.border = "1px solid black";
            }
        </script>

        <button id="btnAdmin" onclick="orderAdmin()">Order By Admin</button>
        <script>
            function orderAdmin() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "block";
            document.getElementById("tbBoard").style.display = "none";

            document.getElementById("btnName").style.border = "1px solid black";
            document.getElementById("btnSurname").style.border = "1px solid black";
            document.getElementById("btnId").style.border = "1px solid black";
            document.getElementById("btnPrac").style.border = "1px solid black";
            document.getElementById("btnAdmin").style.border = "2px solid #02a7e3";
            document.getElementById("btnBoard").style.border = "1px solid black";
            }
        </script>

        <button id="btnBoard" onclick="orderBoard()">Order By Board</button>
        <script>
            function orderBoard() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "block";

            document.getElementById("btnName").style.border = "1px solid black";
            document.getElementById("btnSurname").style.border = "1px solid black";
            document.getElementById("btnId").style.border = "1px solid black";
            document.getElementById("btnPrac").style.border = "1px solid black";
            document.getElementById("btnAdmin").style.border = "1px solid black";
            document.getElementById("btnBoard").style.border = "2px solid #02a7e3";
            }
        </script>

        
        <button id="btnEmail" onclick="orderEmail()">Order By Email</button>
        <script>
            function orderEmail() {
            document.getElementById("tbSurname").style.display = "none";
            document.getElementById("tbName").style.display = "none";
            document.getElementById("tbId").style.display = "none";
            document.getElementById("tbPractitioner").style.display = "none";
            document.getElementById("tbAdmin").style.display = "none";
            document.getElementById("tbBoard").style.display = "none";
            document.getElementById("tbEmail").style.display = "block";

            document.getElementById("btnName").style.border = "1px solid black";
            document.getElementById("btnSurname").style.border = "1px solid black";
            document.getElementById("btnId").style.border = "1px solid black";
            document.getElementById("btnPrac").style.border = "1px solid black";
            document.getElementById("btnAdmin").style.border = "1px solid black";
            document.getElementById("btnBoard").style.border = "1px solid black";
            document.getElementById("btnEmail").style.border = "2px solid #02a7e3";
            }
        </script>
    <!-- </div> -->
<!-- </div> -->