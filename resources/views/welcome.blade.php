<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alpine Js</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>

    <div class="container-fluid mt-5" x-data="BookCrud">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        Book Table
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(book,index) in books" :key="index">
                                    <tr>
                                        <td x-text="index+1"></td>
                                        <td x-text="book.name"></td>
                                        <td x-text="book.author"></td>
                                        <td>
                                            <button @click.prevent="editData(book,index)"
                                                class="btn btn-info">Edit</button>
                                            <button @click.prevent="deleteData(index)"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        <span x-show="addMode">Create Book</span>
                        <span x-show="!addMode">Edit Book</span>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="saveData" x-show="addMode">
                            <div class="form-group">
                                <label>Name</label>
                                <input x-model="form.name" type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input x-model="form.author" type="text" class="form-control" placeholder="Enter Author">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <form @submit.prevent="updateData" x-show="!addMode">
                            <div class="form-group">
                                <label>Name</label>
                                <input x-model="form.name" type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input x-model="form.author" type="text" class="form-control" placeholder="Enter Author">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" @click.prevent="cancelEdit">Cancel Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div role="document">
   <div >
   {{-- <form action="{{Your route name}}" method="post">
      {{ csrf_field() }}
    <div >
      <button type=button data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div >
      <input type=hidden id="id" name=id>
      <h5 id="exampleModalLabel">Are you sure want to delete?</h5>
    </div>
    <div >
     <button type=button data-dismiss="modal">No</button>
     <button type=submit >Yes ! Delete it</button>
    </div>
  </form> --}}

   </div>
  </div>
 </div>
 <!-- Modal -->

  <script src="{{ mix('/js/alpine.js') }}"></script>

</body>

</html>