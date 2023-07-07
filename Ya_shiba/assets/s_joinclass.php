<!-- Programmer Name: Teoh Mae Kay & She Jun Yuan-->
<!-- Program Name : Student Join Class -->
<!-- Description: Allow student to join class  -->
<!-- First Written: 19/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<body>
    <div class="modal fade" id="joinClassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">  
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family:Karla;font-weight:bold;">Join Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <label for="exampleFormControlInput1" class="form-label">Enter class code</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="cn81ka#" name="classcodetxt">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btns" name="add">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                    </svg>
                    </div>
                </div>
                <span>Confirm</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var joinClassLink = document.getElementById("joinClassLink");
        joinClassLink.addEventListener("click", function(event) {
            event.preventDefault(); 
            var modal = new bootstrap.Modal(document.getElementById("joinClassModal"));
            modal.show();
        });
    });
</script>