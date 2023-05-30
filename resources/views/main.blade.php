<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>
    <div class="container py-4 px-3 mx-auto">
        <table class="table table-striped">
            <thead>
                <th scope="col-1">#</th>
                <th scope="col-1">Photo</th>
                <th scope="col-5">Name</th>
                <th scope="col-5">Email</th>
                <th scope="col-5">Phone</th>
                <th scope="col-5">Position</th>
                <th scope="col-5">Open</th>
            </thead>

            <tbody id="tBody"></tbody>
            <tfoot id="tFoot"></tfoot>
        </table>

        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                    </div>
                </div>
            </div>
        </div>

        @vite(['resources/css/app.scss', 'resources/js/app.ts'])

</body>
</html>
