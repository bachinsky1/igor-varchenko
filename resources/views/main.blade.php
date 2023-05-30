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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            Create user
        </button>

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
        <div class="modal" id="openUser" tabindex="-1" aria-labelledby="openUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="openUserLabel">Modal title</h5>
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

        <!-- Modal -->
        <div class="modal" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>

                        <div class="modal-body" id="modalBody">

                            <div class="mb-3">
                                <label for="userName" class="form-label">User name</label>
                                <input type="text" class="form-control" id="userName"> 
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="userPhone" class="form-label">Phone</label>
                                <input type="phone" class="form-control" id="userPhone">
                            </div>
                            <div class="mb-3">
                                <label for="userPhoto" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="userPhoto">
                            </div>
                            <div class="mb-3">
                                <label for="userPosition" class="form-label">Position</label>
                                <select class="form-select" id="userPosition" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        @vite(['resources/css/app.scss', 'resources/js/app.ts'])

</body>
</html>
